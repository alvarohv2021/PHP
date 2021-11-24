<?php

class Propiedades
{
private $id,$countryId,$stateId,$cityId,$neighborhoodId
,$zipcode,$latitude,$longitude,$date,$description,$bathrooms,$floor
,$rooms,$surface;

    public function __construct($id, $countryId, $stateId, $cityId, $neighborhoodId, $zipcode, $latitude, $longitude, $date, $description, $bathrooms, $floor, $rooms, $surface)
    {
        $this->id = $id;
        $this->countryId = $countryId;
        $this->stateId = $stateId;
        $this->cityId = $cityId;
        $this->neighborhoodId = $neighborhoodId;
        $this->zipcode = $zipcode;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->date = $date;
        $this->description = $description;
        $this->bathrooms = $bathrooms;
        $this->floor = $floor;
        $this->rooms = $rooms;
        $this->surface = $surface;
    }


}

/*

class Partidos
{
    private $id, $name, $acronym, $logo, $colour, $totalVotos, $totalEscanos;

    public function __construct($id, $name, $acronym, $logo, $colour)
    {
        $this->id = $id;
        $this->name = $name;
        $this->acronym = $acronym;
        $this->logo = $logo;
        $this->colour = $colour;
    }
*/