<?php
session_start();
require_once('conexion.php');
function isAuthenticated()
{
    if (isset($_SESSION['user_id']) || isset($_SESSION['new_user'])) {

        //Se usa el global para acceder a una variable global desde dentro de una funcion
        $statement = $GLOBALS['conexion']->conectar()->prepare('SELECT id, user_name, password FROM users WHERE id=:id');

        $statement->execute(array(
            ':id' => $_SESSION['user_id']
        ));


        $resultado = $statement->fetch();

        if (isset($resultado)) {
            $user = new User($resultado['id'], $resultado['user_name'], $resultado['password']);
            $_SESSION['user'] = serialize($user); //Permite recuperar aparte de los atributos los métodos
            $_SESSION['message'] = 'Succesfully ok';
            return true;
        } else {
            //Si el user_id existe en sessión pero ya no existe en la base de datos
            return false;
        }
    } else {
        //directamente no esta el user_id en session
        return false;
    }
}

// function userExists($user_name)
// {
//     $statement2 = $GLOBALS['conexion']->conectar()->prepare('SELECT id, user_name, password FROM users WHERE user_name=:user_name');

//     $statement2->execute(array(
//         ':user_name' => $user_name
//     ));


//     $resultado2 = $statement2->fetch();
// echo 'v1';
//     if(isset($resultado2)){
//         return true;
//     }else{
//         return false;
//     }
// }
