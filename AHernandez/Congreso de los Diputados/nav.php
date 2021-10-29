<html>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="arrays.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option selected value="unsorted">Sorting criteria</option>
                    <option value="number">Circumscripcion</option>
                    <option value="birth">Partidos</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
</html>
<?php

if (isset($_GET["sortingCriteria"])) {

    if ($_GET["sortingCriteria"] == "Circumscripcion") {
        mostrarArray($provincias,$partidos);

    } elseif ($_GET["sortingCriteria"] == "Partidos") {
        $elephants = getSortedElephantsByBirth($elephants);
    }
}

?>