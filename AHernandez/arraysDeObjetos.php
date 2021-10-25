<?php

$seed = 0242; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

//NOTE: Arrays unsorted
$characters = json_decode(file_get_contents($api_url . "characters"), true);
$episodes = json_decode(file_get_contents($api_url . "episodes"), true);
$locations = json_decode(file_get_contents($api_url . "locations"), true);
$sortedLocations = getSortedLocationsById($locations); //variable global que contiene las localicaciones ordenadas por el id
$mappedCharacters = mapCharacters($characters);

function getSortedLocationsById($locations)
{
    for ($i = 0; $i < count($locations); $i++) {
        for ($j = 0; $j < count($locations); $j++) {
            if ($locations[$i]['id'] < $locations[$j]['id']) {
                $aux = $locations[$i];
                $locations[$i] = $locations[$j];
                $locations[$j] = $aux;
            }
        }
    }
    return $locations;
}

function mapCharacters($characters)
{
    global $sortedLocations;//Sustituir el valor de "origin" en el array $characters
                            // por el valor de "name" del array locations

    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($sortedLocations); $j++) {
            if ($characters[$i]['origin'] == $sortedLocations[$j]['id']) {
                $characters[$i]['origin'] = $sortedLocations[$j]['name'];
            } else if ($characters[$i]['origin'] == "0") {
                $characters[$i]['origin'] = "Unknown";
            }
        }
    }

    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($sortedLocations); $j++) {
            if ($characters[$i]['location'] == $sortedLocations[$j]['id']) {
                $characters[$i]['location'] = $sortedLocations[$j]['name'];
            }
        }
    }
    return $characters;
}

class Characters
{
    private $id, $name, $status, $species, $type, $gender, $origin, $location, $image, $created;

    public function __construct($id, $name, $status, $species, $type, $gender, $origin, $location, $image, $created)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->species = $species;
        $this->type = $type;
        $this->gender = $gender;
        $this->origin = $origin;
        $this->location = $location;
        $this->image = $image;
        $this->created = $created;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function setSpecies($species)
    {
        $this->species = $species;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getOrigin()
    {
        return $this->origin;
    }

    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }


}



$pj = array();
for ($i = 0; $i < count($mappedCharacters); $i++) {
    $pj[] = new Characters($mappedCharacters[$i]["id"], $mappedCharacters[$i]['name'], $mappedCharacters[$i]['status'], $mappedCharacters[$i]['species'], $mappedCharacters[$i]['type'], $mappedCharacters[$i]['gender'], $mappedCharacters[$i]['origin'], $mappedCharacters[$i]['location'], $mappedCharacters[$i]['image'], $mappedCharacters[$i]['created']);
}
var_dump($pj);


?>