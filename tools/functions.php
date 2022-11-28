<?php

function validate_signup_first_name($POST){
    if(!isset($POST['firstname'])){
        return false;
    }else if(strlen(trim($POST['firstname']))<1){
        return false;
    }
    return true;
}

function validate_signup_last_name($POST){
    if(!isset($POST['lastname'])){
        return false;
    }else if(strlen(trim($POST['lastname']))<1){
        return false;
    }
    return true;
}

function validate_signup_username($POST){
    if(!isset($POST['username'])){
        return false;
    }else if(strlen(trim($POST['username']))<1){
        return false;
    }
    return true;
}

function validate_username_duplicate($POST){
    if(!isset($POST['username'])){
        return false;
    }
    elseif(isset($POST['old_username'])){
        if(strcmp(strtolower($POST['username']), strtolower($POST['old_username'])) == 0){
            return true;
        }else{
            $accounts = new Accounts();
            foreach ($accounts->show() as $value){
                if(strcmp(strtolower($value['username']), strtolower($POST['username'])) == 0){
                    return false;
                }
            }
        }
    }else{
        $accounts = new Accounts();
        foreach ($accounts->show() as $value){
            if(strcmp(strtolower($value['username']), strtolower($POST['username'])) == 0){
                return false;
            }
        }
    }
    return true;
}

function validate_signup_password($POST){
    if(!isset($POST['password'])){
        return false;
    }else if(strlen(trim($POST['password']))<1){
        return false;
    }
    return true;
}

function validate_signup($POST){
    if(!validate_signup_first_name($POST) || !validate_signup_last_name($POST) || !validate_signup_username($POST) || !validate_signup_password($POST) || !validate_username_duplicate($POST)){
        return false;
     }
    return true;
}

?>