<?php
    //this is where the page starts

    //start session
    session_start();

    //check if user is login already otherwise send to login page
    if (isset($_SESSION['user_type']) == 'user'){
        header('location: user/userpage.php');
    }
    else if (isset($_SESSION['user_type']) == 'admin'){
        header('location: user/adminpage.php');
    }
    else{
        header('location: homepage/homepage.php');
    }

?>