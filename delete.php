<?php
session_start();
$userrights = $_SESSION['acc'];
if( !isset($_SESSION['uid']) ){
   header( 'Location: http://tools.wmflabs.org/lta/login.php' ) ; 
}
if($userrights != '0'){
    header( 'Location: http://tools.wmflabs.org/lta/' ) ; //not working
}

include("../config.php");
/*
$approvedaccid = $_GET['reqid'];
$sql_update = "UPDATE accrequests SET status = '1' WHERE reqid = '$approvedaccid'";
mysqli_query($db,$sql_update);

$sql_insert = "INSERT INTO users (un, email, sul, pass) SELECT requn, reqemail, reqsul, reqpass FROM accrequests WHERE reqid = $approvedaccid";
mysqli_query($db,$sql_insert);

$sql_getinfo = "SELECT * from users ORDER BY uid DESC LIMIT 1";
$newinfo = mysqli_query($db,$sql_getinfo);
$row_info = mysqli_fetch_assoc($newinfo);
$uid = $row_info['uid'];


$datetime = date("Y-m-d h:i:s");
$sql_finish = "UPDATE users SET enabled = 1, acc = 2, creationdate = '$datetime' WHERE uid = '$uid'";
mysqli_query($db,$sql_finish);

Is a work in progress
*/

//now send an email
$to = $row_info['email'];
$username = $row_info['un'];
$subject = "LTA Knowledgebase LTA deleted";

$message = "
<html>
<head>
<title>LTA Knowledgebase LTA deleted</title>
</head>
<body>
<p>Dear $username</p>
<p>Your LTA on the Knowledgebase has been deleted.</p>
<br/>
<p>Please do not create any LTAs until you've seen the guide</p> //Add link to guide
<br/>
<br/>
<p>Kind regards,</p>
<p>LTA Knowledgebase Tool Admins</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to,$subject,$message,$headers);



header( 'Location: http://tools.wmflabs.org/lta/admin' ) ;
