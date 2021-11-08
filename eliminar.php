<?php

$id = file_get_contents("php://input");

require("./config/db.php");

$query = $conexion->prepare("DELETE FROM tareas WHERE id = :id");
$query->bindParam(":id", $id);
$query->execute();
echo "ok";


?>