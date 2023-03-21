<?php
include('config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ((!empty($_POST['name'])) && (!empty($_POST['Gender'])) && (!empty($_POST['Zoo_name']))) {
        $name = $_POST['name'];
        $gender = $_POST['Gender'];
        $Zoo_id = $_POST['Zoo_name'];
        $sql = "INSERT INTO `Animals`(`Name`, `Gender`, `activity_status`) VALUES ('$name','$gender',1)";
        $result = $conn->query($sql);
        $id = $conn->query("SELECT MAX(Id) FROM Animals");
        $row = mysqli_fetch_row($id);
        $highest_id = $row[0];
        echo $highest_id;
        $insert_map = "INSERT INTO `Animal_Zoo`(`Zoo_Id`, `Animal_Id`) VALUES ('$Zoo_id','$highest_id')";
        $conn->query($insert_map);
    } else {
        if (!empty($_POST['Id'])) {
            $id = $_POST['Id'];
            $sql = "UPDATE `Animals` SET activity_status=0
            WHERE Id='$id'";
            $conn->query($sql);
        }
        if (isset($_POST['id'])) {

            $id = $_POST['id'];
            $sql = "SELECT a.*,a.Id as aid, a.Name as aname,z.*, z.Id as zid,z.Name as zname
            FROM Animals AS a
            JOIN Animal_Zoo as az
            ON a.Id=az.Animal_Id
            JOIN Zoo as z
            on z.Id=az.Zoo_Id
            WHERE a.Id=$id";
            $result = $conn->query($sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $Id = $row['aid'];
                    $animal_name = $row['aname'];
                    $gender = $row['Gender'];
                    $zoo_id = $row['zid'];
                    $zoo_name = $row['zname'];
                    echo $id . ",";
                    echo $animal_name . ",";
                    echo $gender . ",";
                    echo $zoo_id . ",";
                    echo $zoo_name;
                    die();
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
                <th>Gender</th>
                <th hidden>Zoo_id</th>
                <th>Zoo Name</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_return = "SELECT a.*,a.Id as aid, a.Name as aname,z.*, z.Id as zid,z.Name as zname
            FROM Animals AS a
            JOIN Animal_Zoo as az
            ON a.Id=az.Animal_Id
            JOIN Zoo as z
            on z.Id=az.Zoo_Id
            WHERE activity_status=1";
            $result = $conn->query($query_return);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['aid']; ?>
                        </td>
                        <td>
                            <?php echo $row['aname']; ?>
                        </td>
                        <td>
                            <?php echo $row['Gender']; ?>
                        </td>
                        <td hidden>
                            <?php echo $row['zid']; ?>
                        </td>
                        <td>
                            <?php echo $row['zname']; ?>
                        </td>
                        <td>
                            <?php echo $row['Location']; ?>
                        </td>
                        <td>
                            <button class="btn btn-primary" id="#<?php echo $row['aid']; ?>" onclick="updateRecord(id)"
                                data-bs-toggle="modal" data-bs-target="#AddAnimalModal">EDIT</button>
                            <button class="btn btn-danger" id="<?php echo $row['aid']; ?>"
                                onclick="deleteRecords(id)">Delete</button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
        <script>
        </script>

</body>

</html>