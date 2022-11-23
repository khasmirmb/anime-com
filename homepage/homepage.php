<?php
    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    $accounts = array(
        "user1" => array(
            "firstname" => 'Jaydee',
            "lastname" => 'Ballaho',
            "type" => 'admin',
            "username" => 'jaydee',
            "password" => 'jaydee'
        ),
        "user2" => array(
            "firstname" => 'Root',
            "lastname" => 'Root',
            "type" => 'admin',
            "username" => 'root',
            "password" => 'root'
        ),
        "user3" => array(
            "firstname" => 'Natsu',
            "lastname" => 'Dragneel',
            "type" => 'user',
            "username" => 'natsu',
            "password" => 'natsu'
        ),
        "user4" => array(
            "firstname" => 'Erza',
            "lastname" => 'Scarlet',
            "type" => 'user',
            "username" => 'erza',
            "password" => 'erza'
        ),
        "user5" => array(
            "firstname" => 'Lucy',
            "lastname" => 'Felix',
            "type" => 'user',
            "username" => 'lucy',
            "password" => 'lucy'
        )
    );
    if(isset($_POST['username']) && isset($_POST['password'])){
        //Sanitizing the inputs of the users. Mandatory to prevent injections!
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        foreach($accounts as $keys => $value){
            //check if the username and password match in the array
            if($username == $value['username'] && $password == $value['password']){
                //if match then save username, fullname and type as session to be reused somewhere else
                $_SESSION['logged-in'] = $value['username'];
                $_SESSION['user_type'] = $value['type'];
                //display the appropriate dashboard page for user
                if($value['type'] == 'admin'){
                    header('location: ../admin/dashboard.php');
                }else{
                    header('location: ../user/login.php');
                }
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
                <li><a href="#">Discussion</a></li>
                <li><a href="#">About</a></li>
            </ul>
            <button type="button" id="login-show">Login</button>
    </div>

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
                $('#login-modal').fadeIn().css('display', 'flex');
            });
            $('.close-modal').click(function(){
                $('#login-modal').fadeOut();
            });
        });
    </script>

<?php
    require_once '../includes/footer.php';
?>