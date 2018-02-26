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
$f3 -> route('GET /summary', function() {
    $template = new Template();
    echo $template->render('views/charactersummary.html');
});


//Run Fat-Free Framework
$f3->run();