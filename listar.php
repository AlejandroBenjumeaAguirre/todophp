<?php

    require("./config/db.php");
    $consulta = $conexion->prepare("SELECT * FROM tareas");
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $data){
        $estado = '';
        if($data['id_estado']==='1'){
            $estado = 'Pendiente';
        }elseif($data['id_estado']==='2'){
            $estado = 'Realizada';
        }elseif($data['id_estado']==='3'){
            $estado = 'Cancelada';
        }
        echo "
            <div class=\"card border-info mb-3\" style=\"max-width: 20rem;\">
            <div class=\"card-header\">".$estado."</div>
            <div class=\"card-body\">
                <h4 class=\"card-title\">".$data['nombre']."</h4>
                <p class=\"card-text\">".$data['descripcion']."</p>
                <small>".$data['fecha_creacion']."</small>
            </div>
            <div class=\"card-footer\">
                <div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
                    <button type=\"button\" class=\"btn btn-primary\" onclick=actualizar('".$data['id']."')>Actualizar</button>
                    <button type=\"button\" class=\"btn btn-primary\" onclick=eliminar('".$data['id']."','".$data['nombre']."')>Eliminar</button>
                </div>
            </div>
            </div>
        ";
    }


?>