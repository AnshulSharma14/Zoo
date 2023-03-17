<?php
include('config.php');
include('Header.php');
$sql = "select * from Users";
$result = $conn->query($sql);
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
    <div class="container UserTable mt-5">
        <div class="row">
            <div class="center">
                <h1 class="text-primary text-centered">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['Id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['First_Name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Last_Name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Phone_Number']; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="UpdateUsers.php?id=<?php echo $row['Id']; ?>">Edit
                                            <button onclick="deleteDataUsers(this.id)" <?php echo "id=$row['Id']; ?> class="btn me-2 rounded-pill btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
            </div>
        </div>
    </div>
</body>

</html>