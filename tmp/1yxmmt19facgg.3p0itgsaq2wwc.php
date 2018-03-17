<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/story1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <title>Story Page 1</title>
</head>
<body>
<nav class = "navbar bg-light navbar-light">
    <a class="nav-item nav-link" href="<?= ($BASE) ?>/select">Fantasy Realms</a>
    <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
</nav>

<p>Welcome to Fantasy Realms</p>

<form method="post" action="#">
<?php if ($character['race'] == 'human'): ?>
    
        <p>You are a human. Humans in this world control all of the land that is not surrounded by trees or mountains. They settle in either castles or villages. There are many kings to many
        kingdoms. Let us choose your path: </p>

        <label for="noble">Be from a Noble household living in a castle: </label>
        <input type="radio" name="choice1" value="Noble" id="noble" checked><br>
        <label for="thug">Be from the backstreets of villages and castles as a thief/thug: </label>
        <input type="radio" name="choice1" value="Thug" id="thug"><br>
        <label for="civilian">Be from a village, contributing to the community</label>
        <input type="radio" name="choice1" value="Civilian" id="civilian"><br>
    
<?php endif; ?>
<?php if ($character['race'] == 'elf'): ?>
    
        <p>You are an elf. They either thrive in forests, serve as slaves for the rich and noble humans, or live in the slums of a castle, fighting for survival. Let us choose your path: </p>
        <label for="hunter">Be from a forest and support you tribe by hunting for meat and berries: </label>
        <input type="radio" name="choice1" value="Hunter" id="hunter" checked><br>
        <label for="slave">Be from a Noble household that treated you well and decided to let you free: </label>
        <input type="radio" name="choice1" value="Slave" id="slave"><br>
        <label for="thief">Be from the slums of a castle, surviving day to day, afraid to be taken from the castle guard to be a slave: </label>
        <input type="radio" name="choice1" value="Thief" id="thief"><br>
    
<?php endif; ?>
<?php if ($character['race'] == 'dwarf'): ?>
    
        <p>You are a dwarf. Dwarves are filled with the most pride. They build their kingdoms into the sides of mountains and volcanoes. They venture off and trade with other races but are confused by the
        traditions of elves. Let us choose your path: </p>
        <label for="dwarfNoble">Be from a noble family from one of the biggest dwarf mountain kingdoms: </label>
        <input type="radio" name="choice1" value="Dwarf Noble" id="dwarfNoble" checked><br>
        <label for="gang">Be from one of the largest dwarf gangs in a mountain kingdom, one that even the noble dwarves are scared of: </label>
        <input type="radio" name="choice1" value="Gang" id="gang"><br>
        <label for="adventurer">Adventure outside of the mountains, trading constantly with humans and elves, exploring the land. You are never sure will you will end up next: </label>
        <input type="radio" name="choice1" value="Adventurer" id="adventurer"><br>
    
<?php endif; ?>

<a href="<?= ($BASE) ?>/select"><button name="exit">Exit</button></a>
<input type="submit" name="submit" value="Continue">
</form>
</body>
</html>