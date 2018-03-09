<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 2/25/2018
 * Time: 3:51 PM
 */

class Character
{
    protected $name;
    protected $class;
    protected $race;
    protected $skills;
    protected $iduser;

    function __construct($name, $class, $race, $iduser)
    {
        $this->name = $name;
        $this->class = $class;
        $this->race = $race;
        $this->iduser = $iduser;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function getRace()
    {
        return $this->race;
    }

    function setRace($race)
    {
        $this->race = $race;
    }

    function getClass()
    {
        return $this->class;
    }

    function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param mixed $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }


}