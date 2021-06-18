<?php
//Detiene la aplicación si fallay lo carga solo una vez, comprueba si ya está cargado
//En este caso no hace falta crear la sesion porque ya se crea en el authenticate.php, pero  a veces si
require_once('../model/user.php');
require_once('authenticate.php');


//Esto es para cuando ponga la ruta a este archivo, me redireccione al contenido
if (isAuthenticated()) {
    header('Location: content.php');
}

$userName = $_POST['userName'];
$password = $_POST['password'];
//Ciframos el password para que no se vea claro en la bd 
$password = password_hash($password, PASSWORD_BCRYPT);
$password2 = $_POST['password2'];
$user = new User(null, $userName, $password); //unset($user) para destruir
/* Se comprueba que no  est+e vacio porque la propiedad require se puede manipular en inspeccionar elemento */

if (!empty($user->getUserName()) && !empty($user->getPassword()) && !empty($password2)) {

    if ($_POST['password'] === $password2) {


        $statement = $conexion->conectar()->prepare('INSERT INTO users (user_name,password) VALUES(:user_name,:password)');

        try {
            $statement->execute(array(
                ':user_name' => $user->getUserName(),
                ':password' => $user->getPassword()
            ));
            $_SESSION['message'] = 'Succesfully create new user';
            $_SESSION['new_user'] = true;
            $_SESSION['user'] = serialize($user);
            echo 'ejec';
            header('Location: includes/content.php');
        } catch (PDOException $e) {
            $_SESSION['message'] = 'Error at create user' . $e->getMessage();
        }
    } else {


        $_SESSION['message'] = 'Error! Passwords are distintc';
    }
    $_SESSION['user'] = serialize($user);
    header('Location: ../form.php?accion=signup');
}
