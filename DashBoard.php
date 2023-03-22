<?php
include('Header.php');
include('config.php');
$user_profile = $_SESSION["user_name"];
if (!isset($_SESSION['user_name'])) {
    header("Location:http://index.php");
} else {

    function registredMemberCount($conn)
    {
        $query = "SELECT COUNT(Id) FROM `users`";
        $usr_count = $conn->query($query);
        $rows = mysqli_fetch_row($usr_count);
        return $rows[0];
    }
    function ZooCount($conn)
    {
        $query = "SELECT COUNT(Id) FROM `Zoo`";
        $zoo_count = $conn->query($query);
        $rows_zoo = mysqli_fetch_row($zoo_count);
        return $rows_zoo[0];
    }
    function AnimalsCount($conn)
    {
        $query = "SELECT COUNT(Id) FROM `Animals` WHERE activity_status=1";
        $animal_count = $conn->query($query);
        $rows = mysqli_fetch_row($animal_count);
        return $rows[0];
    }

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
    <div class="container dashboard">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <img src="./images/users.jpeg" class="card-img-top dashboard-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Total-Users</h5>
                        <p class="card-text text-center">
                            <?php echo registredMemberCount($conn); ?>
                        </p>
                        <a href="users.php" class="btn btn-primary w-100">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="./images/animal.jpeg" class="card-img-top dashboard-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Total Animals</h5>
                        <p class="card-text text-center">
                            <?php echo AnimalsCount($conn); ?>
                        </p>
                        <a href="animals.php" class="btn btn-primary w-100">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="./images/lion.png" class="card-img-top dashboard-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Total Zoo</h5>
                        <p class="card-text text-center">
                            <?php echo ZooCount($conn); ?>
                        </p>
                        <a href="Zoo.php" class="btn btn-primary w-100">View Details</a>
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