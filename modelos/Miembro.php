<?php
    require '../config/conexion.php';

    Class Miembros 
    {
        public function __construct()
        {

        }

        public function insertar($nombre,$apellido,$telefono,$num_documento,$tipo_documento)
        {
            $sql = "INSERT INTO miembros (
                    nombre,
                    apellido,
                    telefono,
                    num_documento,
                    tipo_documento
             
             
                   ) 
                    VALUES (
                  
                        '$nombre',
                        '$apellido',
                        '$telefono',
                        '$num_documento',
                        '$tipo_documento'
                     
                        )";
            
            return ejecutarConsulta($sql);
        }

        public function editar($idmiembro,$nombre,$apellido,$telefono,$num_documento,$tipo_documento)
        {
            $sql = "UPDATE miembros SET 
                    nombre='$nombre', 
                    apellido='$apellido',
                    telefono='$telefono',
                    num_documento='$num_documento',
                    tipo_documento='$tipo_documento'
            
                  
                    WHERE idmiembro='$idmiembro '";
            
            return ejecutarConsulta($sql);
        }

        
        public function eliminar($idmiembro)
        {
            $sql= "DELETE FROM miembros 
                   WHERE idmiembro='$idmiembro'";
            
            return ejecutarConsulta($sql);
        }


        //METODO PARA MOSTRAR LOS DATOS DE UN REGISTRO A MODIFICAR
        public function mostrar($idmiembro)
        {
            $sql = "SELECT * FROM miembros 
                    WHERE idmiembro='$idmiembro'";

            return ejecutarConsultaSimpleFila($sql);
        }

        //METODO PARA LISTAR LOS REGISTROS
      
     

        public function listarc()
        {
            $sql = "SELECT * FROM miembros 
                    ";

            return ejecutarConsulta($sql);
        }

       

    }

?>