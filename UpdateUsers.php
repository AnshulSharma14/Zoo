<?php
include('Header.php');
include('config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $Id = $_POST['Id'];
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $phone_number = $_POST['phonenumber'];
        echo ($Id);
        echo ($first_name);
        echo ($last_name);
        echo ($email);
        echo ($phone_number);
        $sql = "UPDATE Users SET
        First_Name='$first_name',
        Last_Name='$last_name', 
        Email='$email', 
        Phone_Number='$phone_number'
        WHERE Id='$Id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location:users.php");

        } else {
            echo "no changes made";
        }
    }
}
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM `Users` WHERE Id='$user_id'";
    $result = $conn->query($sql);
    $total = (mysqli_num_rows($result));
    if ($total > 0) {
        while ($row = $result->fetch_assoc()) {

            $first_name = $row['First_Name'];
            $last_name = $row['Last_Name'];
            $email = $row['Email'];
            $phone_number = $row['Phone_Number'];
            $id = $row['Id'];
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="Stylesheet.css">
        </head>

        <body>
            <div class="container">
                <form method=post action="" class="form">
                    <h1 class="title text-primary mb-3">Update Users</h1>
                    <input type="hidden" class="form-control" id="Id" name="Id" value=<?php print($id) ?>>
                    <div class="mb-2">
                        <label for="FirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="firstname"
                            value="<?php echo $first_name ?>">
                    </div>
                    <div class="mb-2">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="LastName" name="lastname" value="<?php echo $last_name ?>">
                    </div>
                    <div class="mb-2">
                        <label for="Email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="Email" name="email" value="<?php echo $email ?>">
                    </div>
                    <div class="mb-2">
                        <label for="Phonenumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="Phonenumber" name="phonenumber"
                            value="<?php echo $phone_number ?>">
                    </div>
                    <div class="submitcontent">
                        <input type="submit" class="btn btncs btn-primary" value="submit" name="update">
                    </div>
                    <div class="mb-2 mt-2 goback">
                        <a href="Users.php" class="button">Go Back</a>
                    </div>
                </form>
            </div>
            <?php
    }
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>