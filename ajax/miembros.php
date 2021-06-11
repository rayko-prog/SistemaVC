<?php
    
    require_once '../modelos/Miembro.php';

    $miembro = new Miembros();

    $idmiembro=isset($_POST["idmiembro"])? limpiarCadena($_POST["idmiembro"]):"";
    $nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
    $apellido=isset($_POST["apellido"])? limpiarCadena($_POST["apellido"]):"";
    $telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
    $num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
    $tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
  
   

    switch($_GET["op"])
    {
        case 'guardaryeditar':
            if (empty($idmiembro)){
                $rspta=$miembro->insertar($nombre,$apellido,$telefono,$num_documento,$tipo_documento);
                echo $rspta ? "Miembro registrada" : "Miembro no se pudo registrar";
             
            }
            else {
            
                $rspta=$miembro->editar($idmiembro,$nombre,$apellido,$telefono,$num_documento,$tipo_documento);
                echo $rspta ? "Miembro actualizada" : "Miembro no se pudo actualizar";
            } 
        break;

        case 'eliminar':
                $rspta = $miembro->eliminar($idmiembro);
                echo $rspta ? "Miembro eliminada" : "Miembro no se pudo eliminar";
        break;

        case 'mostrar':
            $rspta = $miembro->mostrar($idmiembro);
            echo json_encode($rspta);
        break;

    

        case 'listarc':
            $rspta = $miembro->listarc();
            $data = Array();
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                    "0"=>
                        '<button class="btn btn-warning" onclick="mostrar('.$reg->idmiembro.')"><li class="fa fa-pencil"></li></button>'.
                        ' <button class="btn btn-danger" onclick="eliminar('.$reg->idmiembro.')"><li class="fa fa-trash"></li></button>'
                        ,
                        "1"=>$reg->nombre,
                        "2"=>$reg->apellido,
                        "3"=>$reg->telefono,
                        "4"=>$reg->num_documento,
                        "5"=> $reg->tipo_documento
                );
            }
            $results = array(
                "sEcho"=>1, //Informacion para el datable
                "iTotalRecords" =>count($data), //enviamos el total de registros al datatable
                "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
                "aaData" =>$data
            );
            echo json_encode($results);
        break;
    }

?>