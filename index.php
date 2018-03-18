<?php
// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);


require_once ('vendor/autoload.php');
session_start();
require("model/db-functions.php");

$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

//Connect to the database
$dbh = connect();
/*require_once ('vendor/autoload.php');
require_once('model/db-functions.php');
session_start();
/*
 * List of all session variables
 *
 * username
 * password
 * premium
 * userid
 * newchar


$f3 = Base::instance();

$f3->set('DEBUG', 3);

//Connect to the database
$dbh = connect();
*/
//Login page
$f3 -> route('GET|POST /', function($f3) {
    $f3->set('error', 'Please Sign In');
    $_SESSION['username'] = "";
    $_SESSION['password'] = "";
    $_SESSION['userid'] = "";
    if(isset($_POST['submit']))
    {

        if(!is_null($_POST['username'] && !is_null($_POST['password'])))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $data = checkUser($username,$password);
            if(!empty($data['username']))
            {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['premium'] = $data['premium'];
                $_SESSION['userid'] = $data['iduser'];
                header("Location:select");
            } else {
                $f3->set('error', 'Incorrect Login');
            }
        }
    }
    $template = new Template();
    echo $template->render('views/loginScreen.html');
});

//CHARACTER CREATION PAGE
$f3 -> route('GET|POST /creation', function($f3) {
    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }
    $f3->set('premium', $_SESSION['premium']);

    if(isset($_POST['submit']))
    {
        if(!empty($_POST['name']))
        {
            $name = $_POST['name'];
            $gender= $_POST['gender'];
            $race = $_POST['race'];
            $class = $_POST['class'];
            $f3->set('name',$name);
            $f3->set('gender',$gender);
            $f3->set('race',$race);
            $f3->set('class',$class);
            if(isset($_SESSION['premium']))
            {
                $skills = $_POST['skills'];
                $skills = implode(",",$skills);
                $newchar = new PremiumCharacter($name,$gender,$class,$race);  //TODO update to userID
                $newchar->setSkills($skills);
                addCharacter($name,$gender,$race,$class,$skills,$_SESSION['userid']);
            }
            else
            {
                $newchar = new Character($name,$gender,$class,$race);
                addCharacter($name,$gender,$race,$class,"",$_SESSION['userid']);
            }

            $f3->set('newchar',$newchar);
            $_SESSION['newchar'] = $newchar;
            header("Location:select");
        }
    }
    $view = new Template();
    echo $view->render('views/characterCreation.html');
});

//CHARACTER SELECT PAGE
$f3 -> route('GET|POST /select', function($f3) {
    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }
    if(isset($_POST['submit']))
    {
        header("Location:creation");
    }

    $username = $_SESSION['username'];
    $f3->set('username',$username);
    $userid = $_SESSION['userid'];
    $f3->set('userid',$userid);
    $characters = getCharacters($userid);
    $f3->set('characters',$characters);

    $template = new Template();
    echo $template->render('views/characterSelect.html');
});

//STORY-PART 1 PAGE
$f3 -> route('GET|POST /story-part1/@id', function($f3,$params) {
    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }
    $id = $params['id'];
    $_SESSION['characterId'] = $params['id'];
    $character = getCharacter($id);
    $_SESSION['character'] = $character;
    $f3->set('character',$character);
    if(isset($_POST['submit']))
    {
        if(empty($_POST['choice1']))
        {
            echo "EMPTY";
        }
        else
        {
            $_SESSION['choice1'] = $_POST['choice1'];
            header("Location:../story-part2");
        }
    }
    $template = new Template();
    echo $template->render('views/story1.html');
});

//STORY-PART 2 PAGE
$f3 -> route('GET|POST /story-part2', function($f3) {
    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }
    $f3->set('character',$_SESSION['character']);
    if(isset($_POST['submit']))
    {
        if(empty($_POST['choice2']))
        {
            echo "EMPTY";
        }
        else
        {
            $_SESSION['choice2'] = $_POST['choice2'];
            header("Location:story-part3");
        }
    }
    $template = new Template();
    echo $template->render('views/story2.html');
});

