
<?php
  //Activacion de almacenamiento en buffer
  ob_start();
  //iniciamos las variables de session
  session_start();

  if(!isset($_SESSION["nombre"]))
  {
    header("Location: login.html");
  }

  else  //Agrega toda la vista
  {
    require 'header.php';

    if($_SESSION['asistencia'] == 1)
    {
?>
  <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Asistencia  <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>

                  </div>
              </div>
            </div>
        </section>
  </div>
  
<?php
  
} //Llave de la condicion if de la variable de session

else
{
  require 'noacceso.php';
}

require 'footer.php';
?>

<script src="./scripts/asistencia.js"></script>

<?php
}
ob_end_flush(); //liberar el espacio del buffer
?>