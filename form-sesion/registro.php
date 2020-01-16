<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


    <!-- <form action="agregar_usuario.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="nombre_usuario" placeholder="Ingresar usuario">
            <input type="text" name="contrasena" placeholder="Ingresar password">
            <input type="text" name="contrasena2" placeholder="repita password">
            <button class="btn btn-primary">Guardar</button>
        </div>
    </form> -->
    <!-- <form action="login.php" method="POST">
        <div class="form-group">
            <input type="text" name="nombre_usuario" placeholder="Ingresar usuario">
            <input type="text" name="contrasena" placeholder="Ingresar password">
            <button class="btn btn-primary">Ingresar</button>
        </div>
    </form> -->

    <h3>Registro de usuario</h3>
    <form action="agregar_usuario.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre Usuario</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="username" name="nombre_usuario">
            <small id="emailHelp" class="form-text text-muted">Revisa las mayusculas y minisculas.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contrasena</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="contrasena"
                placeholder="Contrasena">
            <label for="exampleInputPassword1">Confirmar Contrasena</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="contrasena2"
                placeholder="Repita Contrasena">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>

    <h3>Iniciar Sesion</h3>
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre Usuario</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="username" name="nombre_usuario">
            <small id="emailHelp" class="form-text text-muted">Revisa las mayusculas y minisculas.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contrasena</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contrasena"
                name="contrasena">
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</body>

</html>