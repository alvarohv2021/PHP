<?php
?>
<head>
    <style>
        table, tr, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>
</head>
<body>
<h1>Countries</h1>
<h2>My countries</h2>
<table>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Population</th>
        <th>GNP</th>
        <th>NumLanguages</th>
        <th>NumCities</th>
        <th>Owner</th>
    </tr>
    <?php for ($i = 0; $i < count($myCountries); $i++) { ?>
        <tr>
            <td><?php echo $myCountries[$i]->getCode() ?></td>
            <td><?php echo $myCountries[$i]->getName() ?></td>
            <td><?php echo $myCountries[$i]->getPopulation() ?></td>
            <td><?php echo $myCountries[$i]->getGnp() ?></td>
            <td><?php echo $countryLanguages[$i]['count(*)'] ?></td>
            <td><?php echo $numCities[$i]['count(*)'] ?></td>
            <td><?php echo $mail ?></td>
        </tr>
    <?php } ?>
</table>

<h2>Other Countries</h2>
<table>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Population</th>
        <th>GNP</th>
        <th>NumLanguages</th>
        <th>NumCities</th>
        <th>Owner</th>
        <th>Action</th>
    </tr>
    <?php for ($i = 0; $i < count($oterCountries); $i++) { ?>
        <tr>
            <td><?php echo $oterCountries[$i]->getCode() ?></td>
            <td><?php echo $oterCountries[$i]->getName() ?></td>
            <td><?php echo $oterCountries[$i]->getPopulation() ?></td>
            <td><?php echo $oterCountries[$i]->getGnp() ?></td>
            <td><?php echo $countryLanguages[$i]['count(*)'] ?></td>
            <td><?php echo $numCities[$i]['count(*)'] ?></td>
            <td><?php echo $mail ?></td>
        </tr>
    <?php } ?>
</table>


<a href="../controladores/c_cierre.php">LogOut</a>
</body>
