<?php

class countrie
{
    private $code, $name, $population, $gnp, $capital, $UserId;

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

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @return mixed
     */
    public function getGnp()
    {
        return $this->gnp;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->UserId;
    }


}