<?php
session_start();
//include("funciones.php");

if (isset($_POST["userName"]) && $_POST["userName"]!="" && isset($_POST["password"]) && $_POST["password"]!="" && isset($_POST["email"]) && $_POST["email"]!="") {
    $insercionCorrecta=insertarDatosUsuario($_POST["userName"], $_POST["password"], $_POST["email"]);

    if ($insercionCorrecta=false){
        $_POST["userName"]=null;
    }else{
        $_SESSION["Username"]=$_POST["userName"];
        header("Location: pagina_principal.php");
    }
}

?>
<html>
<head>
    <title>Registro</title>
    <link href="estilos/usuario.css" type="text/css" rel="stylesheet">
    <script>
        function validateForm() {
            var x = document.forms["myForm"]["userName"].value;
            if (x == "" || x == null) {
                alert("Name must be filled out");
                return;
            }
            x = document.forms["myForm"]["password"].value;
            if (x == "" || x == null) {
                alert("Pasword must be filled out");
                return;
            }
            x = document.forms["myForm"]["email"].value;
            if (x == "" || x == null) {
                alert("Email must be filled out");
                return;
            }
        }
    </script>
</head>
<body>
<div class="registro">
    <form name="myForm" method="post" action="" onsubmit="return validateForm()">
        <table class="table">
            <tr>
                <th>Nombre de Usuario</th>
            </tr>
            <tr>
                <td><input name="userName" type="text" pattern="[A-Z]+[a-z]+[0-9]+" style="text-align: center"
                           placeholder="User1"
                           title="Debe empezar por mayuscula seguido de minusculas y acabado en numeros"></td>
            </tr>
            <tr>
                <th>Pasword</th>
            </tr>
            <tr>
                <td><input name="password" type="password" pattern="[A-Z]+[a-z]+[0-9]+" style="text-align: center"
                           placeholder="Aa1"></td>
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