//STORY-PART 3 PAGE
$f3 -> route('GET|POST /story-part3', function($f3) {
    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }
    $f3->set('character',$_SESSION['character']);
    if(isset($_POST['submit']))
    {
        if(empty($_POST['choice3']))
        {
            echo "EMPTY";
        }
        else
        {
            $_SESSION['choice3'] = $_POST['choice3'];
            header("Location:story-part4");
        }
    }
    //story part 3 below
    $story = getStory();
    $_SESSION['storyid3'] = $story['idstory'];
    $f3->set('question', $story['story']);
    $f3->set('answer1', $story['choice1']);
    $f3->set('answer2', $story['choice2']);
    $f3->set('answer3', $story['choice3']);


    $template = new Template();
    echo $template->render('views/story3.html');
});

//STORY-PART 4 PAGE
$f3 -> route('GET|POST /story-part4', function($f3) {
    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }
    $f3->set('character',$_SESSION['character']);
    if(isset($_POST['submit']))
    {
        if(empty($_POST['choice4']))
        {
            echo "EMPTY";
        }
        else
        {
            $_SESSION['choice4'] = $_POST['choice4'];
            header("Location:story-final");
        }
    }
    //story part 3 below
    $s3 = $_SESSION['storyid3'];
    $story = getStory();
    while($story['idstory'] == $s3) {  //ensures no duplicates
        $story = getStory();
    }
    $_SESSION['storyid4'] = $story['idstory'];
    $f3->set('question', $story['story']);
    $f3->set('answer1', $story['choice1']);
    $f3->set('answer2', $story['choice2']);
    $f3->set('answer3', $story['choice3']);


    $template = new Template();
    echo $template->render('views/story4.html');
});

//STORY-FINAL PAGE
$f3 -> route('GET|POST /story-final', function() {
    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }
    if(isset($_POST['submit']))
    {
        $_SESSION['finalChoice'] = $_POST['finalChoice'];
        if(!empty($_POST['finalChoice']))
        {
            $bio = $_SESSION['choice1'] . " --> " . $_SESSION['choice2'] . $_SESSION['choice3'] . $_SESSION['choice4'] . $_SESSION['finalChoice'];
            addBio($bio, $_SESSION['characterId']);
            header("Location:summary/" . $_SESSION['characterId']);
        }
    }
    $template = new Template();
    echo $template->render('views/finalPage.html');
});

//CREATE ACCOUNT PAGE
$f3 -> route('GET|POST /createaccount', function($f3) {
    if(isset($_POST['submit'])) {
        if(!is_null($_POST['username']) && !is_null($_POST['password'])) {
            $username = $_SESSION['username'] = $_POST['username'];
            $password = $_SESSION['password'] = $_POST['password'];
            $f3->set('username',$username);
            $f3->set('password',$password);
            if(isset($_SESSION['premium'])) {
                $premium = 1;  //1 = true for database
            }
            else {
                $premium = 0;
            }
            //TODO this line below was setting $premium to the session password
            //was that intended or typo?
            $_SESSION['premium'] = $premium;
            //username validated with javascript before POST
            //echo "ADDING USER!";
            addUser($username, $password, $premium);

            header("Location:select");
        }
    }//end if submit

    $template = new Template();
    echo $template->render('views/createaccount.html');
});//end createaccount

//FORGOT PASSWORD PAGE
$f3 -> route('GET /forgot-password', function() {
    $template = new Template();
    echo $template->render('views/forgotpassword.html');
});

//CHARACTER SUMMARY PAGE
$f3 -> route('GET|POST /summary/@id', function($f3,$params) {
    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }
    $id = $params['id'];
    $character = getCharacter($id);
    $f3->set('character',$character);
    $template = new Template();
    echo $template->render('views/charactersummary.html');
});


//Run Fat-Free Framework
$f3->run();