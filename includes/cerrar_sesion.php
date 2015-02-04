<?php
//Se inicia la sesion
session_start();

//Se borran los datos de la sesion
session_destroy();

header("Location: ../index.php");

?>