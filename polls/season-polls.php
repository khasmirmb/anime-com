<?php
    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    require_once '../includes/auto-checker.php';
    require_once '../includes/header.php';
    require_once '../includes/topnav.php';

    require_once '../classes/basic.database.php';

    if(!isset($_GET['poll'])){
        header('location: ../user/userpage.php');
    } else{
        $id =(int)$_GET['poll'];

        $pollQuery = $db->prepare("SELECT id, title, season FROM polls WHERE id = :poll");

        $pollQuery->execute([
            'poll' => $id
        ]);

        $poll = $pollQuery->fetchOBject();
    }

    $choicesQuery = $db->prepare("SELECT polls.id, polls_choices.id AS choice_id, polls_choices.anime_name, polls_choices.description FROM
    polls JOIN polls_choices ON polls.id = polls_choices.poll WHERE polls.id = :poll");

    $choicesQuery->execute([
        'poll' => $id
    ]);

    while($row = $choicesQuery->fetchObject()){
        $choices[] = $row;
    }

    if(isset($_POST['poll'])){
        $choice = $_POST['choice'];
    }

?>

<div class="seasonal-title">
        <div class="seasonal-description">
            <h1>Fall 2022</h1>
            <h2>Seasonal Polls</h2>
            <h3>Anime Trending</h3>
        </div>
</div>

<div class="poll-wraper">

    <?php if (!$poll): ?>
        <div class="error-poll">
            <h2>That poll doesn't exist!</h2>
        </div>
    <?php else: ?>
        <div class="polls">
            <div class="poll-title">
                <h1><?php echo $poll->title ;?></h1>
                <h4><?php echo $poll->season ;?></h4>
            </div>
            <?php if(!empty($choices)): ?>
            <form action="vote.php" method="post">
                <div class="poll-options">

                    <?php foreach($choices as $index => $choice):?>
                        <div class="poll-option">
                            <input type="radio" name="choice" value="<?php $choice->choice_id; ?>"
                            id="c<?php echo $index; ?>">
                            <label for="c<?php echo $index; ?>"><?php echo $choice->anime_name; ?></label>
                        </div>
                    <?php endforeach;?>

                    <input type="submit" value="Submit Vote">
                    <input type="hidden" name="poll" value="<?php echo $id; ?>">
            </form>
            <?php else: ?>
                <div class="choices-error">
                    <h1>There are no choices right now</h1>
                </div>
            <?php endif; ?>
        </div>
    <?php endif;?>
</div>



<?php
    require_once '../includes/footer.php';
?>