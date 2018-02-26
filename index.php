<?php

require_once ('vendor/autoload.php');
session_start();

$f3 = Base::instance();

//Login page
$f3 -> route('GET /', function() {
    $view = new View;
    echo $view->render('views/loginScreen.html');
});

//CHARACTER CREATION PAGE
$f3 -> route('GET|POST /creation', function($f3) {
    $f3->set('premium', $_SESSION['premium']);

    if(isset($_POST['submit']))
    {
        if(!is_null($_POST['name']) && !is_null($_POST['class']) && !is_null($_POST['race']))
        {
            $name = $_POST['name'];
            $race = $_POST['race'];
            $class = $_POST['class'];
            $f3->set('name',$name);
            $f3->set('race',$race);
            $f3->set('class',$class);
            if(isset($_SESSION['premium']))
            {
                $skills = $_POST['skills'];
                $newchar = new PremiumCharacter($name,$class,$race);
                $newchar->setSkills($skills);
            }
            else
            {
                $newchar = new Character($name,$class,$race);
            }
            $f3->set('newchar',$newchar);
            $_SESSION['newchar'] = $newchar;
            header("Location:summary");
        }
    }
    $view = new Template();
    echo $view->render('views/characterCreation.html');
});

//CHARACTER SELECT PAGE
$f3 -> route('GET|POST /select', function($f3) {
    if(isset($_POST['submit']))
    {
        $premium = $_POST['premium'];
        $f3->set('premium',$premium);
        $_SESSION['premium'] = $premium;
        header("Location:creation");
    }
    $template = new Template();
    echo $template->render('views/characterSelect.html');
});

//STORY-PART 1 PAGE
$f3 -> route('GET /story-part1', function() {
    $template = new Template();
    echo $template->render('views/story1.html');
});

//STORY-PART 2 PAGE
$f3 -> route('GET /story-part2', function() {
    $template = new Template();
    echo $template->render('views/story2.html');
});

//STORY-PART 3 PAGE
$f3 -> route('GET /story-part3', function() {
    $template = new Template();
    echo $template->render('views/story3.html');
});

//STORY-FINAL PAGE
$f3 -> route('GET /story-final', function() {
    $template = new Template();
    echo $template->render('views/finalPage.html');
});

//CREATE ACCOUNT PAGE
$f3 -> route('GET /create-account', function() {
    $template = new Template();
    echo $template->render('views/createaccount.html');
});

//FORGOT PASSWORD PAGE
$f3 -> route('GET /forgot-password', function() {
    $template = new Template();
    echo $template->render('views/forgotpassword.html');
});

//CHARACTER SUMMARY PAGE
$f3 -> route('GET|POST /summary', function($f3) {
    $char = $_SESSION['newchar'];
    $f3->set('name',$char->getName());
    $f3->set('class',$char->getClass());
    $f3->set('race',$char->getRace());
    $template = new Template();
    echo $template->render('views/charactersummary.html');
});


//Run Fat-Free Framework
$f3->run();