<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','root');
define('BD','sistema_bodega_itm');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexión a la base de datos fue con exito";
}catch (PDOException $e){
    //print_r($e);
    echo "Error al conectar a la base de datos";
}

$URL = "http://localhost:3000";

date_default_timezone_set("America/Guatemala");
$fechaHora = date('Y-m-d H:i:s');

$fecha_actual = date('d/m/Y');