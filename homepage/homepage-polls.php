<?php

    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    require_once '../includes/login-checker.php';
    require_once '../includes/header.php';
    require_once '../includes/homepage-topnav.php';

?>
    <div class="seasonal-title">
        <div class="seasonal-description">
            <h1>Fall 2022</h1>
            <h2>Seasonal Anime Polls</h2>
            <h3>Anime Trending</h3>
        </div>
    </div>

    <div class="vote-list-content">
        <div class="vote-box">
            <a href="#">
            <iconify-icon icon="icon-park-outline:ranking"></iconify-icon>
            <div class="vote-text">
                <h1>Seasonal Anime</h1>
                <p>Fall 2022</p>
            </div>
            </a>
        </div>

        <div class="vote-box">
            <a href="#">
            <iconify-icon icon="mdi:face-male"></iconify-icon>
            <div class="vote-text">
                <h1>Male Characters</h1>
                <p>Fall 2022</p>
            </div>
            </a>
        </div>

        <div class="vote-box">
            <a href="#">
            <iconify-icon icon="mdi:face-female"></iconify-icon>
            <div class="vote-text">
                <h1>Female Characters</h1>
                <p>Fall 2022</p>
            </div>
            </a>
        </div>

        <div class="vote-box">
            <a href="#">
            <iconify-icon icon="mdi:face-female"></iconify-icon>
            <div class="vote-text">
                <h1>Couple-Ship</h1>
                <p>Fall 2022</p>
            </div>
            </a>
        </div>

        <div class="vote-box">
            <a href="#">
            <iconify-icon icon="icon-park-outline:ranking"></iconify-icon>
            <div class="vote-text">
                <h1>Pre-Release Anime</h1>
                <p>Fall 2022</p>
            </div>
            </a>
        </div>

        <div class="vote-box">
            <a href="#">
            <iconify-icon icon="material-symbols:music-note"></iconify-icon>
            <div class="vote-text">
                <h1>Anime Music</h1>
                <p>Fall 2022</p>
            </div>
            </a>
        </div>

    </div>

<?php
    require_once '../includes/footer.php';
?>