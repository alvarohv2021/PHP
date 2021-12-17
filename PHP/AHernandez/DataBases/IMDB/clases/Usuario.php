<?php

class Usuario
{
    private $username,$pasword,$email;

    /**
     * @param $username
     * @param $pasword
     * @param $email
     */
    public function __construct($username, $pasword, $email)
    {
        $this->username = $username;
        $this->pasword = $pasword;
        $this->email = $email;
    }

    public function insertarUsuarioBD(){
        global $conn;
        $sql="UPDATE 'u850300514_ahernandez'.'Actores' SET 
        'Email' = '".$this->email."' 
        'Username'='".$this->username."'
        'Pasword'='".$this->pasword."';";

        if ($conn->query($sql)===true){
            echo "Tabla actualizada correctamente";
        }
    }

}