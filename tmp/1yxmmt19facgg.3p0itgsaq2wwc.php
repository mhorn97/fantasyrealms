<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= ($BASE) ?>/styles/story1.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
            integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
            crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<nav class="navbar bg-light navbar-light">
    <a class="nav-item nav-link" href="<?= ($BASE) ?>/select">Fantasy Realms</a>
    <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
</nav>

<div class="container" id="main">
    <h2>Origins</h2>
    <form method="post" action="#">
        <?php if ($character['race'] == 'Human'): ?>
            
                <p>You are a human. Humans in this world control all of the land that is not surrounded by trees or
                    mountains. They settle in either castles or villages. There are many kings to many
                    kingdoms. Let us choose your path: </p>

                <div class="radio">
                    <label for="noble"><input type="radio" name="choice1" value="Raised as a Noble, " id="noble"
                                              checked>
                        Be from a Noble household living in a castle </label>
                </div>
                <div class="radio">
                    <label for="thug"><input type="radio" name="choice1" value="Raised as a Thug, " id="thug">
                        Be from the backstreets of villages and castles as a thief/thug </label>
                </div>
                <div class="radio">
                    <label for="civilian"><input type="radio" name="choice1" value="Raised as a civilian, "
                                                 id="civilian">
                        Be from a village, contributing to the community</label>
                </div>
            
        <?php endif; ?>
        <?php if ($character['race'] == 'Elf'): ?>
            
                <p>You are an elf. They either thrive in forests, serve as slaves for the rich and noble humans, or live
                    in the slums of a castle, fighting for survival. Let us choose your path: </p>
                <div class="radio">
                    <label for="hunter"><input type="radio" name="choice1" value="Raised as a hunter, " id="hunter"
                                               checked>
                        Be from a forest and support you tribe by hunting for meat and berries </label>
                </div>
                <div class="radio">
                    <label for="slave"><input type="radio" name="choice1" value="Raised as a slave, " id="slave">
                        Be from a Noble household that treated you well and decided to let you free </label>
                </div>
                <div class="radio">
                    <label for="thief"><input type="radio" name="choice1" value="Raised as a thief, " id="thief">
                        Be from the slums of a castle, surviving day to day, afraid to be taken from the castle guard to
                        be a slave </label>
                </div>
            
        <?php endif; ?>
        <?php if ($character['race'] == 'Dwarf'): ?>
            
                <div>
                    <p>You are a dwarf. Dwarves are filled with the most pride. They build their kingdoms into the sides
                        of mountains and volcanoes. They venture off and trade with other races but are confused by the
                        traditions of elves. Let us choose your path: </p>
                </div>
                <div class="radio">
                    <label for="dwarfNoble"><input type="radio" name="choice1" value="Raised as a noble Dwarf, "
                                                   id="dwarfNoble" checked>
                        Be from a noble family from one of the biggest dwarf mountain kingdoms </label>
                </div>
                <div class="radio">
                    <label for="gang"><input type="radio" name="choice1"
                                             value="Growing up in one of the toughest dwarf gangs, " id="gang">
                        Be from one of the largest dwarf gangs in a mountain kingdom, one that even the noble dwarves
                        are scared of </label>
                </div>
                <div class="radio">
                    <label for="adventurer"><input type="radio" name="choice1"
                                                   value="Raised as an adventurer and exploring the world, "
                                                   id="adventurer">
                        Adventure outside of the mountains, trading constantly with humans and elves, exploring the
                        land. You are never sure will you will end up next </label>
                </div>
            
        <?php endif; ?>
        <input type="submit" name="submit" value="Continue" class="btn btn-default">
    </form>
    <br>
    <a href="<?= ($BASE) ?>/select">
        <button name="exit" class="btn btn-default">Exit</button>
    </a>

</div>

<script type="text/javascript">
    if ("<?= ($character['race'] == 'Human') ?>" == 1) {
        $('body').css('background-image', "url('<?= ($BASE) ?>/images/human1.jpg");
        $('body').css('background', "size('100%')");
    }
    ;
    if ("<?= ($character['race'] == 'Elf') ?>" == 1) {
        $('body').css('background-image', "url('<?= ($BASE) ?>/images/elf1.jpg");
        $('body').css('background', "size('100%')");
    }
    ;
    if ("<?= ($character['race'] == 'Dwarf') ?>" == 1) {
        $('body').css('background-image', "url('<?= ($BASE) ?>/images/dwarf1.jpg");
        $('body').css('background', "size('100%')");
    }
    ;
</script>
</body>
</html>