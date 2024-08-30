<?php

include ('../../config.php');

$id_devolucion = $_GET['id_devolucion'];
$nro_devolucion = $_GET['nro_devolucion'];

$pdo->beginTransaction();


$sentencia = $pdo->prepare("DELETE FROM tb_devoluciones WHERE id_devolucion=:id_devolucion");

$sentencia->bindParam('id_devolucion',$id_devolucion);

if($sentencia->execute()){

  $sentencia2 = $pdo->prepare("DELETE FROM tb_carrito_devolucion WHERE nro_devolucion=:nro_devolucion");
  $sentencia2->bindParam('nro_devolucion',$nro_devolucion);
  $sentencia2->execute();

   $pdo->commit();

   session_start();
    // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se elimino la devolucion de manera correcta";
    $_SESSION['icono'] = "success";
   
    ?>
    <script>
        location.href = "<?php echo $URL;?>/devoluciones";
    </script>
    <?php
}else{
  ?>

      <script>
        location.href = "<?php echo $URL;?>/devoluciones";
    </script>

    <?php

    echo "Error al intentar borrar una devolucion";
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos";
    $_SESSION['icono'] = "error";
    $pdo->rollBack();
}

