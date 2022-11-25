<?php

    if(!isset($_SESSION['logged-in'])){
        header('location: ../homepage/homepage.php');
    }

?>