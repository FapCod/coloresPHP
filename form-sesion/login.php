<?php include '../conexion.php';
//INICIAR SESSION 
session_start();
//variables que recibe del formulario
$usuario_login= $_POST['nombre_usuario'];
$contrasena= $_POST['contrasena'];

//verificamos si es que el usuario existe
$sql = 'SELECT * FROM usuarios WHERE nombre=?';
$sentencia=$mbd-> prepare($sql);
$sentencia-> execute(array($usuario_login));
$resultado= $sentencia->fetch();

if (!$resultado) {
  echo 'El usuario no  existe';
   die();
}
$contrasena2=$resultado['contrasena'];
if (password_verify($contrasena, $contrasena2)) {
    echo 'contrasena correcta';
    $_SESSION['admin']=$usuario_login;
    header('location:../index.php');
}else {
    echo 'LAS CONTRASENAS NO SON IGUALES';
    die();
}


?>