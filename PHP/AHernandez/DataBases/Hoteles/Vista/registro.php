<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<form method="post" action="../Controladores/c_registro.php">
    <div class="container bg-danger">
        <div class="form-group row">
            <div class="col-12 text-light text-center">
                <h1>Please Sing in</h1>
            </div>
            <label class="sr-only" for="name">User Name</label>
            <div class="col-12">
                <input type="text" class="form-control mb-2 mr-2" id="name" placeholder="User name">
            </div>
            <label class="sr-only" for="email">email</label>
            <div class="col-12">
                <input type="email" class="form-control mb-2 mr-2" id="email" placeholder="Email Address">
            </div>
            <label class="sr-only" for="password">password</label>
            <div class="col-6">
                <input type="password" class="form-control mb-2 mr-2" name="password" placeholder="Password">
            </div>
            <label class="sr-only" for="cPassword">confirm password</label>
            <div class="col-6">
                <input type="password" class="form-control mb-2 mr-2" name="cPassword" placeholder="Confirm Password">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-6">
                <button class="btn btn-primary w-100 mb-2">Register</button>
            </div>
            <div class="col-6">
                <button class="btn btn-success w-100 mb-2">Sign In</button>
            </div>
        </div>

    </div>
</form>
<?php if (!$cPassword) { ?>
    <script>
        alert("Las contraseñas no coinciden")
    </script>
<?php } ?>
</body>
</html>