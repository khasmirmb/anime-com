<?php

    require_once '../tools/functions.php';
    require_once '../classes/account.class.php';

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
                header('location: account.php');
            }
        }
    }

    require_once '../includes_admin/header.php';
    require_once '../includes_admin/sidebar.php';
    require_once '../includes_admin/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New User</h3>
                <a class="back" href="account.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addaccount.php" method="post">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required placeholder="Enter Firstname" value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_signup_first_name($_POST)){
                    ?>
                                <p class="error">First name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required placeholder="Enter Lastname" value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_signup_last_name($_POST)){
                    ?>
                                <p class="error">Last name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Enter Username" value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_signup_username($_POST) && !validate_username_duplicate($_POST)){
                    ?>
                                <p class="error">Username is invalid. Trailing spaces will be ignored. Or Username already taken.</p>
                    <?php
                        }
                    ?>
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password" required placeholder="Enter Password" value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_signup_password($_POST)){
                    ?>
                                <p class="error">Password is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <div>
                        <label for="type">Type</label><br>
                        <label class="container" for="admin">Admin
                            <input type="radio" name="type" id="admin" value="admin" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'admin') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" for="user">User
                            <input type="radio" name="type" id="user" value="user" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'user') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <input type="submit" class="button" value="Save Account" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes_admin/bottomnav.php';
    require_once '../includes_admin/footer.php';
?>