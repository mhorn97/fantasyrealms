<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/charactercreation.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Character Creation</title>
</head>
<body>
<nav class = "navbar bg-light navbar-light">
        <a class="nav-item nav-link" href="select">Fantasy Realms</a>
        <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
</nav>
    <table>

    </table>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Make your character</h1>

                <form method="post" action="#">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name">
                    <div name="nameerror" id="nameerror"></div>
                    <br>
                    <h3>Gender: </h3>
                    <label for="male">Male: </label>
                    <input type="radio" name="gender" value="male" id="male" checked>
                    <label for="female">Female: </label>
                    <input type="radio" name="gender" value="female" id="female">
                    <label for="other">Other: </label>
                    <input type="radio" name="gender" value="other" id="other">

                <h3>Race: </h3><br>
                <label for="human">Human: </label>
                <input type="radio" name="race" value="human" id="Human" checked>
                <label for="elf">Elf: </label>
                <input type="radio" name="race" value="elf" id="elf">
                <label for="dwarf">Dwarf: </label>
                <input type="radio" name="race" value="dwarf" id="dwarf">
                <br><br>

                <h3>Class: </h3>
                <label for="warrior">Warrior: </label>
                <input type="radio" name="class" value="warrior" id="warrior" checked>
                <label for="sorcerer">Sorcerer: </label>
                <input type="radio" name="class" value="sorcerer" id="sorcerer">
                <label for="rogue">Rogue: </label>
                <input type="radio" name="class" value="rogue" id="rogue">
                <?php if ($premium): ?>
                <h3>Skills/Traits: </h3>
                <input type="checkbox" name="skills[]" value="Luck"> Luck
                <input type="checkbox" name="skills[]" value="Barter"> Barter
                <input type="checkbox" name="skills[]" value="Charisma"> Charisma
                <?php endif; ?>

                <div class="form-group">

                <input type="submit" name="submit" value="Create" id="submit">
                </div>
                </form>
                <a href="<?= ($BASE) ?>/select"><button name="cancel">Cancel</button></a>
            </div>
            <div class="col-8" id="img-col">

            </div>
        </div>
    </div>

    <script>
        $('#warrior').click(function() {
            if($('#warrior').is(':checked')) {
                $('#img-col').html('<img id="warriorimg" src="./images/warrior1.jpg" />')}
        });
        $('#sorcerer').click(function() {
            if($('#sorcerer').is(':checked')) {
                $('#img-col').html('<img id="sorcererimg" src="./images/sorcerer1.jpg" />')}
        });
        $('#rogue').click(function() {
            if($('#rogue').is(':checked')) {
                $('#img-col').html('<img id="rogueimg" src="./images/rogue1.jpg" />')}
        });
        if($('#name').html() == "")
        {
            $('#nameerror').html("The name needs to be filled out!");
            $('#submit').disabled = true;
        }
        else
        {
            $('#submit').disabled = false;
        }
        if($('#name').keypress(function() {
            $('#nameerror').html("");
            }));

    </script>
</body>
</html>