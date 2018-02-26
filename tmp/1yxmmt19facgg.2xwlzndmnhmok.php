<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/charactercreation.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <title>Character Creation</title>
</head>
<body>
<nav class = "navbar bg-light navbar-light">
        <a class="nav-item nav-link" href="select">Fantasy Realms</a>
        <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
</nav>
    <h1>Make your character</h1>

    <label for="name">Name: </label>
    <input type="text" name="name" id="name">

    <h3>Race: </h3><br>
    <label for="human">Human: </label>
    <input type="radio" name="race" value="human" id="Human">
    <label for="elf">Elf: </label>
    <input type="radio" name="race" value="elf" id="elf">
    <label for="dwarf">Dwarf: </label>
    <input type="radio" name="race" value="dwarf" id="dwarf">
    <br><br>

    <h3>Class: </h3>
    <label for="warrior">Warrior: </label>
    <input type="radio" name="class" value="warrior" id="warrior">
    <label for="sorcerer">Sorcerer: </label>
    <input type="radio" name="class" value="sorcerer" id="sorcerer">
    <label for="rogue">Rogue: </label>
    <input type="radio" name="class" value="rogue" id="rogue">
    <?= ($premium)."
" ?>
    <?php if ($premium): ?>
    <h3>Skills/Traits: </h3>
    <input type="checkbox" name="luck"> Luck
    <input type="checkbox" name="barter"> Barter
    <input type="checkbox" name="Charisma"> Charisma
    <?php endif; ?>

    <div class="form-group">
    <a href="select"><button name="cancel">Cancel</button></a>
    <a href="select"><button name="create">Create</button></a>
    </div>
</body>
</html>