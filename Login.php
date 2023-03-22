<?php
session_unset();
include('config.php');
include('Header.php');
if (isset($_POST['Login'])) {
    $Email = $_POST['Email'];
    $pwd = $_POST['password'];
    $query = "SELECT * from Users WHERE Email='$Email' && Password='$pwd'";
    $data = $conn->query($query);
    $total = (mysqli_num_rows($data));
    if ($total == 1) {
        session_start();
        $_SESSION["user_name"] = $Email;
        header("Location:DashBoard.php");
        exit();
    } else {
        header("Location:index.php");
        exit();
    }
}
?>
<!DOCTYPE html>

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
    <div class="container">
        <form method=post action="" class="form">
            <h1 class="title text-primary">Login</h1>
            <div class="mb-2">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control" id="Email" name="Email">
            </div>
            <div class="mb-2">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password">
            </div>
            <div class="submitcontent">
                <input type="submit" class="btn submit btn-primary" value="Login" name="Login">
            </div>
            <div class="mb-2 mt-2">
                <h6 class="mt-1 mb-1">New user? <a class="" href=" index.php">Register</a> Here </h6>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="" async defer></script>
</body>

</html>