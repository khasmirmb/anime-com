
<?php
    require_once '../includes/header.php';

    if(!isset($_SESSION['logged-in'])){

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
            $('.vote-list-content, .ranking-list-content, .polls-list, .today-top, .box, #login-show').click(function(){
                $('#login-modal').fadeIn().css('display', 'flex')
            });

            $('.close-modal').click(function(){
                $('#login-modal').fadeOut();
            });
        });
</script>



<div id="signup-modal">
        <div class="modal">
            <div class="top-form">
                <div class="close-modal">
                    &#10006;
                </div>
            </div>
            <div class="signup-form">
                <h2>SingUp to Ani<span>Zone</span></h2>
                <form action="homepage.php" method="post">
                    <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname" required>
                    <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname" required>
                    <input type="hidden" id="type" name="type"" value="user">
                    <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                    <button type="submit" value="create account" name="save" id="save">Create Account</button>
                </form>
            </div>
        </div>
</div>

<script type="text/javascript">
    $(function(){
            $('#signup-show').click(function(){
                $('#signup-modal').fadeIn().css('display', 'flex')
            });

            $('.close-modal').click(function(){
                $('#signup-modal').fadeOut();
            });
        });
</script>



<?php

}

?>
