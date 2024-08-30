<?php

require_once('../app/TCPDF-main/tcpdf.php');
include('../app/config.php');


session_start();
if(isset($_SESSION['sesion_email'])){
    // echo "si existe sesion de ".$_SESSION['sesion_email'];
    $email_sesion = $_SESSION['sesion_email'];
    $sql = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol 
    FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol WHERE email='$email_sesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario){
        $id_usuario_sesion = $usuario['id_usuario'];
        $nombres_sesion = $usuario['nombres'];
        $rol_sesion = $usuario['rol'];
    }
}else{
    echo "no existe sesion";
    header('Location: '.$URL.'/login');
}


$id_devolucion_get = $_GET['id_devolucion'];
$nro_devolucion_get = $_GET['nro_devolucion'];


$sql_devoluciones = "SELECT *, cli.nombre_cliente AS nombre_cliente, cli.area_cliente AS area_cliente
FROM tb_devoluciones AS dev 
INNER JOIN tb_clientes AS cli ON cli.id_cliente = dev.id_cliente WHERE dev.id_devolucion = '$id_devolucion_get'";
$query_devoluciones = $pdo->prepare($sql_devoluciones);
$query_devoluciones->execute();
$devoluciones_datos = $query_devoluciones->fetchAll(PDO::FETCH_ASSOC);

foreach ($devoluciones_datos as $devoluciones_dato) {
  $area_cliente = $devoluciones_dato['area_cliente'];
  $nombre_cliente = $devoluciones_dato['nombre_cliente'];
  $total_pagado = $devoluciones_dato['total_pagado'];
  $fecha_creacion = $devoluciones_dato['fyh_creacion'];
}



/* $fecha = date("d/m/Y", strtotime($fecha_creacion)); */
/* $timestamp = strtotime($fecha_creacion);
$new_date = date('d/m/Y', $timestamp); */



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,90), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('Comprobante Devolución');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(5, 5, 5);

// set auto page breaks
$pdf->setAutoPageBreak(true, 5);


// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica', '', 7);

// add a page
$pdf->AddPage();




// create some HTML content
$html = '
<div>
    <p style="text-align: center">
        <b>BODEGA DE INSUMOS</b> <br>
         <br>
        <b>Devolución No.</b> '.$id_devolucion_get.' <br>
        <br>
        <b>Comprobante de Devolución</b>
         <br>
        --------------------------------------------------------------------------------
        <div style="text-align: left">
            <b>Fecha:</b> '.$fecha_actual.'<br>
            <b>Nombre Empleado: </b> '.$nombre_cliente.'<br>
            <b>Área:</b> '.$area_cliente.'<br>
            --------------------------------------------------------------------------------
        </div>
    </p>
</div>
';

$html .='
<table border="1">
<tr style="text-align: center; background-color: #d6d6d6">
    <th style="width: 50px"><b>No.</b></th>
    <th style="width: 120px"><b>Producto</b></th>
    <th style="width: 75px"><b>Cantidad</b></th>
</tr>
';

$contador_de_carrito_devolucion = 0;
$cantidad_total = 0;

$sql_carrito_devolucion = "SELECT *, pro.nombre AS nombre_producto, pro.descripcion AS descripcion,
pro.stock AS stock, pro.id_producto AS id_producto  
FROM tb_carrito_devolucion AS carr INNER JOIN tb_almacen AS pro 
ON carr.id_producto = pro.id_producto
WHERE nro_devolucion = '$nro_devolucion_get' ORDER BY id_carrito_devolucion ASC;";

$query_carrito_devolucion = $pdo->prepare($sql_carrito_devolucion);
$query_carrito_devolucion->execute();
$carrito_devolucion_datos = $query_carrito_devolucion->fetchAll(PDO::FETCH_ASSOC);

foreach ($carrito_devolucion_datos as $carrito_devolucion_dato) {
$id_carrito_devolucion = $carrito_devolucion_dato['id_carrito_devolucion'];
$contador_de_carrito_devolucion = $contador_de_carrito_devolucion + 1;
$cantidad_total = $cantidad_total + $carrito_devolucion_dato['cantidad'];

 $html .='
   <tr>
      <td style="text-align: center">'.$contador_de_carrito_devolucion.'</td>
      <td>'.$carrito_devolucion_dato['nombre_producto'].'</td>
      <td style="text-align: center">'.$carrito_devolucion_dato['cantidad'].'</td>
  </tr>
';
}

$html .='
<tr>
    <td colspan="2" style="text-align: right; background-color: #d6d6d6"><b>Total</b></td>
    <td style="text-align: center; background-color: #d6d6d6">'.$cantidad_total.'</td>
    
</tr>
</table>
<br><br>
-------------------------------------------------------------------------------- <br>
         <b>USUARIO:</b> '.$nombres_sesion.'
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');








//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+