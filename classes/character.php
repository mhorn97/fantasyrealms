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
    protected $story3id;
    protected $story4id;
    protected $choice1;
    protected $choice2;
    protected $choice3;
    protected $choice4;
    protected $bio;



    /**
     * Character constructor. Construction of the user requires 4 parameters
     * @param $name name of the character
     * @param $gender of the character
     * @param $class of the character
     * @param $race of the character
     */
    function __construct($name, $gender, $class, $race)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->class = $class;
        $this->race = $race;
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


/****** STORY CHOICES ******/

    /**
     * @return mixed
     */
    public function getStory3id()
    {
        return $this->story3id;
    }

    /**
     * @param mixed $story3id
     */
    public function setStory3id($story3id)
    {
        $this->story3id = $story3id;
    }

    /**
     * @return mixed
     */
    public function getStory4id()
    {
        return $this->story4id;
    }

    /**
     * @param mixed $story4id
     */
    public function setStory4id($story4id)
    {
        $this->story4id = $story4id;
    }

    /**
     * @return mixed
     */
    public function getChoice1()
    {
        return $this->choice1;
    }

    /**
     * @param mixed $choice1
     */
    public function setChoice1($choice1)
    {
       $this->choice1 = $choice1;
    }

    /**
     * @return mixed
     */
    public function getChoice2()
    {
        return $this->choice2;
    }

    /**
     * @param mixed $choice2
     */
    public function setChoice2($choice2)
    {
        $this->choice2 = $choice2;
    }

    /**
     * @return mixed
     */
    public function getChoice3()
    {
        return $this->choice3;
    }

    /**
     * @param mixed $choice3
     */
    public function setChoice3($choice3)
    {
        $this->choice3 = $choice3;
    }

    /**
     * @return mixed
     */
    public function getChoice4()
    {
        return $this->choice4;
    }

    /**
     * @param mixed $choice4
     */
    public function setChoice4($choice4)
    {
        $this->choice4 = $choice4;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }


}