<?php

include ('../../config.php');

$id_carrito_devolucion = $_POST['id_carrito_devolucion'];


$sentencia = $pdo->prepare("DELETE FROM tb_carrito_devolucion WHERE id_carrito_devolucion=:id_carrito_devolucion");

$sentencia->bindParam('id_carrito_devolucion',$id_carrito_devolucion);

if($sentencia->execute()){

   
    ?>
    <script>
        location.href = "<?php echo $URL;?>/devoluciones/create.php";
    </script>
    <?php
}else{


    ?>
    <!-- <script>
        location.href = "<?php echo $URL;?>/devoluciones/create.php";
    </script> -->
    <?php
}

