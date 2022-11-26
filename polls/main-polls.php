<?php

    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    require_once '../includes/header.php';
    require_once '../includes/topnav.php';

    require_once '../classes/basic.database.php';

    $pollsQuery = $db->query("SELECT id, title, season FROM polls");

    while($row = $pollsQuery->fetchObject()){
        $polls[] = $row;
    }

?>
    <div class="seasonal-title">
        <div class="seasonal-description">
            <h1>Fall 2022</h1>
            <h2>Seasonal Anime Polls</h2>
            <h3>Anime Trending</h3>
        </div>
    </div>

    <div class="vote-list-content">
        <?php if(!empty($polls)): ?>
            <ul>
            <?php foreach($polls as $poll): ?>
            <li><h2><a href="season-polls.php?poll=<?php echo $poll->id; ?>"><?php echo $poll->title; ?></h2><h2><?php echo $poll->season; ?></h2></a></li>
            <?php endforeach; ?>
            </ul>
            <?php else: ?>
                <h1>There's No Ongoing Polls</h1>
            <?php endif; ?>
    </div>

<?php
    require_once '../includes/footer.php';
?>