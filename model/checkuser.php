<?php
require('db-functions.php');
$dbh = connect();

if (isset($_POST['username'])) { //if we get the name successfully
    $username = $_POST['username'];
    checkUsername($username);
    getAllCharacters();
}

?>





