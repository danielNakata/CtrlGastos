<!DOCTYPE html>
<?php
    $msg = "";

    if(isset($_GET["msg"])){
        $msg = $_GET["msg"];
    }

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Control de Gastos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/signin.css" rel="stylesheet" type="text/css" />
        <link href="css/estilo.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/funciones.js"></script>
    </head>
    <body id="bodyCompleto" >
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed"></button>
                    <a class="navbar-brand" href="#">Control de Gastos</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <form class="form-signin" action="actions/usuarios/InicioSesion.php" method="get">
                <h2 class="form-signin-heading" style="color: #FFF" >Inicio de Sesión</h2>
                <label for="txtLogin" class="sr-only">Usuario</label>
                <input type="text" name="txtLogin" id="txtLogin" class="form-control" placeholder="Usuario" required autofocus />
                <br />
                <label for="txtPassword" class="sr-only">Contrasena</label>
                <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Contraseña" required="" />
                <br />
                <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            </form><!--              
                <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> </div>-->
        </div>
        
        <script src="js/jquery.min.js"></script>
        <script src="css/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>