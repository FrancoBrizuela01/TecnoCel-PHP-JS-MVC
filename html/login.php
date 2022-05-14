<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../html/css/login.css">

    <title>Gestion de negocios</title>
</head>

<body>
    <div class="center">
        <h1>Inicio de sesión</h1>
        <form method="post">
            <div class="field">
                <input type="text" required name="email">
                <label>Correo electronico</label>
                <span></span>
            </div>
            <div class="field">
                <input type="password" required name="passwd">
                <label>Contraseña</label>
                <span></span>
            </div>
            <input type="submit" value="Login" class="btn-login">
        </form>
    </div>
</body>

</html>