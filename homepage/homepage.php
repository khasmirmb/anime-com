<?php
    require_once '../classes/account.class.php';
    require_once '../tools/functions.php';
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
            $_SESSION['user'] = $res['id'];
            $_SESSION['logged-in'] = $res['username'];
            $_SESSION['fullname'] = $res['firstname'].' '.$res['lastname'];
            $_SESSION['user_type'] = $res['type'];
            if($res['type'] == 'admin'){
                header('location: ../admin/dashboard.php');
            }else{
                header('location: ../user/userpage.php');
            }
        }
        //set the error message if account is invalid
        $error = 'Invalid username/password. Try again.';
    }

    if(isset($_POST['save'])){

        $account = new Accounts();
        //sanitize user inputs
        $account->firstname = htmlentities($_POST['firstname']);
        $account->lastname = htmlentities($_POST['lastname']);
        $account->type = htmlentities($_POST['type']);
        $account->username = htmlentities($_POST['username']);
        $account->password = htmlentities($_POST['password']);
        if(validate_signup($_POST)){
            if($account->add()){
                //redirect user to program page after saving
                header('location: ../homepage/homepage.php');
            }
        }else{
            $user_taken = 'Username Already Taken.';
        }
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