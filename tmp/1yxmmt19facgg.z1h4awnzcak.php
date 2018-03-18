<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/story3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <title>Story Page 4</title>
</head>
<body>
<nav class = "navbar bg-light navbar-light">
    <a class="nav-item nav-link" href="select">Fantasy Realms</a>
    <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
</nav>

<div class="container" id="main">
<h2>Adventure 2</h2>

<form method="post" action="#">
    <p><?= ($question) ?></p>
    <label for="answer1"><?= ($answer1) ?></label>
    <input type="radio" name="choice4" id="answer1" value="answer1" checked><br>
    <label for="answer2"><?= ($answer2) ?></label>
    <input type="radio" name="choice4" id="answer2" value="answer2"><br>
    <label for="answer3"><?= ($answer3) ?></label>
    <input type="radio" name="choice4" id="answer3" value="answer3"><br>
    <input type="submit" name="submit" value="Continue">
</form>
    <a href="<?= ($BASE) ?>/select"><button name="exit">Exit</button></a>
</div>
</body>
</html>