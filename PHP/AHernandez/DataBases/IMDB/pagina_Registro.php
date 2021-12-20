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
    <form method="post" action="pagina_principal.php">
        <table>
            <tr>
                <th>Nombre de Usuario</th>
            </tr>
            <tr>
                <td><input name="userName" type="text" pattern="[A-Za-z0-9]{1,20}" style="text-align: center" placeholder="User1" title="Debe empezar por mayuscula seguido de minusculas y acabado en numeros"></td>
            </tr>
            <tr>
                <th>Pasword</th>
            </tr>
            <tr>
                <td><input name="password" type="password"  style="text-align: center" placeholder="Pasword"></td>
            </tr>
            <tr>
                <th>Email</th>
            </tr>
            <tr>
                <td><input name="email" type="email" style="text-align: center" placeholder="user1@gmail.com"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Registrarse"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
