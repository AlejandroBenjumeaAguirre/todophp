<?php

$host="localhost";
$bd="todo";
$usuario="root";
$pass="AB120792ab";

try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$pass);
    //if($conexion){ echo "Conectado a la base de datos"; };
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>