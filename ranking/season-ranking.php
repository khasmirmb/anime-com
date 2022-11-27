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
            GROUP BY polls_choices.id
            ");

            $answerQuery->execute([
                'poll' => $id
            ]);

            while($row = $answerQuery->fetchObject()){
                $answers[] = $row;
            }

        }else{

            $choicesQuery = $db->prepare("SELECT polls.id, polls_choices.id AS choice_id, polls_choices.anime_name, polls_choices.description FROM
            polls JOIN polls_choices ON polls.id = polls_choices.poll WHERE polls.id = :poll");

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

<div class="ranking-wraper">

        <div class="ranking">
            <div class="ranking-title">
                <h1><?php echo $poll->title ;?></h1>
                <h4><?php echo $poll->season ;?></h4>
            </div>
            <div class="ranking-list">
                <ul>
                    <?php foreach($answers as $answer){ ?>
                        <li>
                        <img src="<?php echo $answer->image ?>" alt="">
                        <h1><?php echo $answer->anime_name; ?></h1>
                        <h><?php echo number_format($answer->percentage, 2)?>%</h></li>
                    <?php }?>
                </ul>
            </div>
        </div>

</div>



<?php
    require_once '../includes/footer.php';
?>