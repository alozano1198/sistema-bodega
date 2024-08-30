<?php

$sql_devoluciones = "SELECT *, cli.nombre_cliente AS nombre_cliente FROM tb_devoluciones AS dev 
INNER JOIN tb_clientes AS cli ON cli.id_cliente = dev.id_cliente WHERE dev.id_devolucion = '$id_devolucion_get'";
$query_devoluciones = $pdo->prepare($sql_devoluciones);
$query_devoluciones->execute();
$devoluciones_datos = $query_devoluciones->fetchAll(PDO::FETCH_ASSOC);

foreach ($devoluciones_datos as $devoluciones_dato) {
  $nro_devolucion = $devoluciones_dato['nro_devolucion'];
  $id_cliente = $devoluciones_dato['id_cliente'];
}