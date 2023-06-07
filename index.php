<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
           body {
            background-color: #47ABDD;
            padding: 20px;
        }
        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin-bottom: 10px;
        }
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 3px;
        }
        form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 3px;
        }
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #47ABDD;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #DB7CD8;
        }
        .text-center {
            text-align: center;
        }
        p.register-link {
            margin-top: 10px;
        }
        p.register-link a {
            color: #FFFFFF ;
            text-decoration: none;
        }
        p.register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post">
        <p><label for="usuario">Nombre: </label><input type="text" name="usuario" id="usuario" placeholder="Usuario" required></p>
        <p><label for="contraseña">Contraseña: </label><input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required></p>
        <input type="submit" value="Aceptar">
    </form>
    <p class="text-center register-link"><a href="registrar.php">Registrar nuevo usuario</a></p>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

