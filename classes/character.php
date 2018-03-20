<?php
/**
 * Created by PhpStorm.
 * @author Michael Horn & Anthony Thompson
 * Date: 2/25/2018
 * Time: 3:51 PM
 * @version 1.0
 */

/**
 * Class representing a basic character in FantasyRealms
 */
class Character
{
    protected $name;
    protected $gender;
    protected $class;
    protected $race;
    protected $skills;
    protected $iduser;


    /**
     * Character constructor. Construction of the user requires 4 parameters
     * @param $name name of the character
     * @param $gender of the character
     * @param $class of the character
     * @param $race of the character
     */
    function __construct($name, $gender, $class, $race,$bio)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->class = $class;
        $this->race = $race;
        $this->bio = $bio;
    }

    /**
     * Gets the character's name
     * @return name of the character
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * Sets the characters name to the parameter
     * @param $name new name for the character
     */
    function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the character's gender
     * @return gender of the character
     */
    function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets the gender of the character to the parameter
     * @param $gender gender for the character to be
     */
    function setGender($gender)
    {
        $this->gender= $gender;
    }

    /**
     * Gets the character's race
     * @return race of the character;
     */
    function getRace()
    {
        return $this->race;
    }

    /**
     * Sets the race of the character to the parameter
     * @param $race race for the character to be set to
     */
    function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * Gets the character's class
     * @return class of the character
     */
    function getClass()
    {
        return $this->class;
    }

    /**
     * Sets the class of the character to the parameter
     * @param $class class for the chracter to be set to
     */
    function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * Gets the user id attached to the character
     * @return userid attached to the character
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Changes the user id that is attached to the character
     * @param $iduser for the character's userid to be set to
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    public function getBio()
    {
        return $this->bio;
    }

}