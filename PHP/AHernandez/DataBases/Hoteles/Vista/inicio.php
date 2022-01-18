<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container bg-danger">
    <form method="post" action="../Controladores/c_lista.php">
        <div class="form-group row">
            <div class="col-12 text-center text-light">
                <h1>Inicio de sesion</h1>
            </div>
            <label class="sr-only" for="name">User Name</label>
            <div class="col-12">
                <input type="text" class="form-control mb-2 mr-2 text-center" name="name" id="uName"
                       placeholder="User Name">
            </div>
            <label class="sr-only" for="password">password</label>
            <div class="col-12">
                <input type="password" class="form-control mb-2 mr-2 text-center" name="password" id="password"
                       placeholder="Password">
            </div>
        </div>


        <div class="col-6 float-left">
            <button type="submit" class="btn btn-success w-100 mb-2">Sign In</button>
        </div>
    </form>
    <div class="col-6 offset-6">
        <a href="../Controladores/c_registro.php">
            <button class="btn btn-primary w-100 mb-2">Register</button>
        </a>
    </div>
</div>
</body>