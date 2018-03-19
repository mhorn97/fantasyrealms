<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= ($BASE) ?>/styles/charactersummary.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <title>Character Summary</title>
</head>
<body>
<nav class = "navbar bg-light navbar-light">
    <a class="nav-item nav-link" href="<?= ($BASE) ?>/select">Fantasy Realms</a>
    <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
</nav>

<div class="container" id="main">
<h1>Name: <?= ($character['name']) ?></h1><br><br>
    <p>----------------------------------------</p>
<h1>Gender: <?= ($character['gender']) ?></h1><br><br>
    <p>----------------------------------------</p>
<h1>Class: <?= ($character['class']) ?></h1><br><br>
    <p>----------------------------------------</p>
<h1>Race: <?= ($character['race']) ?></h1><br><br>

<?php if (is_null($character['skills']) || $character['skills'] == ''): ?>
    <?php else: ?>
        <p>----------------------------------------</p>
        <h1>Skills: <?= ($character['skills']) ?></h1><br><br>
    
<?php endif; ?>

<?php if ($character['bio'] == ''): ?>
    <?php else: ?>
        <p>----------------------------------------</p>
        <h1>Bio: <?= ($character['bio']) ?></h1>
    
<?php endif; ?>
</div>
<script>
    if("<?= ($character['class'] == 'Warrior') ?>" == 1)
    {
    $('body').css('background-image', "url('<?= ($BASE) ?>/images/warrior2.jpg");
    $('body').css('background',"size('100%')");
    };
    if("<?= ($character['class'] == 'Sorcerer') ?>" == 1)
    {
    $('body').css('background-image', "url('<?= ($BASE) ?>/images/sorcerer2.jpg");
    $('body').css('background',"size('100%')");
    };
    if("<?= ($character['class'] == 'Rogue') ?>" == 1)
    {
    $('body').css('background-image', "url('<?= ($BASE) ?>/images/rogue2.jpg");
    $('body').css('background',"size('100%')");
    };
</script>
</body>
</html>