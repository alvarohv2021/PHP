<?php

class Multimedias
{

    //neighborhood
    private $id, $propertyId, $url;

    public function __construct($id, $propertyId, $url)
    {
        $this->id = $id;
        $this->propertyId = $propertyId;
        $this->url = $url;
    }

//*******************************************

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPropertyId()
    {
        return $this->propertyId;
    }

    public function setPropertyId($propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
}