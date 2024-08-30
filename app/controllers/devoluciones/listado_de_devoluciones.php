<?php

$sql_devoluciones = "SELECT *, cli.nombre_cliente AS nombre_cliente FROM tb_devoluciones AS dev 
INNER JOIN tb_clientes AS cli ON cli.id_cliente = dev.id_cliente";
$query_devoluciones = $pdo->prepare($sql_devoluciones);
$query_devoluciones->execute();
$devoluciones_datos = $query_devoluciones->fetchAll(PDO::FETCH_ASSOC);