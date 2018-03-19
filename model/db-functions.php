<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 2/27/2018
 * Time: 11:01 AM
 * @author Michael Horn & Anthony Thompson
 * @version 1.0
 */
require("db-config-route.php");

/**
 * Connect to the database with a PDO
 * @return PDO|void PDO object to be used
 */
function connect()
{
    try {
        //Instantiate a database object
        $dbh = new PDO(DB_DSN, DB_USERNAME,
            DB_PASSWORD);
        //echo "Connected to database!!!";
        return $dbh;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return;
    }
}

/**
 * Adds a character object to the database
 * @param $name name of character
 * @param $gender gender of character
 * @param $race race of character
 * @param $class class of character
 * @param $skills skills/traits of the character
 * @param $userid user id of the character
 * @return bool if the character was added properly
 */
function addCharacter($name,$gender,$race,$class,$skills,$userid)
{
    global $dbh;
    //$useriduser = $characterobject->getiduser();
    //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO characters (name,gender,class,race,skills,iduser)
            VALUES (:name, :gender, :class, :race, :traits, :userid)";

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':userid', $userid, PDO::PARAM_INT);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
    $statement->bindParam(':race', $race, PDO::PARAM_STR);
    $statement->bindParam(':class', $class, PDO::PARAM_STR);
    $statement->bindParam(':traits', $skills, PDO::PARAM_STR);

    $success = $statement->execute();
    return $success;
}//end addCharacter

/**
 * edit a character object that is in the database
 * @param $name name of character
 * @param $gender gender of character
 * @param $race race of character
 * @param $class class of character
 * @param $skills skills/traits of the character
 * @param $id user id of the character
 */
function editCharacter($name,$gender,$race,$class,$skills, $id)
{
    global $dbh;

    $sql = "UPDATE characters SET name = :name , gender = :gender , class = :class , race = :race , skills = :skills WHERE characterId = :id";

    $statement = $dbh->prepare($sql);

    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
    $statement->bindParam(':race', $race, PDO::PARAM_STR);
    $statement->bindParam(':class', $class, PDO::PARAM_STR);
    $statement->bindParam(':skills', $skills, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();
}
/**
 * Adds a new user to the database
 * @param $username username for the user
 * @param $password password for the user
 * @param $premium if the user chose to be premium
 * @return bool true if added to the database properly
 */
function addUser($username, $password, $premium)
{
    global $dbh;

    //$password = sha1($password);  //password encrypted with SHA1

    //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO user (username, password, premium)
            VALUES (:username, :password, :premium)";
    $statement = $dbh->prepare($sql);

    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->bindParam(':premium', $premium, PDO::PARAM_INT);

    $success = $statement->execute();
    //$_SESSION['userid'] = $statement->lastInsertId();  //tracks the userid of new users
    return $success;
}//end addCharacter


//gets all characters for a single user id
/**
 * Gets all of the characters linked by a user id
 * @param $userid of the user logging in
 * @return array of characters linked to the user id
 */
function getCharacters($userid)
{
    global $dbh;

    $sql = "SELECT * FROM characters WHERE iduser = :iduser";
    $statement = $dbh->prepare($sql);

    $statement->bindParam(':iduser', $userid, PDO::PARAM_INT);

    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}//end getCharacters


//gets all characters from all players
/**
 * Gets all of the character for all of the users
 * @return array of characters
 */
function getAllCharacters()
{
    global $dbh;
    $sql = "SELECT * FROM characters ORDER BY characterId";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}//end getAllCharacters

/**
 * Checks if the username is linked to a user in the database
 * @param $username to be checked if in the database
 */
function checkUsername($username)
{
    global $dbh;
    $sql = "SELECT * FROM user WHERE username = :username";
    $statement = $dbh->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $success = $statement->execute();

    //check if 0 entries returned or more, return true false if exists
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        echo 1;  //username found existing
    } else {
        echo 2;  //username unused
    }
}//end checkUsername

//validates login information
/**
 * Checks if there is a user in the database with matching credentials
 * @param $username username to be checked with password
 * @param $password password to be checked with username
 * @return the user
 */
function checkUser($username, $password)
{
    global $dbh;

    $sql = "SELECT * FROM user WHERE username = :username AND password = :password";

    $statement = $dbh->prepare($sql);
    $statement->bindValue(':username',$username,PDO::PARAM_STR);
    $statement->bindValue(':password',$password,PDO::PARAM_STR);

    $statement->execute();

    $query_data = $statement->fetch(PDO::FETCH_ASSOC);

    return $query_data;
}

/**
 * Gets a single character with a character id
 * @param $id cheacter id that links to a particular character in the database
 * @return the character
 */
function getCharacter($id)
{
    global $dbh;

    $sql = "SELECT * FROM characters WHERE characterId = :id";

    $statement = $dbh->prepare($sql);
    $statement->bindValue(':id',$id,PDO::PARAM_INT);

    $statement->execute();

    $query_data = $statement->fetch(PDO::FETCH_ASSOC);
    return $query_data;
}

/**
 * Deletes a character in the database by searching for their character id
 * @param $id character id of character to be deleted
 */
function deleteCharacter($id)
{
    global $dbh;

    $sql = "DELETE FROM characters WHERE characterId = :id";

    $statement = $dbh->prepare($sql);
    $statement->bindValue(':id',$id,PDO::PARAM_INT);

    $statement->execute();
}

/**
 * Adding bio to the character after they complete their story
 * @param $bio of the character to be added
 * @param $id character id of character
 */
function addBio($bio,$id)
{
    global $dbh;

    $sql = "UPDATE characters SET bio = :bio WHERE characterId = :id";

    $statement = $dbh->prepare($sql);
    $statement->bindValue(':bio',$bio,PDO::PARAM_STR);
    $statement->bindValue(':id',$id,PDO::PARAM_INT);

    $statement->execute();
}

/**
 * randomly returns a story from the database
 * @return mixed single line from db with story info
 */
function getRandStory() {
    global $dbh;
    $sql = "SELECT * FROM story ORDER BY RAND() LIMIT 1";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}//end getRandStory

/**
 * pulls back a specific story from the database
 * @param $idstory int id of story to retrieve
 * @return mixed single line from db with story info
 */
function getStory($idstory) {
    global $dbh;
    $sql = "SELECT * FROM story WHERE idstory = :idstory";
    $statement = $dbh->prepare($sql);
    $statement->bindValue(':idstory',$idstory,PDO::PARAM_STR);

    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}//end getStory


/**
 * Gets a particular use by searching by username
 * @param $username of the user to find
 * @return bool if the user was found with that username
 */
function getUser($username)
{
    global $dbh;
    $sql = "SELECT * FROM user WHERE username = :username";
    $statement = $dbh->prepare($sql);
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $success = $statement->execute();


    //check if 0 entries returned or more, return true false if exists
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        return true;  //username found existing
    } else {
        return false;  //username unused
    }
}//end checkUsername

/**
 * Changes a users password in the database
 * @param $username username of the user
 * @param $password password of the user
 */
function changePassword($username,$password)
{
    global $dbh;
    $sql = "UPDATE user SET password = :password WHERE username = :username";

    $statement = $dbh->prepare($sql);
    $statement->bindValue(':password',$password,PDO::PARAM_STR);
    $statement->bindValue(':username',$username,PDO::PARAM_STR);

    $statement->execute();
}


/* sql to insert stories
  INSERT INTO `story`(`story`, `choice1`, `choice2`, `choice3`) VALUES (
    '',
    '',
    '',
    ''
)
 */