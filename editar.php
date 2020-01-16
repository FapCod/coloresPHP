<?php include 'conexion.php';

$id = $_GET['id'];
$color= $_GET['color'];
$descripcion= $_GET['descripcion'];

$sql_editar= 'UPDATE colores SET color=?,descripcion=? WHERE id=?';
$sentencia_editar=$mbd->prepare($sql_editar);
$sentencia_editar->execute(array($color,$descripcion,$id));
header('location:index.php');




?>