<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/profile.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <title>Story Page 1</title>
</head>
<body>
<nav class = "navbar bg-light navbar-light">
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="select">Fantasy Realms</a>
        <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
    </div>
</nav>
<p>Welcome to FantasyLand CHARACTERNAME</p>
<p>You will create your own story as you journey through this harsh, yet mysterious land.</p>
<p>DESCRIPTION OF PLACE DETERMINED BY RACE</p>
<p>DESCRIPTION OF EVENT DEPENDING ON CLASS</p>

<button name="choice1">Choice1</button>
<button name="choice2">Choice2</button>

<p>Enter an input to be saved</p>
<input type="text">
<br>
<p>Who would you like to save?</p>
<label for="person1">Person1</label>
<input type="radio" name="person1" id="person1">
<label for="person2">Person2</label>
<input type="radio" name="person2" id="person2">
<label for="person3">Person3</label>
<input type="radio" name="person3" id="person3">
<br>
<a href="select"><button name="exit">Exit</button></a>
<a href="story-part2"><button name="continue">Continue</button></a>
</body>
</html>