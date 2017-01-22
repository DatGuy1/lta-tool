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

$sql_newaccounts = "SELECT * FROM users WHERE enabled = '1' ORDER BY uid DESC LIMIT 5";
$result_newaccounts = mysqli_query($db,$sql_newaccounts);

    
?>
    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LTA Knowledgebase | Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <style>
            body {
                padding-top: 70px;
                /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
            }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">LTA Knowledgebase Admin</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="accman.php">Account management</a>
                        </li>
                        <li>
                            <a href='requests.php'>Pending requests</a></li>
                        <li>
                            <a href="../index.php">Exit admin mode</a>
                        </li>
                        <li>
                            <a href='../logout.php'>Log out</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">
                <div class="panel panel-danger">
                    <div class="panel-heading">Important notices</div>
                    <div class="panel-body">
                        <ul>
                            <li>This tool is still in <strong>early alpha</strong> and is not fit for use</li>
                            <li>New requests should <strong>not be approved</strong> without discussion</li>
                        </ul>
                    </div>
                </div>
                <h2>Recently created accounts</h2>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <td><strong>Username</strong></td>
                            <td><strong>Created</strong></td>
                            <td><strong>Last login</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row_na = mysqli_fetch_assoc($result_newaccounts)){
                                if($row_na['last'] == ""){
                                    $lastlogin = "Not yet logged in";
                                }else{
                                    $lastlogin = htmlentities($row_na['last']);
                                }
                                echo "<tr>";
                                echo "<td>";
                                echo htmlentities($row_na['un']);
                                echo "</td>";
                                echo "<td>";
                                echo htmlentities($row_na['creationdate']);
                                echo "</td>";
                                echo "<td>";
                                echo $lastlogin;
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>

                </table>
                <h2>Recently suspended accounts</h2>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <td><strong>Username</strong></td>
                            <td><strong>Reason</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Placeholder</td>
                            <td>Placeholder</td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- jQuery Version 1.11.1 -->
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

    </body>

    </html>