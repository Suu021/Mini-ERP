<?php
session_start();
include("connection.php");

$bname = mysqli_real_escape_string($connect, trim($_POST["Bnametxt"]));
$username = mysqli_real_escape_string($connect, trim($_POST["usernametxt"]));
$password = mysqli_real_escape_string($connect, trim(MD5($_POST["passwtxt"])));
$password2 = mysqli_real_escape_string($connect, trim(MD5($_POST["passw2txt"])));

if ($password != $password2){
    $_SESSION['different_password'] = true;
    header("location: toSignUp.php");
    exit;
}

$query_select = "SELECT count(*) AS total FROM users WHERE username = '$username'";
$select = mysqli_query($connect, $query_select);
$row  = mysqli_fetch_assoc($select);

if ($row['total'] == 1){
    $_SESSION['user_exists'] = true;
    header("location: toSignUp.php");
    exit;
}

$query_select = "INSERT INTO users (username, business_name, password) VALUES ('$username', '$bname', '$password')";

if ($connect -> query($query_select) === true){
    $_SESSION['signup_status'] = true;
}

$connect -> close();

header('location: toSignUp.php');
exit;
/*$array = mysqli_fetch_array($select);
$logarray = $array['username'];

if ($password != $password2){
    echo"<script language='javascript' type='text/javascript'>alert('The password wasn't confirmed');window.location.href='signUP.html';</script>";
} 
else{
    $query = "INSERT INTO users (username, business_name, password) VALUES ('$username', '$bname', '$password')";
    $insert = mysqli_query($connect, $query);

    if($insert){
        echo"<script language='javascript' type='text/javascript'>alert('Successfully registered user!');window.location.href='signUp.html';</script>";
    }else{
        echo"<script language='javascript' type='text/javascript'>alert('It was not possible to register this user.');window.location.href='signUp.html';</script>";
    }*/
?>
  