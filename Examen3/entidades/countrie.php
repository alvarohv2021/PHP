<?php

class countrie
{
private $code,$name,$population,$gnp,$capital,$UserId;

    /**
     * @param $code
     * @param $name
     * @param $population
     * @param $gnp
     * @param $capital
     * @param $UserId
     */
    public function __construct($code, $name, $population, $gnp, $capital, $UserId)
    {
        $this->code = $code;
        $this->name = $name;
        $this->population = $population;
        $this->gnp = $gnp;
        $this->capital = $capital;
        $this->UserId = $UserId;
    }

}