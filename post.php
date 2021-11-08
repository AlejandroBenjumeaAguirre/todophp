<?php

if(isset($_POST)){
    
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fecha = date('Y-m-d');
    $id_estado = 1;
    require("./config/db.php");

    if(empty($_POST['idt'])){
        
        $query = $conexion->prepare("INSERT INTO `tareas` (`nombre`, `descripcion`, `fecha_creacion`, `id_estado`) VALUES (:nombre, :descripcion, :fecha, :id_estado)");
        $query->bindParam(":nombre", $nombre);
        $query->bindParam(":descripcion", $descripcion);
        $query->bindParam(":fecha", $fecha);
        $query->bindParam(":id_estado", $id_estado);
        $query->execute();
        $conexion = null;
        echo "ok";
    }else{
        $id = $_POST['idt'];
        $realizada = $_POST['realizada'];
        $cancelada = $_POST['cancelada'];

        if($realizada){
            $id_estado = 2;
        }
        if($cancelada){
            $id_estado = 3;
        }

        $query = $conexion->prepare("UPDATE tareas SET nombre = :nombre, descripcion = :descripcion, id_estado = :estado WHERE id = :id");
        $query->bindParam(":nombre", $nombre);
        $query->bindParam(":descripcion", $descripcion);
        $query->bindParam(":estado", $id_estado);
        $query->bindParam(":id", $id);
        $query->execute();
        $conexion = null;
        echo "modificado";
    }
    
}


/* if($nombre==='' || $descripcion===''){
    echo json_encode('llena todos los campos');
}else{
    echo json_encode('Tarea: '.$nombre);
} */

?>