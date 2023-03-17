<?php
session_start();
session_unset();
header("Location:http://localhost:8090/Projects/index.php");
exit();
?>