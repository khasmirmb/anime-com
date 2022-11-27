<?php

function validate_first_name($POST){
    if(!isset($POST['firstname'])){
        return false;
    }else if(strlen(trim($POST['firstname']))<1){
        return false;
    }
    return true;
}

function validate_last_name($POST){
    if(!isset($POST['lastname'])){
        return false;
    }else if(strlen(trim($POST['lastname']))<1){
        return false;
    }
    return true;
}

function validate_username($POST){
    if(!isset($POST['username'])){
        return false;
    }else if(strlen(trim($POST['username']))<1){
        return false;
    }
    return true;
}

function validate_password($POST){
    if(!isset($POST['password'])){
        return false;
    }else if(strlen(trim($POST['password']))<1){
        return false;
    }
    return true;
}

function validate_signup($POST){
    if(!validate_first_name($POST) || !validate_last_name($POST) || !validate_username($POST) || !validate_password($POST)){
        return false;
     }
    return true;
}

?>