<?php
include('config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //for creating new zoo
    if (!empty($_POST['name']) && !empty($_POST['location']) && empty($_POST['id'])) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $query = "INSERT INTO `Zoo`(`Name`,`Location`) 
        VALUES ('$name','$location')";
        $excute = $conn->query($query);
    }
    //for updating zoo details
    else if (!empty($_POST['name']) && !empty($_POST['location']) && !empty($_POST['id'])) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $id = $_POST['id'];
        $sql = "UPDATE Zoo SET
                Name='$name',Location='$location'
                WHERE Id='$id'";
        $query = $conn->query($sql);
    } //for deleting and fetxhing user details 
    else {
        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $query_del = "DELETE FROM `Zoo` WHERE Id='$id'";
            $del = $conn->query($query_del);
        }

        if (isset($_POST['Id'])) {
            $userId = $_POST['Id'];
            $sql = "SELECT * FROM Zoo WHERE Id='$userId'";
            $query = $conn->query($sql);
            $total = mysqli_num_rows($query);
            if ($total > 0) {
                while ($rows = $query->fetch_assoc()) {
                    $name = $rows['Name'];
                    $location = $rows['Location'];
                    $id = $rows['Id'];
                    echo $name . ",";
                    echo $location . ",";
                    echo $id;
                    die;
                }
            }

        }
    }

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

    <table class="table table-striped table-bordered">
        <thead>
            <tr class="table-primary">
                <th>Id</th>
                <th>Name</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_return = "SELECT * FROM `Zoo`";
            $result = $conn->query($query_return);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['Id']; ?>
                        </td>
                        <td>
                            <?php echo $row['Name']; ?>
                        </td>
                        <td>
                            <?php echo $row['Location']; ?>
                        </td>
                        <td>
                            <button class="btn btn-primary" id="#<?php echo $row['Id']; ?>" onclick="updateRecord(id)"
                                data-bs-toggle="modal" data-bs-target="#AddZooModal">EDIT</button>
                            <button class="btn btn-danger" id="<?php echo $row['Id']; ?>"
                                onclick="deleteRecords(id)">Delete</button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
        <script>
            // function deleteRecords() {
            //     var data = 1;
            //     console(data);
            //     xhr.open('POST', 'AddZoo.php');
            //     xhr.onreadystatechange = function () {
            //         if (this.readyState == 4 && this.status == 200) {
            //             document.getElementById("data").innerHTML = this.responseText;
            //         }
            //     };
            //     xhr.send(data);
            // }
        </script>

</body>

</html>