<?php

class Usuario
{
    private $id, $nombre, $email, $passsword;

    /**
     * @param $id
     * @param $nombre
     * @param $email
     * @param $passsword
     */
    public function __construct($id, $nombre, $email, $passsword)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->passsword = $passsword;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPasssword()
    {
        return $this->passsword;
    }

}