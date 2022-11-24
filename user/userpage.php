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
                header('location: ../admin/dashboard.php');
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
            <div class="profile-details">
                <i class='bx bx-user-circle'></i>
                <span class="admin-name"><?php echo $_SESSION['fullname']; ?></span>
                <li id="logout-link">
                <a href="../homepage/logout.php">
                <i class='bx bx-log-out'></i>
                <span class="links-name">Logout</span>
                </a>
                </li>
            </div>
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

        <div class="charts-leader">
            <hr>
            <h2>Chart Leaders</h2>
            <hr>
            <div class="box">
                <div class="heading">
                    <h3>Male Characters</h3>
                </div>
                <img src="https://cdn.myanimelist.net/images/characters/6/343344.jpg" alt="">
                <div class="description">
                    <h4>Shigeo Kageyama / Mob</h4>
                    <p>Week 5 - Fall</p>
                    <br>
                    <h4>Mob Pyscho III</h4>
                    <p>Fall 2022</p>
                </div>
            </div>

            <div class="box">
                <div class="heading">
                    <h3>Female Characters</h3>
                </div>
                <img src="https://cdn.myanimelist.net/images/characters/8/491455.jpg" alt="">
                <div class="description">
                    <h4>Hitori Gotou / Bocchi</h4>
                    <p>Week 5 - Fall</p>
                    <br>
                    <h4>Bocchi the Rock!</h4>
                    <p>Fall 2022</p>
                </div>
            </div>
            <div class="box">
                <div class="heading">
                    <h3>Couple-Ship</h3>
                </div>
                <img src="https://cdn.realsport101.com/images/ncavvykf/epicstream/a13c578fb7704b363631c3ce602cb0ba51e7196e-987x558.png?rect=0,1,987,556&w=700&h=394&dpr=2" alt="">
                <div class="description">
                    <h4>Yor x Loid</h4>
                    <p>Week 5 - Fall</p>
                    <br>
                    <h4>Spy x Family Part 2</h4>
                    <p>Fall 2022</p>
                </div>
            </div>
            <div class="box">
                <div class="heading">
                    <h3>Top Anime</h3>
                </div>
                <img src="https://cdn.myanimelist.net/images/anime/1806/126216.jpg" alt="">
                <div class="description">
                    <h4>Chainsaw Man</h4>
                    <p>Week 5 - Fall</p>
                    <br>
                    <h4>MAPPA</h4>
                    <p>Fall 2022</p>
                </div>
            </div>
        </div>

<?php
    require_once '../includes/footer.php';
?>