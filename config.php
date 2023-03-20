<?php
$conn = mysqli_connect("localhost", "root", "Welcome@123", "Zoo_db");

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>