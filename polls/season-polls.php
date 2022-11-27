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
    }
    else{
        $id =(int)$_GET['poll'];

        $pollQuery = $db->prepare("SELECT id, title, season FROM polls WHERE id = :poll");

        $pollQuery->execute([
            'poll' => $id
        ]);

        $poll = $pollQuery->fetchObject();

        $answerQuery = $db->prepare("SELECT polls_choices.id AS choice_id, polls_choices.anime_name AS choice_name FROM polls_answers JOIN polls_choices ON polls_answers.choice = polls_choices.id WHERE polls_answers.user = :user AND polls_answers.poll  = :poll");

        $answerQuery->execute([
            'user' => $_SESSION['user'],
            'poll' => $id
        ]);

        $completed = $answerQuery->rowCount() ? true : false;

        if($completed){

            $answerQuery = $db->prepare("SELECT polls_choices.anime_name,polls_choices.description, polls_choices.image,
            COUNT(polls_answers.id) * 100 / (
            SELECT COUNT(*) FROM polls_answers
            WHERE polls_answers.poll = :poll) AS percentage
            FROM polls_choices
            LEFT JOIN polls_answers
            ON polls_choices.id = polls_answers.choice
            WHERE polls_choices.poll = :poll
            GROUP BY polls_choices.id ORDER BY percentage DESC
            ");

            $answerQuery->execute([
                'poll' => $id
            ]);

            while($row = $answerQuery->fetchObject()){
                $answers[] = $row;
            }

        }else{

            $choicesQuery = $db->prepare("SELECT polls.id, polls_choices.id AS choice_id, polls_choices.anime_name, polls_choices.description, polls_choices.image FROM
            polls JOIN polls_choices ON polls.id = polls_choices.poll WHERE polls.id = :poll ORDER BY polls_choices.anime_name ASC");

            $choicesQuery->execute([
                'poll' => $id,
            ]);

            while($row = $choicesQuery->fetchObject()){
                $choices[] = $row;
            }
        }
    }
?>

<div class="seasonal-title">
        <div class="seasonal-description">
            <h1>Fall 2022</h1>
            <h2><?php echo $poll->title?> Poll</h2>
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

            <?php if($completed): ?>
                <div class="completed-poll">
                    <h1>You have already completed this poll, Thank you for voting!</h1>
                </div>
            <?php else:?>

            <?php if(!empty($choices)): ?>
            <form action="vote.php" method="POST">
                <div class="poll-options">

                    <?php foreach($choices as $index => $choice):?>
                        <div class="poll-option">
                            <label for="c<?php echo $index; ?>" class="container">
                            <h2><?php echo $choice->anime_name; ?></h2>
                            <input type="radio" name="choice" value="<?php echo $choice->choice_id; ?>"
                            id="c<?php echo $index; ?>">
                            <span class="checkmark"></span>
                            <h3><?php echo $choice->description; ?></h3>
                            <img src="<?php echo $choice->image; ?>" alt="" width="225px" height="350px">
                            </label>
                        </div>
                    <?php endforeach;?>
                    <div class="submit-btn">
                        <input type="submit" value="Submit Vote" name="save_radio" class="submit button">
                        <input type="hidden" name="poll" value="<?php echo $id; ?>">
                    </div>
            </form>
            <?php else: ?>
                <div class="choices-error">
                    <h1>There are no choices right now</h1>
                </div>
                    <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif;?>
</div>



<?php
    require_once '../includes/footer.php';
?>