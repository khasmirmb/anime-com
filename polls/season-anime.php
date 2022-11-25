<?php

    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    require_once '../includes/auto-checker.php';
    require_once '../includes/header.php';
    require_once '../includes/topnav.php';

?>

<div class="anime-wraper">
    <div class="season-anime">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis nam nihil odit consequatur unde!</p>
        <div class="season-anime-info">
            <i class='bx bx-like'></i>
        </div>
    </div>
</div>

<?php
    require_once '../includes/footer.php';
?>