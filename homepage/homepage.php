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
        <section class="section">
            <div class="slider">
                <div class="slide">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">

                    <div class="st first">
                            <img src="../images/img1.jpg" alt="img" width="850" height="400">
                    </div>

                    <div class="st">
                        <img src="../images/img2.jpg" alt="img" width="850" height="400">
                    </div>

                    <div class="st">
                        <img src="../images/img3.jpg" alt="img" width="850" height="400">
                    </div>

                    <div class="st">
                        <img src="../images/img4.jpg" alt="img" width="850" height="400">
                    </div>

                    <div class="nav-auto">
                        <div class="a-b1"></div>
                        <div class="a-b2"></div>
                        <div class="a-b3"></div>
                        <div class="a-b4"></div>
                    </div>
                </div>
                <div class="nav-m">
                    <label for="radio1" class="m-btn"></label>
                    <label for="radio2" class="m-btn"></label>
                    <label for="radio3" class="m-btn"></label>
                    <label for="radio4" class="m-btn"></label>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            var counter=1;
            setInterval(function(){
                document.getElementById('radio' + counter).checked=true;
                counter++;
                if(counter > 4){
                    counter = 1;
                }
            },5000);
        </script>
    <div class="home-sidebar">
        <div class="voting-links">
            <iconify-icon icon="fluent:vote-24-regular"></iconify-icon>
            <span class="vote-name">Voting Links</span>
        </div>
        <ul class="vote-links">
        <li class="vote1">
            <a href="#" class="">
                <iconify-icon icon="icon-park-outline:ranking"></iconify-icon>
                <span class="links-name">Top Anime Polls</span>
                <p>Result Every Sunday</p>
            </a>
        </li>
        <li class="vote">
            <a href="#" class="">
                <iconify-icon icon="mdi:face-male"></iconify-icon>
                <span class="links-name">Male Character Polls</span>
                <p>Result Every Sunday</p>
            </a>
        </li>
        <li class="vote1">
            <a href="#" class="">
                <iconify-icon icon="mdi:face-female"></iconify-icon>
                <span class="links-name">Female Character Polls</span>
                <p>Result Every Sunday</p>
            </a>
        </li>
        <li class="vote">
            <a href="#" class="">
                <iconify-icon icon="mdi:cards-heart"></iconify-icon>
                <span class="links-name">Couple-Ship Polls</span>
                <p>Result Every Sunday</p>
            </a>
        </li>
        <li class="vote1">
            <a href="#" class="">
                <iconify-icon icon="icon-park-outline:ranking"></iconify-icon>
                <span class="links-name">Pre-Release Anime Polls</span>
                <p>Result Every Sunday</p>
            </a>
        </li>
        </ul>
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