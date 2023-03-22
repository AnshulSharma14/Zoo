<?php
session_unset();
include('Header.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('config.php');
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phonenumber'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Users(First_Name,Last_Name,Email,Phone_Number,password) VALUES 
    ('$first_name','$last_name','$email','$phone_number','$password')";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["user_name"] = $email;
        header("Location:DashBoard.php");
        exit();
    } else {

        
    }
    mysqli_close($conn);
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
        <form method=post action="index.php" class="form">
            <h1 class="title text-primary mb-3">Registration form</h1>
            <div class="mb-2">
                <label for="FirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="FirstName" name="firstname">
            </div>
            <div class="mb-2">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="LastName" name="lastname">
            </div>
            <div class="mb-2">
                <label for="Email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="Email" name="email">
            </div>
            <div class="mb-2">
                <label for="Phonenumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="Phonenumber" name="phonenumber">
            </div>
            <div class="mb-2">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password">
            </div>
            <div class="mb-2">
                <label for="ConfirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="ConfirmPassword">
            </div>
            <div class="mb-2 form-check">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label" for="">I agree</label>
            </div>
            <div class="submitcontent">
                <input type="submit" class="btn btncs btn-primary" value="submit">
            </div>
            <div class="mb-2 mt-2">
                <h6 class="mt-1 mb-1">Already Register login Here <a class="" href=" Login.php">Login</a></h6>
            </div>
        </form>
    </div>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="" async defer></script>
</body>

</html>