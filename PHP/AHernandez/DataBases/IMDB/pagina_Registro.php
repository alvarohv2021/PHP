<?php
session_start();
?>
<html>
<head>
    <title>Registro</title>
    <link href="estilos/usuario.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="registro">
    <table>
        <tr>
            <th>Nombre de Usuario</th>
        </tr>
        <tr>
            <td><input type="text" style="text-align: center" placeholder="User1"></td>
        </tr>
        <tr>
            <th>Pasword</th>
        </tr>
        <tr>
            <td><input type="password" style="text-align: center" placeholder="Pasword"></td>
        </tr>
        <tr>
            <th>Email</th>
        </tr>
        <tr>
            <td><input type="text" style="text-align: center" placeholder="user1@gmail.com"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Registrarse"></td>
        </tr>
    </table>
</div>
</body>
</html>
