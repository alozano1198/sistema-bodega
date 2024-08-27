<?php

include ('../../config.php');


$nombre_cliente = $_POST['nombre_cliente'];
$area_cliente = $_POST['area_cliente'];



$sentencia = $pdo->prepare("INSERT INTO tb_clientes
       ( nombre_cliente, area, fyh_creacion) 
VALUES (:nombre_cliente,:area,:fyh_creacion)");

$sentencia->bindParam('nombre_cliente',$nombre_cliente);
$sentencia->bindParam('area',$area_cliente);
$sentencia->bindParam('fyh_creacion',$fechaHora);

if($sentencia->execute()){


    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}else{



    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}





