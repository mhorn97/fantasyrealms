<?php
/**
 * File for checking if the user is in the database
 * @author Michael Horn & Anthony Thompson
 * @version 1.0
 */
require('db-functions.php');
$dbh = connect();

if (isset($_POST['username'])) { //if we get the name successfully
    $username = $_POST['username'];
    checkUsername($username);
}

?>





