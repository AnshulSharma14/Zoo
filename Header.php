<header>
    <nav class="navbar bg-dark py-3">
        <div class="navbar-logo">
            <a href="#"><img src="images/lion.png" class="nav-bar-logo"></a>
        </div>
        <div class="nav-bar-content">
            <ul class="nav-list">
                <li class="text-white">
            <?php
            session_start();
            if (isset($_SESSION['user_name'])) {
            $user_profile = $_SESSION["user_name"];
            echo "Welcome ". $user_profile ;
            ?>
            
            </li>
            <li class="text-white d-flex float-end">
            <a href="logout.php" class="btn btn-danger">logout</a>
            </li>
            <?php
            }
            ?>
            </ul>
        </div>
    </nav>
</header>