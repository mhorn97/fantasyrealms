<?php
/**
 * Controller for fantasy realms
 * @author Michael Horn & Anthony Thompson
 * @version 1.0
 */

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
            if($_SESSION['premium'] == 1)
            {
                $skills = $_POST['skills'];
                $skills = implode(",",$skills);
                $newchar = new PremiumCharacter($name,$gender,$class,$race, "");
                $newchar->setSkills($skills);
                addCharacter($newchar->getName(),$newchar->getGender(),$newchar->getRace(),$newchar->getClass(),$newchar->getSkills(),$_SESSION['userid']);
            }
            else
            {
                $newchar = new Character($name,$gender,$class,$race, "");
                addCharacter($newchar->getName(),$newchar->getGender(),$newchar->getRace(),$newchar->getClass(),"",$_SESSION['userid']);
            }

            $f3->set('newchar',$newchar);
            $_SESSION['newchar'] = $newchar;
            header("Location:select");
        }
    }
    $view = new Template();
    echo $view->render('views/characterCreation.html');
});

//CHARACTER Edit PAGE
$f3 -> route('GET|POST /edit/@id', function($f3,$params) {
    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }
    $f3->set('premium', $_SESSION['premium']);
    $id = $params['id'];
    $character = getCharacter($id);
    $f3->set('character',$character);
    if($_SESSION['premium'] == 1)
    {
        if(strpos($character['skills'], "Luck") !== false)
        {
            $f3->set('luck',1);
        }
        if(strpos($character['skills'], "Barter") !== false)
        {
            $f3->set('barter',1);
        }
        if(strpos($character['skills'], "Charisma") !== false)
        {
            $f3->set('charisma',1);
        }
    }
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
            if($_SESSION['premium'] == 1)
            {
                $skills = $_POST['skills'];
                if(!empty($_POST['skills']))
                {
                    $skills = implode(",", $skills);
                }
                $newchar = new PremiumCharacter($name,$gender,$class,$race);  //TODO update to userID
                $newchar->setSkills($skills);
                editCharacter($name,$gender,$race,$class,$skills, $id, "");
            }
            else
            {
                $newchar = new Character($name,$gender,$class,$race);
                editCharacter($name,$gender,$race,$class,"",$id, "");
            }

            $f3->set('newchar',$newchar);
            $_SESSION['newchar'] = $newchar;
            header("Location:../select");
        }
    }
    $view = new Template();
    echo $view->render('views/edit.html');
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

