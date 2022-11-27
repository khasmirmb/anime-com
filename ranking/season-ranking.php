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

        $answerQuery = $db->prepare("SELECT polls_choices.anime_name,polls_choices.description, polls_choices.image,
        COUNT(polls_answers.id) * 100 / (
        SELECT COUNT(*) FROM polls_answers
        WHERE polls_answers.poll = :poll) AS percentage
        FROM polls_choices
        LEFT JOIN polls_answers
        ON polls_choices.id = polls_answers.choice
        WHERE polls_choices.poll = :poll
        GROUP BY polls_choices.id ORDER BY percentage DESC, polls_choices.anime_name ASC
        ");

        $answerQuery->execute([
            'poll' => $id
        ]);

        while($row = $answerQuery->fetchObject()){
            $answers[] = $row;
        }

    }

?>

<div class="seasonal-title">
        <div class="seasonal-description">
            <h1>Fall 2022</h1>
            <h2><?php echo $poll->title?> Ranking</h2>
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
                        <img src="<?php echo $answer->image ?>" alt="" width="225px" height="350px">
                        <h2><?php echo $answer->anime_name; ?></h2>
                        <h3><?php echo number_format($answer->percentage, 2)?>%</h3></li>
                    <?php }?>
                </ul>
            </div>
        </div>

</div>



<?php
    require_once '../includes/footer.php';
?>