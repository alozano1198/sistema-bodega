<?php

include ('../../config.php');


$nro_devolucion = $_GET['nro_devolucion'];
$id_cliente = $_GET['id_cliente'];
$total_a_cancelar = $_GET['total_a_cancelar'];


$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO tb_devoluciones
       ( nro_devolucion, id_cliente, total_pagado, fyh_creacion) 
VALUES (:nro_devolucion,:id_cliente,:total_pagado,:fyh_creacion)");

$sentencia->bindParam('nro_devolucion',$nro_devolucion);
$sentencia->bindParam('id_cliente',$id_cliente);
$sentencia->bindParam('total_pagado',$total_a_cancelar);
$sentencia->bindParam('fyh_creacion',$fechaHora);

if($sentencia->execute()){

  
    $pdo->commit();

    session_start();
    // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se registro la devolucion de manera correcta";
    $_SESSION['icono'] = "success";
    // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/devoluciones";
    </script>
    <?php
}else{


    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/devoluciones/create.php";
    </script>
    <?php
}





