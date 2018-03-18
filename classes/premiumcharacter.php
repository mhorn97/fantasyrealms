<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 2/25/2018
 * Time: 3:56 PM
 * @author Michael Horn & Anthony Thompson
 */

/**
 * Class PremiumCharacter extends the Character class by
 * adding skills
 */
class PremiumCharacter extends Character
{
    //Skills array for multiple skills
    private $_skills = array();

    /**
     * Changes the characters skills to the array in the parameter
     * @param $skills array for the premium characters skills to be set to
     */
    function setSkills($skills)
    {
        $this->_skills = $skills;
    }

    /**
     * Gets the premium character's array of skills
     * @return skills array of character
     */
    function getSkills()
    {
        return $this->_skills;
    }
}