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
$denyaccid = $_GET['reqid'];

$sql_update = "UPDATE accrequests SET status = '2' WHERE reqid = '$denyaccid'";
mysqli_query($db,$sql_update);

header( 'Location: http://tools.wmflabs.org/lta/admin/requests.php' ) ;