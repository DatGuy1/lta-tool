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

//now send an email
$to = $row_info['email'];
$username = $row_info['un'];
$subject = "LTA KB account approved";

$message = "
<html>
<head>
<title>LTA Knowledgebase account approved</title>
</head>
<body>
<p>Dear $username</p>
<p>Your account on the LTA Knowledgebase has been approved!</p>
<br/>
<p>You can now log in at <a href='http://tools.wmflabs.org/lta/'>http://tools.wmflabs.org/lta/</a></p>
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
