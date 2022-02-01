<?php
include_once("../entidades/film.php")
?>
<head>
    <style>
        table, th, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>

<h1>Sakila</h1>
<h2>My rented films</h2>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Release year</th>
        <th>Language</th>
        <th>Length</th>
        <th>Rating</th>
        <th>Actors</th>
        <th>Categories</th>
        <th><a>Return</a></th>
    </tr>
    <?php
    for ($i = 0; $i < count($films); $i++) { ?>
        <tr>
            <td><?php echo $films[$i]->getId() ?></td>
            <td><?php echo $films[$i]->getTitle() ?></td>
            <td><?php echo $films[$i]->getDescription() ?></td>
            <td><?php echo $films[$i]->getReleaseY() ?></td>
            <td><?php echo $films[$i]->getLanguage() ?></td>
            <td><?php echo $films[$i]->getLenght() ?></td>
            <td><?php echo $films[$i]->getRating() ?></td>
            <td>
                <?php for ($j=0;$j<count($films[$i]->getActors());$j++){
                    $actores=$films[$i]->getActors();
                    echo $actores[$j].",<br>";
                }?>
            </td>

            <td>
                <?php for ($j=0;$j<count($films[$i]->getCategories());$j++){
                    $categorias=$films[$i]->getCategories();
                    echo $categorias[$j].",<br>";
                }?>
            </td>
            <td><a href="../controladores/c_main.php">Return</a></td>
        </tr>
    <?php } ?>

</table>
<h2>Other Films</h2>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Release year</th>
        <th>Language</th>
        <th>Length</th>
        <th>Rating</th>
        <th>Actors</th>
        <th>Categories</th>
        <th><a>Return</a></th>
    </tr>
    <?php
    for ($i = 0; $i < count($otherFilms); $i++) { ?>
        <tr>
            <td><?php echo $otherFilms[$i]->getId() ?></td>
            <td><?php echo $otherFilms[$i]->getTitle() ?></td>
            <td><?php echo $otherFilms[$i]->getDescription() ?></td>
            <td><?php echo $otherFilms[$i]->getReleaseY() ?></td>
            <td><?php echo $otherFilms[$i]->getLanguage() ?></td>
            <td><?php echo $otherFilms[$i]->getLenght() ?></td>
            <td><?php echo $otherFilms[$i]->getRating() ?></td>
            <td>
                <?php for ($j=0;$j<count($otherFilms[$i]->getActors());$j++){
                    $actores=$otherFilms[$i]->getActors();
                    echo $actores[$j].",<br>";
                }?>
            </td>

            <td>
                <?php for ($j=0;$j<count($otherFilms[$i]->getCategories());$j++){
                    $categorias=$otherFilms[$i]->getCategories();
                    echo $categorias[$j].",<br>";
                }?>
            </td>
            <td><a href="../controladores/c_main.php">Return</a></td>
        </tr>
    <?php } ?>

</table>