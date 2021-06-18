<?php
//En vez de cargar el modelo en authenticate lo cargo antes, para que autenticate pueda usarlo, porque si no lo hiciera, segun la ubicación de cada archivo, el modelo está en diferentes posiciones.
require_once('model/user.php');
require_once('includes/authenticate.php');

if (isAuthenticated()) {

    header('Location: includes/content.php');
}


include('includes/header.php');

//Aca no permanece en toda la aplicación, en el header.php si permanece
// include('includes/navbar.php');

include('includes/home.php');

include('includes/footer.php');
