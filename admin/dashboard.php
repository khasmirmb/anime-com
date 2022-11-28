<?php

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../homepage/homepage.php');
    }
    //if the above code is false then html below will be displayed
    require_once '../classes/basic.database.php';
    require_once '../includes_admin/header.php';
    require_once '../includes_admin/sidebar.php';
    require_once '../includes_admin/topnav.php';

    $accountQuery = $db->query("SELECT COUNT(id) AS total_account FROM user");

    while($row = $accountQuery->fetchObject()){
        $users[] = $row;
    }
    $voteQuery = $db->query("SELECT COUNT(id) AS total_vote FROM polls_answers");

    while($row = $voteQuery->fetchObject()){
        $votes[] = $row;
    }
    $pollsQuery = $db->query("SELECT COUNT(id) AS total_poll FROM polls");

    while($row = $pollsQuery->fetchObject()){
        $polls[] = $row;
    }
    $choiceQuery = $db->query("SELECT COUNT(id) AS total_choice FROM polls_choices");

    while($row = $choiceQuery->fetchObject()){
        $choices[] = $row;
    }

?>

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <?php foreach($users as $user){ ?>
                    <div class="box-topic">Total Account</div>
                    <div class="number"><?php echo $user->total_account; ?></div>
                    <div class="indicator">
                    <?php } ?>
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-send cart'></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <?php foreach($votes as $vote){ ?>
                    <div class="box-topic">Total Votes</div>
                    <div class="number"><?php echo $vote->total_vote; ?></div>
                    <div class="indicator">
                    <?php } ?>
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-edit-alt cart two'></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <?php foreach($polls as $poll){ ?>
                    <div class="box-topic">Total Polls</div>
                    <div class="number"><?php echo $poll->total_poll; ?></div>
                    <div class="indicator">
                    <?php } ?>

                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-phone-call cart three'></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <?php foreach($choices as $choice){ ?>
                    <div class="box-topic">Total Polls Choices</div>
                    <div class="number"><?php echo $choice->total_choice; ?></div>
                    <div class="indicator">
                    <?php } ?>

                    <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-message-square-x cart four'></i>
            </div>
        </div>

    </div>

<?php
    require_once '../includes_admin/bottomnav.php';
    require_once '../includes_admin/footer.php';
?>