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

?>

    <div class="top-navigation">
        <a href="#"><h1 class="logo">Ani<span>Zone</span></h1></a>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Trending</a></li>
                <li><a href="#">Polls</a></li>
                <li><a href="#">About</a></li>
            </ul>
            <button type="button" id="login-show">Login</button>
            <button type="button" id="#">SignUp</button>
    </div>

    <?php

    require_once '../includes/slider.php';
    require_once '../includes/home-sidebar.php';

    ?>

    <div id="login-modal">
        <div class="modal">
            <div class="top-form">
                <div class="close-modal">
                    &#10006;
                </div>
            </div>
            <div class="login-form">
                <h2>Login to Ani<span>Zone</span></h2>
                <form action="homepage.php" method="post">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <button type="submit" name="login" class="submit-btn">Login</button>
                <?php
                    //Display the error message if there is any.
                    if(isset($error)){
                        echo '<div><p class="error">'.$error.'</p></div>';
                    }
                ?>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            $('#login-show').click(function(){
                $('#login-modal').fadeIn().css('display', 'flex')
            });

            $('.close-modal').click(function(){
                $('#login-modal').fadeOut();
            });
        });
    </script>

    <?php

    require_once '../includes/charts-leader.php';

    ?>

<?php
    require_once '../includes/footer.php';
?>