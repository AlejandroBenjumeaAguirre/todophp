<?php

$id = file_get_contents("php://input");

require("./config/db.php");

$query = $conexion->prepare("SELECT * FROM tareas WHERE id = :id");
$query->bindParam(":id", $id);
$query->execute();
$resultado = $query->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultado);

?>