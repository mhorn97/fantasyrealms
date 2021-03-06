<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/characterselect.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Character Select</title>
</head>
<body>
<nav class = "navbar bg-light navbar-light">
        <a class="nav-item nav-link" href="select">Fantasy Realms</a>
        <a class="nav-item nav-link" href="viewall">View All</a>
        <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
</nav>
<div class="container" id="maindiv">
    <div class="row">
        <div class="col-sm-6" id="col1">
            <div class="container" id="introduction">
                <h2>Welcome Back <?= ($username) ?></h2>
                <br><br>
                <p>Welcome back to Fantasy Realms! A world for the most adventurous and brave. It has magic, monsters, and mysterious unexplored lands. Take up arms and
                control your journey.</p>
            </div>
        </div>
        <div class="col-sm-6" id="col2">
            <div class="container" id="character-select">
            <h3>Here are your characters</h3>


                    <?php foreach (($characters?:[]) as $character): ?>
                        <div class="charactercontainer" id="characterContainer">
                            <p>&nbsp Name: <?= ($character['name']) ?> | Race: <?= ($character['race']) ?> | Class: <?= ($character['class']) ?></p>
                            <a href="<?= ($BASE) ?>/story-part1/<?= ($character['characterId']) ?>"><button name = "resume" class="btn btn-warning btn-lg">Story</button></a>
                            <a href="<?= ($BASE) ?>/summary/<?= ($character['characterId']) ?>"><button name="view" class="btn btn-default">View Character</button></a>
                            <a href="<?= ($BASE) ?>/edit/<?= ($character['characterId']) ?>"><button name = "edit" class="btn btn-default">Edit</button></a>
                            <button name = "delete" id="delete<?= ($character['characterId']) ?>" value="<?= ($character['characterId']) ?>" class="btn btn-default">Delete</button>
                        </div>
                    <?php endforeach; ?>
            <br>
            <br>
                <form method="post" action="#">
                <input type="submit" name="submit" value="Create a character!" class="btn btn-default">
                </form>
            </div>
        </div>
    </div>
</div>


<script>

    <?php foreach (($characters?:[]) as $character): ?>

    $("#delete<?= ($character['characterId']) ?>").click(function()
    {
        var id = $(this).val();
        var deletion = confirm("Are you sure you want to delete this character");
        if(deletion)
        {
            $.post('model/deleteuser.php', {id: id}, function (data)
            {

            });
            location.reload(true);
        }
    });
    <?php endforeach; ?>
</script>
</body>
</html>