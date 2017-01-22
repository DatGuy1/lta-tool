<?php
session_start();
if( !isset($_SESSION['uid']) ){
   header( 'Location: http://tools.wmflabs.org/lta/login.php' ) ; 
}
$userid = $_SESSION['uid'];

//import database connection information
include("config.php");

//connect to DB, retrieve useful information about currently logged in user
$sql = "SELECT * FROM users WHERE uid = '$userid'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$acc_username = $row['un'];
$acc_sul = $row['sul'];
$acc_acc = $row['acc'];

if($acc_acc == 0){
    //Set error text for later localisation
    $acc_userright = "Tool admin";
}elseif($acc_acc == 1){
    //Set error text for later localisation
    $acc_userright = "Write access";
}elseif($acc_acc == 2){
    //Set error text for later localisation
    $acc_userright = "Read access";
}else{
    //Set error text for later localisation
    $acc_userright_error = "Bad user right number (not 0, 1, or 2)";
}

//get error information
$error = $_GET['e'];
if($error == 1){
    //Set error text for later localisation
    $errormessage = "Incorrect password or new passwords do not match";
}elseif($error == 2){
    //Set error text for later localisation
    $errormessage = "Password changed";
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LTA Knowledgebase</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

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
                    <a class="navbar-brand" href="/lta">LTA Knowledgebase</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        if($_SESSION['acc'] < 2){
                            echo "<li>";
                            echo "<a href='new.php'>New</a>";
                            echo "</li>";
                        }
                        ?>
                        <li>
                            <a href="recent.php">Recent changes</a>
                        </li>
                        <li>
                            <a href="account.php">Account</a>
                        </li>
                        <li>
                            <a href="about.php">About</a>
                        </li>
                        <li>
                            <a href='logout.php'>Log out</a>
                        </li>
                    </ul>
                    <form action='view.php' method='get'>
                        <input type='text' id='lid' name='lid' placeholder='Jump to LTA ID' />
                        <input type='submit' />
                    </form>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">
                <h3>Account information</h3>
                <table class='table'>
                    <tr>
                        <td>Tool username:</td>
                        <td>
                            <?php echo $acc_username;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Wikipedia username:</td>
                        <td>
                            <?php echo $acc_sul;?>
                        </td>
                    </tr>
                    <tr>
                        <tr>
                            <td>Access:</td>
                            <td>
                                <?php echo $acc_userright;?>
                            </td>
                        </tr>
                </table>
                <div class="panel panel-warning">
                    <div class="panel-heading">Change password</div>
                    <div class="panel-body">
                        <?php
                        //change message based on returned error in GET
                        if($error == 1){
                            echo "<h4>$errormessage</h4>";
                            echo "<a href='account.php'>Try again</a>";
                        }elseif($error == 2){
                            echo "<h4>$errormessage</h4>";
                            echo "<a href='logout.php'>Log out and back in to complete</a>";
                        }else{
                            echo "<div style='text-align: center;'>";
                            echo "<form action='changepass.php' method='post'>";
                            echo "Current password:";
                            echo "<input class='form-control' type='password' id='oldpass' name='oldpass' />";
                            echo "<br/> New Password:";
                            echo "<input class='form-control' type='password' id='newpass' name='newpass' />";
                            echo "<br/> Confirm new password:";
                            echo "<input class='form-control' type='password' id='newpassconfirm' name='newpassconfirm' />";
                            echo "<br/>";
                            echo "<button type='submit' class='btn btn-primary'>Submit</button>";
                            echo "</form>";
                            echo "</div>";
                        }
                        ?>

                    </div>
                </div>
                <div style='text-align: center;'>
                    <?php
                if($acc_acc == 0){
                    echo "<a href='/lta/admin'>";
                    echo "<button type='button' class='btn btn-info'>Admin mode</button>";
                    echo "</a>";
                }
                ?>
                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- jQuery Version 1.11.1 -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>
