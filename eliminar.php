<?php include 'conexion.php';

$id = $_GET['id'];
$sql_eliminar= 'DELETE FROM colores WHERE id=?';
$sentencia_eliminar=$mbd->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($id));
header('location:index.php');

//cerrar conexion
$sentencia_eliminar=null;
$mbd=null;
?>