//View All PAGE
$f3 -> route('GET|POST /viewall', function($f3) {
    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }
    $characters = getAllCharacters();
    $f3->set('characters',$characters);

    $template = new Template();
    echo $template->render('views/viewAll.html');
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

    if($_SESSION['premium'] == 1)
    {
        $newchar = new PremiumCharacter($character['name'],$character['gender'],$character['class'],$character['race'], "");
        $newchar->setSkills($character['skills']);
    }
    else
    {
        $newchar = new Character($character['name'],$character['gender'],$character['class'],$character['race'], "");
    }

    $_SESSION['character'] = $character;
    $_SESSION['newchar'] = $newchar;

    $f3->set('character',$character);
    $f3->set('newchar',$newchar);

    if(isset($_POST['submit']))
    {
        if(empty($_POST['choice1']))
        {
            echo "EMPTY";
        }
        else
        {
            $_SESSION['choice1'] = $_POST['choice1'];
            //$char = $_SESSION['character'];
            //$char->setChoice1($_POST['choice1']);
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

    $f3->set('newchar',$_SESSION['newchar']);

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

    $f3->set('newchar',$_SESSION['newchar']);
    //$character = $_SESSION['character'];
    if(isset($_POST['submit']))
    {
        if(empty($_POST['choice3']))
        {
            $_SESSION['choice3'] = '';  //will display nothing instead of f3 {{@choice3}}
        }
        else
        {
            $_SESSION['choice3'] = $_POST['choice3'];
            //$character->setChoice3($_POST['choice3']);
        }
        header("Location:story-part4");
    }

    //story part 3 below
    $story = getRandStory();
    $_SESSION['story3'] = $story;
    $_SESSION['storyid3'] = $story['idstory'];
    //$character->setStory3id($story['story']);
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

    $f3->set('newchar',$_SESSION['newchar']);

    if(isset($_POST['submit']))
    {
        if(empty($_POST['choice4']))
        {
            $_SESSION['choice4'] = '';
        }
        else
        {
            $_SESSION['choice4'] = $_POST['choice4'];
        }
        header("Location:story-final");
    }
    //story part 4 below
    $s3 = $_SESSION['storyid3'];
    $story = getRandStory();
    while($story['idstory'] == $s3) {  //ensures no duplicates
        $story = getRandStory();
    }
    $_SESSION['story4'] = $story;
    $_SESSION['storyid4'] = $story['idstory'];
    //$character->setStory4id($story['story']);
    $f3->set('question', $story['story']);
    $f3->set('answer1', $story['choice1']);
    $f3->set('answer2', $story['choice2']);
    $f3->set('answer3', $story['choice3']);


    $template = new Template();
    echo $template->render('views/story4.html');
});

//STORY-FINAL PAGE
$f3 -> route('GET|POST /story-final', function($f3) {

    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }

    $f3->set('newchar',$_SESSION['newchar']);

    if(isset($_POST['submit']))
    {
        $_SESSION['finalChoice'] = $_POST['finalChoice'];
        if(!empty($_POST['finalChoice']))
        {
            $s3 = $_SESSION['story3'];
            $s4 = $_SESSION['story4'];
            $s3q = $s3['story'];
            $s4q = $s4['story'];
            $bio = $_SESSION['choice1'] . $_SESSION['choice2'] . $s3q . ' ' . $_SESSION['choice3']
                . ' ' . $s4q . ' ' . $_SESSION['choice4'] . ' ' .  $_SESSION['finalChoice'];

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
            } else {
                $premium = 0;
            }
            $_SESSION['premium'] = $premium;
            //username validated with javascript before POST
            addUser($username, $password, $premium);

            header("Location:select");
        }
    }//end if submit

    $template = new Template();
    echo $template->render('views/createaccount.html');
});//end createaccount

//FORGOT PASSWORD PAGE
$f3 -> route('GET|POST /forgot-password', function() {
    if(isset($_POST['submit']))
    {
        $userExists = getUser($_POST['username']);
        if($userExists)
        {
            $_SESSION['username'] = $_POST['username'];
            header("Location:changepassword");
        }
    }
    $template = new Template();
    echo $template->render('views/forgotpassword.html');
});

//CHANGE PASSWORD PAGE
$f3 -> route('GET|POST /changepassword', function() {
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['password']))
        {
            changePassword($_SESSION['username'],$_POST['password']);
            header("Location:/328/fantasyrealms");
        }
    }
    $template = new Template();
    echo $template->render('views/changepassword.html');
});

//CHARACTER SUMMARY PAGE
$f3 -> route('GET|POST /summary/@id', function($f3,$params) {

    if(empty($_SESSION['username']) || empty($_SESSION['password']) || empty($_SESSION['userid']))
    {
        header("Location:/328/fantasyrealms/");
    }

    $id = $params['id'];
    $character = getCharacter($id);

    if($_SESSION['premium'] == 1)
    {
        $newchar = new PremiumCharacter($character['name'],$character['gender'],$character['class'],$character['race'],$character['bio']);
        $newchar->setSkills($character['skills']);
    }
    else
    {
        $newchar = new Character($character['name'],$character['gender'],$character['class'],$character['race'], $character['bio']);
    }

    $f3->set('newchar',$newchar);

    $template = new Template();
    echo $template->render('views/charactersummary.html');
});


//Run Fat-Free Framework
$f3->run();