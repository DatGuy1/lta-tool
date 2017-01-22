<?php
session_start();
$userrights = $_SESSION['acc'];

if( !isset($_SESSION['uid']) ){
   header( 'Location: http://tools.wmflabs.org/lta/login.php' ) ; 
}
if($userrights != '0'){
    header( 'Location: http://tools.wmflabs.org/lta/' ) ; //not working
}

include("config.php");

$ltaid = mysqli_real_escape_string($db,$_GET["lid"]);

$sqlinfo = "SELECT * FROM ltalist WHERE lid = '$ltaid'";
$result = mysqli_query($db,$sqlinfo);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

// Information for what to delete
$ltitle = $row['ltitle'];
$ldesc = $row['ldesc'];
$lshortdesc = $row['lshortdesc'];
$lglance = $row['lglance'];
$lactions = $row['lactions'];
$leditor = $row['leditor'];
$leditat = $row['leditat'];
$lcreator = $row['lcreator'];

// Now actually delete it
$sql_delete = "DELETE FROM ltalist WHERE lid = '$ltaid'";
mysqli_query($db,$sql_delete);

$sqluser = "SELECT * FROM user WHERE uid = '$lcreator'";
$userresult = mysqli_query($db,$sqluser);
$userrow = mysqli_fetch_array($userresult,MYSQLI_ASSOC);

// Send an email
$to = $userrow['email'];
$username = $userrow['un'];
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
<p>Please do not create any LTAs until you've seen the guide</p>
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



header( 'Location: http://tools.wmflabs.org/lta' ) ;
