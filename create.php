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

$newtitle = $_POST['title'];
$newdesc = $_POST['description'];
$newtraits = $_POST['traits'];
$newactions = $_POST['actions'];

$datetime = date("Y-m-d h:i:s");
$editorname = $row_user['un'];
$sql_update = "INSERT INTO ltalist (ltitle, ldesc, lshortdesc, lglance, lactions, leditor, leditat) VALUES ('$newtitle','$newdesc', '<p>Requires short description entry - please edit</p>', '$newtraits','$newactions','$editor','$datetime')";
mysqli_query($db,$sql_update);
$sql_update_rc = "INSERT INTO ltarecentchanges (lta, user, ctype, ctime) VALUES ('$newtitle','$editorname','1','$datetime')";
mysqli_query($db,$sql_update_rc);
    
header('Location: http://tools.wmflabs.org/lta');

}


?>