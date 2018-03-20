<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/finalpage.css">
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
    <title>Final Page</title>
</head>
<body>
<nav class="navbar bg-light navbar-light">
    <a class="nav-item nav-link" href="select">Fantasy Realms</a>
    <a class="nav-item nav-link" href="/328/fantasyrealms/" id="logout">Logout</a>
</nav>

<div class="container" id="main">
    <h2>Final Story Page</h2>
    <p>You have had quite the adventure but it is time to settle down into something that will take you until death. How
        do you want to carry on the rest of you life? </p>
    <form method="post" action="#">
        <div class="radio">
            <label for="settle"><input type="radio" name="finalChoice" id="settle"
                                       value="<?= ($newchar->getName()) ?> settled down in a local village to raise a family."
                                       checked>
                Settle down and raise a family in a village </label>
        </div>
        <div class="radio">
            <label for="adventure"><input type="radio" name="finalChoice" id="adventure"
                                          value="<?= ($newchar->getName()) ?> continued to have adventures across many lands until their final days.">
                Continue to journey across various lands, discovering new things and people, living on the edge of
                danger and death </label>
        </div>
        <div class="radio">
            <label for="guard"><input type="radio" name="finalChoice" id="guard"
                                      value="<?= ($newchar->getName()) ?> became a guard to their local kingdom. Guarding their realm until their final breath.">
                Join the guard of your local racial kingdom, protecting it's citizens from any danger </label>
        </div>
        <input type="submit" name="submit" value="Finish" class="btn btn-default">

    </form>
    <br>
    <a href="<?= ($BASE) ?>/select">
        <button name="exit" class="btn btn-default">Exit</button>
    </a>
</div>

<script>
    $('#settle').click(function () {
        if ($('#settle').is(':checked')) {
            $('body').css('background-image', "url('<?= ($BASE) ?>/images/settle.jpg");
            $('body').css('background', "size('100%')");
        }
    });
    $('#adventure').click(function () {
        if ($('#adventure').is(':checked')) {
            $('body').css('background-image', "url('<?= ($BASE) ?>/images/adventure.jpg");
            $('body').css('background', "size('100%')");
        }
    });
    $('#guard').click(function () {
        if ($('#guard').is(':checked')) {
            $('body').css('background-image', "url('<?= ($BASE) ?>/images/guard.jpg");
            $('body').css('background', "size('100%')");
        }
    });
</script>
</body>
</html>