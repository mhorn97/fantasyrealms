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
        <h4>Name: <?= ($newchar->getName()) ?></h4>
            <hr>
        <h4>Gender: <?= ($newchar->getGender()) ?></h4>
            <hr>
        <h4>Class: <?= ($newchar->getClass()) ?></h4>
            <hr>
        <h4>Race: <?= ($newchar->getRace()) ?></h4>

        <?php if ($premium == 1): ?>
            <?php if (is_null($newchar->getSkills()) || $newchar->getSkills() == ''): ?>
                <?php else: ?>
                    <hr>
                    <h4>Skills: <?= ($newchar->getSkills()) ?></h4><br><br>
                
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($newchar->getBio() == ''): ?>
            <?php else: ?>
                <hr>
                <h4>Bio: <?= ($newchar->getBio()) ?></h4>
            
        <?php endif; ?>
    </div>

    <script>
        if("<?= ($newchar->getClass() == 'Warrior') ?>" == 1)
        {
        $('body').css('background-image', "url('<?= ($BASE) ?>/images/warrior2.jpg");
        $('body').css('background-size',"100%");
        };
        if("<?= ($newchar->getClass() == 'Sorcerer') ?>" == 1)
        {
        $('body').css('background-image', "url('<?= ($BASE) ?>/images/sorcerer2.jpg");
        $('body').css('background-size',"100%");
        };
        if("<?= ($newchar->getClass() == 'Rogue') ?>" == 1)
        {
        $('body').css('background-image', "url('<?= ($BASE) ?>/images/rogue2.jpg");
        $('body').css('background-size',"100%");
        };
    </script>
</body>
</html>