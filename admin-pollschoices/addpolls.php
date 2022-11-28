<?php

    require_once '../tools/functions.php';
    require_once '../classes/polls.choices.class.php';

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

        $choices = new Choices();
        //sanitize user inputs
        $choices->anime_name = htmlentities($_POST['anime_name']);
        $choices->description = htmlentities($_POST['description']);
        $choices->image = htmlentities($_POST['image']);
        $choices->poll = htmlentities($_POST['poll']);
        if($choices->add()){
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
                <h3 class="table-title">Add New Choices</h3>
                <a class="back" href="polls.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addpolls.php" method="post">

                    <label for="anime_name">Name</label>
                    <input type="text" id="anime_name" name="anime_name" required placeholder="Enter Name" value="<?php if(isset($_POST['anime_name'])) { echo $_POST['anime_name']; } ?>">

                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" required placeholder="Enter Description" value="<?php if(isset($_POST['description'])) { echo $_POST['description']; } ?>">

                    <label for="image">Image</label>
                    <input type="text" id="image" name="image" required placeholder="Enter Image" value="<?php if(isset($_POST['image'])) { echo $_POST['image']; } ?>">

                    <label for="poll">Poll Title/Name</label>
                    <select name="poll">
                            <?php
                                require_once("../classes/polls.class.php");
                                $polls = new Polls();
                                foreach($polls->show() as $value){?>
                                   <option value="<?php echo $value['id'];?>"><?php
                                   echo $value['title'];
                                   ?></option>
                            <?php
                                }

                            ?>
                    </select>


                    <input type="submit" class="button" value="Save Choices" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes_admin/bottomnav.php';
    require_once '../includes_admin/footer.php';
?>