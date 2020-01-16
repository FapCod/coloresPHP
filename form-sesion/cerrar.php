<?php 
//INICIAR SESSION 
session_start();

//destruir todas las variables de la sesion
$_SESSION=array();

//si se desea destruir la sesion completamente tambien se debe de borrar las cookies de sesion
//nota:esto destruira la sesion y no la informacion de la sesion.
if (ini_get("session.use_cookies")) {
    $params= session_get_cookie_params();
    setcookie(session_name(),'',time()-42000,
            $params["path"],$params["domain"],
            $params["secure"],$params["httponly"]
              );
    }

    //finalmente destruir la sesion
    session_destroy();
    header('location:registro.php');
?>