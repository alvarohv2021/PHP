<?php
include("clases/Peliculas.php");
include("clases/Actores.php");

//****************Conexion******************
$server = "sql480.main-hosting.eu";
$user = "u850300514_ahernandez";
$password = "x43470242N";
$db = "u850300514_ahernandez";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//**********************Arrays asociativas****************************

$resultPeliculas = $conn->query("SELECT * FROM Peliculas");
$Pelicula_asociativo = $resultPeliculas->fetch_all(MYSQLI_ASSOC);

//**********************Creacion de objetos*******************************
$arrayOBJ_Peliculas = crearArrayObjetosPelicula($Pelicula_asociativo);

function crearArrayObjetosPelicula($arrayPeliculas)
{
    for ($i = 0; $i < count($arrayPeliculas); $i++) {
        $arrayOBJ_Peliculas[$i] = new Pelicula($arrayPeliculas[$i]['id'], $arrayPeliculas[$i]['name'],
            $arrayPeliculas[$i]['estreno'], $arrayPeliculas[$i]['DirectorID'], $arrayPeliculas[$i]['Trailer'],
            $arrayPeliculas[$i]['Foto'], $arrayPeliculas[$i]['Calificacion']);
    }
    return $arrayOBJ_Peliculas;
}

//*******************************Mapeado de datos**************************************

function arrayGenerosDePelicula($idPelicula)
{
    global $coon;
    $sql = "select Generos.genero from Generos
join PeliculasGeneros on Generos.id = PeliculasGeneros.IdGenero
where PeliculasGeneros.IdPelicula = " . $idPelicula . ";";

    $query = $coon->query($sql);
    $arrayGenerosDePelicula = $query->fetch_all(MYSQLI_ASSOC);
    for ($i = 0; $i < count($arrayGenerosDePelicula); $i++) {
        $result[] = $arrayGenerosDePelicula[$i]['genero'];
    }
    return $result;
}
//**********************Guardar usuario en BD*************************************
function insertarDatosUsuario($username, $pasword, $email)
{
    global $coon;

    $email = $coon->real_escape_string($email);
    $pasword = password_hash($pasword, PASSWORD_DEFAULT);

    $sql = 'insert into Usuarios (Username,Pasword,Email) values 
            ("' . $username . '","' . $pasword . '","' . $email . '")';

    if ($coon->query($sql) === TRUE) {

        $query = $coon->query('select id from Usuarios where Username = "' . $username . '"');
        $id = $query->fetch_assoc();
        return $id['id'];

    } else {
        echo "Error: " . $sql . "<br>" . $coon->error;
        return false;
    }

}
//**********************Comprobar los datos del usuario introducido*************************************
function comprobarInicio($username, $pasword)
{
    global $coon;

    $query = $coon->query('select Pasword from Usuarios where Username = "' . $username . '"');
    $pwdBD = $query->fetch_assoc();
    $hash = $pwdBD["Pasword"];

    if (password_verify($pasword, $hash)) {
        $query = $coon->query('select id from Usuarios where Username = "' . $username . '"');
        $id = $query->fetch_assoc();
        return $id['id'];
    } else {
        return false;
    }
}
//****************************Insertar comentarios en la base de datos******************************
function insertarComentario($idPelicula,$idUsuario,$comentario){
    global $coon;

    $sql = 'insert into Comentarios (idPelicula,idUsuario,comentario)
values ("' . $idPelicula . '","' . $idUsuario . '","' . $comentario . '")';

    if ($coon->query($sql) === TRUE) {
        echo "Todo ha ido bien";
    } else {
        echo "Error: " . $sql . "<br>" . $coon->error;
    }
}

function mostarComentariosDePelicula($pelicalId){
    global $coon;

    $sql='SELECT Usuarios.Username, Comentarios.comentario FROM Comentarios
join Usuarios on Comentarios.idUsuario = Usuarios.id
where Comentarios.idPelicula ='."$pelicalId".';';

    $query = $coon->query($sql);
    return $arrayComentariosUsuarios = $query->fetch_all(MYSQLI_ASSOC);
}

function arrayObjetosActoresDePelicula($idPelicula)
{
    global $coon;
    $sql = "select Actores.* from Actores
join PeliculasActores on Actores.id = PeliculasActores.IdActor
where PeliculasActores.IdPelicula=" . $idPelicula . ";";

    $query = $coon->query($sql);
    $arrayActoresDePelicula = $query->fetch_all(MYSQLI_ASSOC);

    /* echo '<pre>';
     var_dump(arrayPeliculasIDsActor(1));
     echo '</pre>';*/

    for ($i = 0; $i < count($arrayActoresDePelicula); $i++) {
        $result[] = new Actor($arrayActoresDePelicula[$i]['id'], $arrayActoresDePelicula[$i]['name'],
            $arrayActoresDePelicula[$i]['nacimiento'], $arrayActoresDePelicula[$i]['imagen']);

        $result[$i]->setPeliculasId(arrayPeliculasIDsActor($arrayActoresDePelicula[$i]['id']));

    }
    return $result;
}

function arrayPeliculasIDsActor($idActor)
{
    global $coon;
    $sql = "select PeliculasActores.IdPelicula from Actores
join PeliculasActores on Actores.id = PeliculasActores.IdActor
where Actores.id=" . $idActor . ";";

    $query = $coon->query($sql);


    $peliculas = array();
    while ($resultado = $query->fetch_assoc()) {
        $peliculas[] = $resultado["IdPelicula"];
    }

    return $peliculas;
}

function directorPelicula($idPelicula)
{
    global $coon;
    $sql = "select Directores.name from Peliculas
join Directores on Peliculas.DirectorID =Directores.id
where Peliculas.id=" . $idPelicula . ";";

    $query = $coon->query($sql);
    $arrayDirectorPelicula = $query->fetch_all(MYSQLI_ASSOC);

    return $directorPelicula = $arrayDirectorPelicula[0]['name'];
}

function insertarArrayActoresYGeneros(Pelicula $pelicula)
{
    $pelicula->setActores(arrayObjetosActoresDePelicula($pelicula->getId()));
    $pelicula->setGeneros(arrayGenerosDePelicula($pelicula->getId()));
    $pelicula->setDirector(directorPelicula($pelicula->getId()));
}

for ($i = 0; $i < count($arrayOBJ_Peliculas); $i++) {
    insertarArrayActoresYGeneros($arrayOBJ_Peliculas[$i]);
}
?>