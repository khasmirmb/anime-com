<?php

    require_once '../tools/functions.php';
    require_once '../classes/polls.class.php';

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
    //if the above code is false then code and html below will be executed

    //if add faculty is submitted
    if(isset($_POST['save'])){

        $polls = new Polls();
        //sanitize user inputs
        $polls->title = htmlentities($_POST['title']);
        $polls->season = htmlentities($_POST['season']);
        $polls->image = htmlentities($_POST['image']);
        if($polls->add()){
            //redirect user to program page after saving
             header('location: polls.php');
        }
    }

    require_once '../includes_admin/header.php';
    require_once '../includes_admin/sidebar.php';
    require_once '../includes_admin/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Poll</h3>
                <a class="back" href="polls.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addpolls.php" method="post">

                    <label for="title">Poll Title</label>
                    <input type="text" id="title" name="title" required placeholder="Enter Title" value="<?php if(isset($_POST['title'])) { echo $_POST['title']; } ?>">

                    <label for="season">Poll Season</label>
                    <input type="text" id="season" name="season" required placeholder="Enter Season" value="<?php if(isset($_POST['season'])) { echo $_POST['season']; } ?>">

                    <label for="image">Poll Image</label>
                    <input type="text" id="image" name="image" required placeholder="Enter Image" value="<?php if(isset($_POST['image'])) { echo $_POST['image']; } ?>">


                    <input type="submit" class="button" value="Save Poll" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes_admin/bottomnav.php';
    require_once '../includes_admin/footer.php';
?>