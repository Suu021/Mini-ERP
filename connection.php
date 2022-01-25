<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "mini-erp");

$connect = mysqli_connect(HOST, USER, PASSWORD, DB) or die ("could not connect");
?>