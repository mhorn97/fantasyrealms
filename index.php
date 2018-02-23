<?php

require_once ('vendor/autoload.php');

$f3 = Base::instance();

$f3 -> route('GET /', function() {
    $view = new View;
    echo $view->render('views/loginScreen.html');
});

$f3 -> route('GET /create', function() {
    $view = new Template();
    echo $view->render('views/characterCreation.html');
});

$f3 -> route('GET /select', function() {
    $template = new Teplate();
    echo $template->render('views/characterSelect.html');
});

$f3 -> route('GET /story-part1', function() {
    $template = new Template();
    echo $template->render('views/story1.html');
});

$f3 -> route('GET /story-part2', function() {
    $template = new Template();
    echo $template->render('views/story2.html');
});

$f3 -> route('GET /story-part3', function() {
    $template = new Template();
    echo $template->render('views/story3.html');
});

$f3 -> route('GET /story-final', function() {
    $template = new Template();
    echo $template->render('views/finalPage.html');
});

//Run Fat-Free Framework
$f3->run();