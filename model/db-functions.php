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