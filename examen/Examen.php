<?php
$seed = 0000; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

//NOTE: Arrays unsorted
$characters = json_decode(file_get_contents($api_url . "characters"), true);
$episodes = json_decode(file_get_contents($api_url . "episodes"), true);
$locations = json_decode(file_get_contents($api_url . "locations"), true);

function getSortedCharactersById($characters)
{
    //TODO: Your code here.
}

function getSortedCharactersByOrigin($characters)
{
    //TODO: Your code here.
}

function getSortedCharactersByStatus($characters)
{
    //TODO: Your code here.
}

//NOTE: OPTIONAL FUNCTION
function getSortedLocationsById($locations)
{
    //TODO: Your code here.
}

//NOTE: OPTIONAL FUNCTION
function getSortedEpisodesById($episodes)
{
    //TODO: Your code here.
}

function mapCharacters($characters)
{
    //TODO: Your code here.
}

//NOTE: Function to render each character card HTML. Don't edit.
function renderCard($character)
{
    $ch = curl_init('https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?data=render');
    $data = array("character" => $character);
    $postData = json_encode($data);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//NOTE: $sortingCriteria receive the sorting criteria of the form. Don't edit
$sortingCriteria = "";
if (isset($_GET["sortingCriteria"])) {
    $sortingCriteria = $_GET["sortingCriteria"];
    switch ($sortingCriteria) {
        case "id":
            $characters = getSortedCharactersById($characters);
            break;
        case "origin":
            $characters = getSortedCharactersByOrigin($characters);
            break;
        case "status":
            $characters = getSortedCharactersByStatus($characters);
            break;
    }
}

//NOTE: Save function returns to variables and then you can use it as globals if needed. Don't edit.
$sortedLocations = getSortedLocationsById($locations);
$sortedEpisodes = getSortedEpisodesById($episodes);
$mappedCharacters = mapCharacters($characters);

?>

<html lang="es">
<head>
    <title>RMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="rickandmorty.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option <?php echo($sortingCriteria == "" ? "selected" : "") ?> value="unsorted">Sorting criteria
                    </option>
                    <option <?php echo($sortingCriteria == "id" ? "selected" : "") ?> value="id">Id</option>
                    <option <?php echo($sortingCriteria == "origin" ? "selected" : "") ?> value="origin">Origin</option>
                    <option <?php echo($sortingCriteria == "status" ? "selected" : "") ?> value="status">Status</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<main role="main">
    <div class="py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php
                //TODO: Your code here.
                ?>
            </div>
        </div>
    </div>

</main>
</body>
</html>