<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 2/25/2018
 * Time: 3:56 PM
 */

class PremiumCharacter extends Character
{
    private $_skills = array();

    function setSkills($skills)
    {
        $this->_skills = $skills;
    }

    function getSkills()
    {
        return $this->_skills;
    }
}