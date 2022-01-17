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
<form>
    <div class="container bg-danger">
        <div class="form-group row">
            <div class="col-12">
                <h1>Inicio de sesion</h1>
            </div>
            <label class="sr-only" for="uName">User Name</label>
            <div class="col-12">
                <input type="text" class="form-control mb-2 mr-2" id="uName" placeholder="User Name">
            </div>
            <label class="sr-only" for="email">email</label>
            <div class="col-12">
                <input type="email" class="form-control mb-2 mr-2" id="email" placeholder="Email Address">
            </div>
            <label class="sr-only" for="password">password</label>
            <div class="col-12">
                <input type="password" class="form-control mb-2 mr-2" id="password" placeholder="Password">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-2">
                <button type="submit" class="btn btn-light">I Agree</button>
            </div>
            <div class="col-10">
                <p>By clicking on
                    <button class="btn btn-primary btn-sm">Register</button>
                    you are agreeing to the <a href="google.com">Terms and
                        Conditions</a> set out by this site, including our Coockie Use
                </p>
            </div>
            <div class="col-6">
                <button class="btn btn-primary w-100 mb-2">Register</button>
            </div>
            <div class="col-6">
                <button class="btn btn-success w-100 mb-2">Sign In</button>
            </div>
        </div>

    </div>
</form>
</body>