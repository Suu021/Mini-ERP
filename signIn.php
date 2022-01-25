<?php
session_start();
include('connection.php');

$login = mysqli_real_escape_string($connect, trim($_POST['usertxt']));
$password = mysqli_real_escape_string($connect, trim($_POST["passwtxt"]));

$query_select = "SELECT 'username', 'password' FROM users WHERE username = '$login' AND password = '$password'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
//$logarray = $array['username', 'password'];