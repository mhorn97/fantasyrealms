<?php
require('db-functions.php');

if (isset($_POST['username'])) { //if we get the name succesfully
    $username = $_POST['username'];
    checkUsername($username);

}

?>





