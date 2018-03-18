<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 3/16/2018
 * Time: 11:33 AM
 * @author Michael Horn & Anthony Thompson
 * @version 1.0
 */
require('db-functions.php');
$dbh = connect();

if (isset($_POST['id'])) { //if we get the name successfully
    $id = $_POST['id'];
    deleteCharacter($id);
}
