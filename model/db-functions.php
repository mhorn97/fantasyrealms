<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 2/27/2018
 * Time: 11:01 AM
 */
require("db-config-route.php");

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
function addCharacter($characterobject)
{
    global $dbh;
    $useriduser = $characterobject->getiduser();
    //$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO characters (user_iduser, characterobject)
            VALUES (:user_iduser, :characterobject)";
    $statement = $dbh->prepare($sql);

    $statement->bindParam(':user_iduser', $useriduser, PDO::PARAM_INT);
    $statement->bindParam(':characterobject', $characterobject, PDO::PARAM_STR);

    $success = $statement->execute();
    return $success;
}//end addCharacter


//adds character from character object parameter
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




//gets characters from user id
function getCharacters($useriduser)
{
    global $dbh;

    $sql = "SELECT * FROM characters WHERE user_iduser = :user_iduser ORDER BY idcharacter";
    $statement = $dbh->prepare($sql);

    $statement->bindParam(':user_iduser', $useriduser, PDO::PARAM_INT);

    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}//end getCharacters



//gets all characters from all players
function getAllCharacters()
{
    global $dbh;
    $sql = "SELECT * FROM characters ORDER BY idcharacter";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}//end getAllCharacters


function checkUsername($username)
{
    global $dbh;
    $sql = "SELECT * FROM user WHERE username = :username";
    $statement = $dbh->prepare($sql);
    $statement->bindValue(':name', $username, PDO::PARAM_STR);
    $success = $statement->execute();
    //TODO check if 0 entries returned or more, return true false if exists
    return $success;
}//end checkUsername

function checkUser($username, $password)
{
    global $dbh;

    $sql = "SELECT * FROM user WHERE username = :username AND password = :password";

    $statement = $dbh->prepare($sql);
    $statement->bindValue(':username',$username,PDO::PARAM_STR);
    $statement->bindValue(':password',$password,PDO::PARAM_STR);

    $statement->execute();

    $query_data = $statement->fetch(PDO::FETCH_ASSOC);

    echo "TEST";
    echo $query_data['username'] . $username;
    if(empty($query_data['username']))
    {
        return false;
    }
    else
    {
        return true;
    }
}











