<?php

$servername = "localhost";
$username = "root";
$password = "2609Ahv*";


/*$servername = "sql480.main-hosting.eu";
$username = "u850300514_ahernandez";
$password = "x43470242N";*/

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IMDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
/*
 -- p1
insert into Peliculas(name,estreno,DirectorID,Trailer,Foto)values('Cadena perpetua','1994',1,'https://www.youtube.com/watch?v=awZGlOG0GZE','https://pics.filmaffinity.com/Cadena_perpetua-576140557-large.jpg');

-- p2
insert into Peliculas(name,estreno,DirectorID,Trailer,Foto)
values(‘El padrino’,’1972’,2,’https://www.youtube.com/watch?v=gCVj1LeYnsc’,’https://static.wikia.nocookie.net/doblaje/images/9/9a/Elpadrino.jpg/revision/latest?cb=20211023042804&path-prefix=es’);

-- p3
insert into Peliculas(name,estreno,DirectorID,Trailer,Foto)
values(‘El padrino: Parte II’,’1974’,2,’https://www.youtube.com/watch?v=2X4hIriy8U8’,’https://static.wikia.nocookie.net/doblaje/images/8/8c/The-Godfather-Part-II.jpg/revision/latest?cb=20100312183831&path-prefix=es’);

-- p4
insert into Peliculas(name,estreno,DirectorID,Trailer,Foto)
values(‘El caballero oscuro’,’2008’,3,’https://www.youtube.com/watch?v=zrXP6TYK8rY’,’https://pics.filmaffinity.com/El_caballero_oscuro-102763119-large.jpg’);

-- p5
insert into Peliculas(name,estreno,DirectorID,Trailer,Foto)
values(‘12 hombres sin piedad’,’1957’,4,’https://www.youtube.com/watch?v=hiyJZP-MlxM’,’https://pics.filmaffinity.com/Doce_hombres_sin_piedad-256613265-large.jpg’);

-- p6
insert into Peliculas(name,estreno,DirectorID,Trailer,Foto)
values(‘La lista de Schindler’,’1993’,5,’https://www.youtube.com/watch?v=BmkchuRJ82w’,’https://images-na.ssl-images-amazon.com/images/I/91H6ueCBD1L.jpg’);

-- p7
insert into Peliculas(name,estreno,DirectorID,Trailer,Foto)
values(‘El señor de los anillos: El retorno del rey’,’2003’,6,’https://www.youtube.com/watch?v=h-9RYiqyqjk’,’https://pics.filmaffinity.com/El_se_or_de_los_anillos_El_retorno_del_rey-164432989-large.jpg’);


-- p8
insert into Peliculas(name,estreno,DirectorID,Trailer,Foto)
values(‘Pulp Fiction’,’1994’,7,’https://www.youtube.com/watch?v=auCgsj0MV-M’,’https://pics.filmaffinity.com/Pulp_Fiction-210382116-large.jpg);

-- p9
insert into Peliculas(name,estreno,DirectorID,Trailer,Foto)
values(‘El bueno, el feo y el malo’,’1966’,8,’https://www.youtube.com/watch?v=exJOy6uTkek’,’https://es.web.img3.acsta.net/pictures/14/03/21/13/49/293020.jpg’);

-- p10
insert into Peliculas(name,estreno,DirectorID,Trailer,Foto)
values(‘El señor de los anillos: La comunidad del anillo’,’2001’,6,’https://www.youtube.com/watch?v=2KTjutR3mGA’,’https://pics.filmaffinity.com/El_se_or_de_los_anillos_La_comunidad_del_anillo-744631610-large.jpg’);


 */
$conn->close();
?>