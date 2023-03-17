<?php
include('Header.php');
include('config.php');
session_start();
$user_profile = $_SESSION["user_name"];
if (!isset($_SESSION['user_name'])) {
    header("Location:http://localhost:8090/Projects/index.php");
} else {
    // header("Location:http://localhost:8090/Projects/DashBoard.php");
    // exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Stylesheet.css">
</head>

<body>
    <?php
    echo $user_profile;
    ?>
    <a href="logout.php">logout</a>
    <div class="container dashboard">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <img src="./images/users.jpeg" class="card-img-top dashboard-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Total-Users</h5>
                        <p class="card-text">1</p>
                        <a href="users.php" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="./images/animal.jpeg" class="card-img-top dashboard-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Total Animals</h5>
                        <p class="card-text">1</p>
                        <a href="Users.php" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="./images/download.jpeg" class="card-img-top dashboard-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Total Zoo</h5>
                        <p class="card-text">1</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="" async defer></script>
</body>

</html>