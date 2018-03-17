<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/story2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <title>Story Page 2</title>
</head>
<nav class = "navbar bg-light navbar-light">
    <a class="nav-item nav-link" href="<?= ($BASE) ?>/select">Fantasy Realms</a>
    <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
</nav>
    <h2>Class Specialization</h2>

<form method="post" action="#">
    <?php if ($character['class'] == 'warrior'): ?>
        
            <p>As a warrior, you discovered that it is best to deal with your enemies head on, grabbing any weapon you could in the heat of battle. As your skills in battle sharpened you preffered to fight
                a certain way:</p>
            <label for="shield">Fight with a sword and shield, able to attack quickly and defend from quick attacks: </label>
            <input type="radio" name="choice2" value="Shield and Sword" id="shield" checked><br>
            <label for="greatsword">Use a great 2-handed sword to quickly take out anything that threatens you: </label>
            <input type="radio" name="choice2" value="Greatsword" id="greatsword"><br>
            <label for="warhammer">Pick up a warhammer because.... it's a freaking warhammer!</label>
            <input type="radio" name="choice2" value="Warhammer" id="warhammer">
        
    <?php endif; ?>
    <?php if ($character['class'] == 'sorcerer'): ?>
        
            <p>You quickly learned that you were different from most people. Being able to do extraordinary things with your hands and mind. You quickly picked up books to learn about magic and the rarity of being a sorcerer.
            What path of magic did you take?</p>
            <label for="elements">You learned how to master the elements of the world and pull material out of thin air: </label>
            <input type="radio" name="choice2" value="Elements" id="elements" checked><br>
            <label for="blood">You learned about blood magic, being able to make people kneel before you and do your bidding as you please: </label>
            <input type="radio" name="choice2" value="Blood" id="blood"><br>
            <label for="necromancy">You learned about the undead and demology, learning how to summon both and make them do your bidding: </label>
            <input type="radio" name="choice2" value="Necromancy" id="necromancy">
        
    <?php endif; ?>
    <?php if ($character['class'] == 'rogue'): ?>
        
            <p>You learned quickly that the best path is one where people never even knew you were there, but what kind of rogue are you?</p>
            <label for="lockpicker">You learned to unlock doors and chest and master the art of sneaking, rarely killing anyone getting in your way: </label>
            <input type="radio" name="choice2" value="Lockpicker" id="lockpicker" checked><br>
            <label for="backstabber">You learned how to get intel on things that you wanted or people you wanted to kill, and completing that goal quickly and as quiet as possible: </label>
            <input type="radio" name="choice2" value="Backstabber" id="backstabber"><br>
            <label for="quick">You learned how to quickly get behind your enemies and stab them in the back, quickly ending any battle. Even groups of your enemies were scared to fight you all at once</label>
            <input type="radio" name="choice2" value="Quick Fighter" id="quick"><br>
        
    <?php endif; ?>
    <a href="<?= ($BASE) ?>/select"><button name="exit">Exit</button></a>
    <input type="submit" name="submit" value="Continue">
</form>
</body>
</html>