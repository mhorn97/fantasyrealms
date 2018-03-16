<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 2/27/2018
 * Time: 11:01 AM
 */
require("db-config-route.php");

//establish database connection
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


//adds character from character object parameter
function addCharacter($name,$gender,$race,$class,$skills,$userid)
{
    global $dbh;
    //$useriduser = $characterobject->getiduser();
    //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO characters (name,gender,class,race,traits,iduser)
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


//adds new user account
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
function getAllCharacters()
{
    global $dbh;
    $sql = "SELECT * FROM characters ORDER BY characterId";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}//end getAllCharacters


//checks database to see if username already in use
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

function deleteCharacter($id)
{
    global $dbh;

    $sql = "DELETE FROM characters WHERE characterId = :id";

    $statement = $dbh->prepare($sql);
    $statement->bindValue(':id',$id,PDO::PARAM_INT);

    $statement->execute();
}


