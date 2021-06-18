<?php 

session_start(); //Primero se inicia
session_unset(); // Se vacia la sesion
session_destroy(); // se destruye
header('Location: ../index.php');

?>