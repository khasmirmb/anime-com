<?php
    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    require_once '../includes/auto-checker.php';
    require_once '../includes/header.php';
    require_once '../includes/topnav.php';

    require_once '../classes/basic.database.php';

?>

<div class="seasonal-title">
        <div class="seasonal-description">
            <h1>Fall 2022</h1>
            <h2>Seasonal Anime Polls</h2>
            <h3>Anime Trending</h3>
        </div>
</div>

<div class="anime-wraper">
    <div class="season-anime">
        <h1>Seasonal Anime Polls</h1>
    </div>
    <form action="vote.php" method="post">
        <div class="poll-options">
            <div class="poll-option">
                <input type="radio" name="choice" value="1" id="c1">
                <label for="c1">Choice 1</label>
            </div>
            <div class="poll-option">
                <input type="radio" name="choice" value="2" id="c2">
                <label for="c2">Choice 2</label>
            </div>
            <div class="poll-option">
                <input type="radio" name="choice" value="3" id="c3">
                <label for="c3">Choice 3</label>
            </div>
            <input type="submit" value="Submit Vote">
            <input type="hidden" name="poll" value="1">
        </div>
    </form>
</div>



<?php
    require_once '../includes/footer.php';
?>