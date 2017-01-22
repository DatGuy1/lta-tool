<?php
session_start();


include("../config.php");
$username = mysqli_real_escape_string($db,$_POST['username']);
$sul = mysqli_real_escape_string($db,$_POST['sul']);
$diff = mysqli_real_escape_string($db,$_POST['confirmdiff']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$pass = mysqli_real_escape_string($db,$_POST['password']);

//generate long salt
$salt = openssl_random_pseudo_bytes(20);
//prepend to password
$prepared = $salt.$pass;
//hash prepared
$hashpass = md5($prepared);




$sql_insert = "INSERT INTO accrequests (requn, reqsul, reqdiff, reqemail, reqpass, salt, status) VALUES ('$username', '$sul', '$diff', '$email', '$hashpass', '$salt', '0')";
mysqli_query($db,$sql_insert);

header('Location: http://tools.wmflabs.org/lta/request/index.php?e=1');