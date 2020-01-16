<?php 
$link= 'mysql:host=localhost;dbname=dbcolores';
$usuario= 'root';
$contraseña='';
try {
    $mbd = new PDO($link, $usuario, $contraseña);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>