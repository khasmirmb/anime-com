<div class="top-navigation">
        <a href="#"><h1 class="logo">Ani<span>Zone</span></h1></a>
            <ul>
                <li><a href="../user/userpage.php">Home</a></li>
                <li><a href="#">Trending</a></li>
                <li><a href="../polls/main-polls.php">Polls</a></li>
                <li><a href="#">Ranking</a></li>
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