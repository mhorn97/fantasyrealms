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
        <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
</nav>
<div class="container" id="maindiv">
    <div class="row">
        <div class="col-sm-6" id="col1">
            <h2>Welcome Back <?= ($username) ?></h2>
        </div>
        <div class="col-sm-6" id="col2">
            <div class="container" id="character-select">
            <h3>Here are your characters</h3>


                    <?php foreach (($characters?:[]) as $character): ?>
                        <ol>
                            <li><p><?= ($character['name']) ?>, <?= ($character['race']) ?>, <?= ($character['class']) ?></p>
                                <a href="<?= ($BASE) ?>/summary/<?= ($character['characterId']) ?>"><button name="view">View Character</button></a>
                                <a href="<?= ($BASE) ?>/story-part1/<?= ($character['characterId']) ?>"><button name = "resume">Story</button></a>
                                <button name = "delete" id="delete<?= ($character['characterId']) ?>" value="<?= ($character['characterId']) ?>">Delete</button>
                            </li>
                    </ol>
                    <?php endforeach; ?>
            <br>
            <br>
                <form method="post" action="#">
                <input type="submit" name="submit" value="Create a character!">
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