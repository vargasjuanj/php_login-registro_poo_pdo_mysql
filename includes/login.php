<?php
//Detiene la aplicación si fallay lo carga solo una vez, comprueba si ya está cargado
require_once('../model/user.php');
require_once('authenticate.php');

//Esto es para cuando ponga la ruta a este archivo, me redireccione al contenido

if (isAuthenticated()) {
    header('Location: content.php');

}

$userName = $_POST['userName'];
//En este caso no lo cifro al password
$password = $_POST['password'];

$user = new User(null, $userName, $password); //unset($user) para destruir
/* Se comprueba que no  est+e vacio porque la propiedad require se puede manipular en inspeccionar elemento */

if (!empty($user->getUserName()) && !empty($user->getPassword())) {
    
  
    $statement = $conexion->conectar()->prepare('SELECT id, user_name, password FROM users WHERE user_name=:user_name');

    try {
 
        $statement->execute(array(
            ':user_name' => $user->getUserName()
        ));


        $resultado = $statement->fetch();


        //Si el usuario existe, y, si el  password ingresado y el hash dvuelto por la bd coinciden usando el metodo password_verify
        if (isset($resultado) && password_verify($password, $resultado['password'])) {
            $user->setId($resultado['id']);
            $user->setUserName($resultado['user_name']);
            $user->setPassword($resultado['password']);
            // echo '<pre>';
            // print_r($user);
            // echo '</pre>';
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['message'] = 'Succesfully loged';
            $_SESSION['user'] = serialize($user);
            header('Location: content.php');
        } else {   
            $_SESSION['message'] = 'Sorry those credentials do not match or user does not exist';
            header('Location: ../form.php?accion=login');

        }
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error at loged user' . $e->getMessage();
    }
}
