<?php
session_start();
?>
<html>
<head>
    <title>Inicio</title>
    <link href="estilos/usuario.css" type="text/css" rel="stylesheet">
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["userName"].value;
            if (x == "" || x == null) {
                alert("Name must be filled out");
                return false;
            }
            x = document.forms["myForm"]["password"].value;
            if (x == "" || x == null) {
                alert("Pasword must be filled out");
                return false;
            }
        }
    </script>
</head>
<body>
<div class="inicio">
    <form name="myForm" method="post" action="pagina_principal.php" onsubmit="return validateForm()">
        <table class="table">
            <tr>
                <th>Nombre de Usuario</th>
            </tr>
            <tr>
                <td><input name="userName" type="text" pattern="[A-Z]+[a-z]+[0-9]+" style="text-align: center" placeholder="User1" title="Debe empezar por mayuscula seguido de minusculas y acabado en numeros"></td>
            </tr>
            <tr>
                <th>Pasword</th>
            </tr>
            <tr>
                <td><input name="password" type="password"  pattern="[A-Z]+[a-z]+[0-9]+" style="text-align: center" placeholder="Aa1"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Iniciar sesion"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
