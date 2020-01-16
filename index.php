<?php include_once 'conexion.php'; 
//INICIAR SESSION 
session_start();

if (!isset($_SESSION['admin'])) {
    header('location:form-sesion/registro.php');
}
// echo 'desde archivo index';
$gsent = $mbd->prepare("SELECT * FROM colores");
$gsent->execute();

/* Obtener todas las filas restantes del conjunto de resultados */
// print("Obtener todas las filas restantes del conjunto de resultados:\n");
 $resultado = $gsent->fetchAll();
// print_r($resultado);

//agregar
if ($_POST) {
  $color= $_POST['color'];
  $descripcion= $_POST['descripcion'];
  $sql_agregar='INSERT INTO colores(color,descripcion) VALUES (?,?)';
  $sentencia_agregar= $mbd-> prepare($sql_agregar);
  $sentencia_agregar->execute(array($color,$descripcion));
  //CERRAR CONEXION
  $sentencia_agregar=null;
  $mbd=null;
  header('location:index.php');
  
}
//editar
if ($_GET) {    
    $id=$_GET['id'];
    $gsent_unico = $mbd->prepare("SELECT id,color,descripcion FROM colores WHERE id=?");
    $gsent_unico->execute(array($id));
    $resultado_unico = $gsent_unico->fetch();
    //CERRAR CONEXION
    $getsent_unico=null;
    $mbd=null;
}



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"
        integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
    <title>PHP CRUD COLORES</title>
</head>

<body>
    <a href="form-sesion/cerrar.php"><input class="btn btn-danger float-right mr-3 " type="button"
            value='Cerrar Sesion'></a>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-6">
                <?php foreach($resultado as $fila): ?>
                <div class="alert alert-<?php echo $fila['color'] ?> text-uppercase" role="alert">
                    <?php echo $fila['color'] ?> - <?php echo $fila['descripcion'] ?>
                    <a href="eliminar.php?id=<?php echo $fila['id'] ?>" class="float-right ml-3">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <a href="index.php?id=<?php echo $fila['id'] ?>" class="float-right">
                        <i class="fas fa-edit "></i>
                    </a>

                </div>
                <?php endforeach ?>
            </div>
            <div class="col-md-6">
                <?php if(!$_GET): ?>
                <h2>Agregar elementos</h2>
                <form action="" method="POST" name="fvalida">
                    Color<input type="text" class="form-control" name="color"><br />
                    Descripcion<input type="text" class="form-control" name="descripcion">
                    <!-- <button class="btn btn-primary mt-3" onclick="valida_envia()">Agregar</button> -->
                    <input class="btn btn-primary mt-3" type="button" value="Agregar" onclick="valida_envia()">
                </form>
                <?php endif ?>
                <?php if($_GET): ?>
                <h2>Editar elemento</h2>
                <form action="editar.php" method="GET">
                    Color<input type="text" class="form-control" name="color"
                        value="<?php echo $resultado_unico['color'] ?>"><br />
                    Descripcion<input type="text" class="form-control" name="descripcion"
                        value="<?php echo $resultado_unico['descripcion'] ?>">
                    <input type="hidden" name='id' value="<?php echo $resultado_unico['id'] ?>">
                    <button class="btn btn-primary mt-3">Editar</button>

                    <a href="index.php"><input type="button" class="btn btn-danger mt-3" value="Cancelar"></a>
                </form>
                <?php endif ?>
            </div>

        </div>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src='validar.js'></script>
</body>

</html>
<?php 

  //CERRAR CONEXION
    $getsent=null;
    $mbd=null;
?>