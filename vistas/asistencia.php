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