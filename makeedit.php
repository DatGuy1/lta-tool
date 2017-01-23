<?php
include("config.php");
session_start();
if( !isset($_SESSION['uid']) ){
   header( 'Location: http://tools.wmflabs.org/lta/login.php' ) ; 
}
if($_SESSION['acc'] == 2){
    header('Location: http://tools.wmflabs.org/lta/error.php?e=editperm');
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
// username and password sent from form 

$editor = $_SESSION['uid'];

$sql_user = "SELECT * FROM users WHERE uid = '$editor'";
$result_user = mysqli_query($db,$sql_user);
$row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);

$editorname = $row['un'];

$newshortdesc = mysqli_real_escape_string($db,$_POST['shortdesc']);
$newdesc = mysqli_real_escape_string($db,$_POST['description']);
$newtraits = mysqli_real_escape_string($db,$_POST['traits']);
$newactions = mysqli_real_escape_string($db,$_POST['actions']);
$ltaid = mysqli_real_escape_string($db,$_POST['ltaid']);
$ltatitle = mysqli_real_escape_string($db,$_POST['ltatitle']);


$sql = "SELECT * FROM ltalist WHERE lid = '$ltaid'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count == 1) {
$datetime = date("Y-m-d h:i:s");
$editorname = $row_user['un'];
$sql_update = "UPDATE ltalist SET ldesc = '$newdesc', lshortdesc = '$newshortdesc', lglance = '$newtraits', lactions ='$newactions', leditor ='$editor', leditat ='$datetime' WHERE lid = '$ltaid'";
mysqli_query($db,$sql_update);
$sql_update_rc = "INSERT INTO ltarecentchanges (lta, user, ctype, ctime) VALUES ('$ltatitle','$editorname','0','$datetime')";
mysqli_query($db,$sql_update_rc);
    
header('Location: http://tools.wmflabs.org/lta/view.php?lid='.$ltaid);

}else{
$error = "Failed to save";
header( 'Location: http://tools.wmflabs.org/lta/error.php' );
}
}


?>