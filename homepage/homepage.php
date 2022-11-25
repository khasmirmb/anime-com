<?php
    require_once '../classes/account.class.php';
    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system

    if(isset($_POST['username']) && isset($_POST['password'])){
        //Sanitizing the inputs of the users. Mandatory to prevent injections!
        $users = new Accounts;
        $users->username = htmlentities($_POST['username']);
        $users->password = htmlentities($_POST['password']);
        $res = $users->validate();
        if($res){
            $_SESSION['logged-in'] = $res['username'];
            $_SESSION['fullname'] = $res['firstname'].' '.$res['lastname'];
            $_SESSION['user_type'] = $res['type'];
            if($res['type'] == 'admin'){
                header('location: ../user/adminpage.php');
            }else{
                header('location: ../user/userpage.php');
            }
        }
        //set the error message if account is invalid
        $error = 'Invalid username/password. Try again.';
    }

    require_once '../includes/header.php';
    require_once '../includes/login-checker.php';
    require_once '../includes/homepage-topnav.php';

?>

    <?php

    require_once '../includes/slider.php';
    require_once '../includes/home-sidebar.php';
    require_once '../includes/charts-leader.php';


    ?>


<?php
    require_once '../includes/footer.php';
?>