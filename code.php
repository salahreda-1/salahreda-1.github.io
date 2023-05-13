<?php

session_start();
require 'components/conn.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM student WHERE id = $user_id ";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>
