<?php
$conn = mysqli_connect("localhost", "root", "", "zoo_db");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>