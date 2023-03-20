<?php
include('config.php');
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $name=$_POST['name'];
    $location=$_POST['location'];
    if(!empty($name)&&!empty($location))
    {
        $query="INSERT INTO `zoo`(`Name`,`Location`) 
        VALUES ('$name','$location')";
        $excute=$conn->query($query);
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
                <h1 class="text-primary text-centered">
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
                             $query_return="SELECT * FROM `zoo`";
                             $result=$conn->query($query_return);
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
                                            <a class="btn btn-info" href="UpdateZoo.php?id=<?php echo $row['Id']; ?>">Edit
                                            
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
</body>
</html>