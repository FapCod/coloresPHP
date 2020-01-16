<?php include '../conexion.php';
//variables que recibe del formulario
$usuario_nuevo= $_POST['nombre_usuario'];
$contrasena= $_POST['contrasena'];
$contrasena2= $_POST['contrasena2'];
//virifcar si el suuario existe
$sql = 'SELECT * FROM usuarios WHERE nombre=?';
$sentencia=$mbd-> prepare($sql);
$sentencia-> execute(array($usuario_nuevo));
$resultado= $sentencia->fetch();

if ($resultado) {
  echo 'El usuario ya existe';
   die();
  
}





//encripta la contrasena con la funcion establecida de php
$contrasena=password_hash($contrasena, PASSWORD_DEFAULT);
//verifica si es que las contrasenas coinciden
if (password_verify($contrasena2, $contrasena)) {
    echo '¡La contraseña es válida!';
    //si coinciden se ejecuta el codigo
  $sql_agregar_usuario='INSERT INTO usuarios(nombre,contrasena) VALUES (?,?)';
  $sentencia_agregar= $mbd-> prepare($sql_agregar_usuario);

  if ($sentencia_agregar->execute(array($usuario_nuevo,$contrasena))) {
    echo 'Agregado';
  }else {
    echo 'Error';
  }
  //CERRAR CONEXION
  $sentencia_agregar=null;
  $mbd=null;
  header('location:registro.php');
} else {
    echo 'La contraseña no es válida.';
}

?>