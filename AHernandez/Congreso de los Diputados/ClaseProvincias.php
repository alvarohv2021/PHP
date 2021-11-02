<?php

class Provincias{
    private $id,$name,$delegates;

    public function __construct($id, $name, $delegates)
    {
        $this->id = $id;
        $this->name = $name;
        $this->delegates = $delegates;
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

    public function getDelegates()
    {
        return $this->delegates;
    }

    public function setDelegates($delegates)
    {
        $this->delegates = $delegates;
    }


}
?>
