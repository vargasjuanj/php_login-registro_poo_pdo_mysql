<?php
session_start();

// Si no cargo el model me sale este error-> __PHP_Incomplete_Class Object y no puedo usar los metodos del objeto, etc
include_once('../model/user.php');
// Recupero el objeto cons sus métodos también
$user = unserialize($_SESSION['user']);
?>

<hr>
<p>Welcome <?= $user->getUserName() ?></p>
<p>You are Succesfully Loged In</p>
<a href="logout.php">Logout</a>