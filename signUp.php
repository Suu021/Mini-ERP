<?php
$login = $_POST["usernametxt"];
$password = MD5($_POST["passwtxt"]);
$password2 = MD5($_POST["passw2txt"]);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connect = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connect, 'mini-erp');
$query_select = "SELECT login FROM users WHERE login = '$login'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['login'];

if ($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>alert('The login field must be filled');window.location.href='signUp.html';</script>";
}else{
    if ($logarray == $login){
        echo"<script language='javascript' type='text/javascript'>alert('This username already exists');window.location.href='signUp.html';</script>";
    }else if ($password != $password2){
        echo"<script language='javascript' type='text/javascript'>alert('The password wasn't confirmed');window.location.href='signUP.html';</script>";
    } 
    else{
        $query = "INSERT INTO users (login, password) VALUES ('$login', '$password')";
        $insert = mysqli_query($connect, $query);

        if($insert){
            echo"<script language='javascript' type='text/javascript'>alert('Successfully registered user!');window.location.href='signUp.html';</script>";
        }else{
            echo"<script language='javascript' type='text/javascript'>alert('It was not possible to register this user.');window.location.href='signUp.html';</script>";
        }
    }
}
?>