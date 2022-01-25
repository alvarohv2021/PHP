<?php

?>
<form action="../controladores/c_registro.php" method="post">
    <label for="nombre">Nombre de Usuario</label>
    <input type="text"><br>

    <label for="correo">Correo</label>
    <input type="text" name="email"><br>

    <label for="password">Contraseña</label>
    <input type="password" name="password"><br>

    <button type="submit">Iniciar</button>
</form>
<a href="../controladores/c_iniciar.php">Inicio de sesion</a>
