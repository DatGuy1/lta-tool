<?php
session_start();
$userrights = $_SESSION['acc'];
if( !isset($_SESSION['uid']) ){
   header( 'Location: http://tools.wmflabs.org/lta/login.php' ) ; 
}
if($userrights != 0){
    header( 'Location: http://tools.wmflabs.org/lta/' ) ; //not working
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
                <h2>Account management module</h2>
                <div class="panel panel-info">
                    <div class="panel-heading">Create account</div>
                    <div class="panel-body">
                        <p class='text-muted'>Have you done <a href='#'>these required checks</a> before creating the account?</p>
                        <hr/>
                        <form>
                            <input type='text' name='newusername' class='form-control' placeholder='Username' />
                            <br/>
                            <input type='email' name='newemail' class='form-control' placeholder='Email' />
                            <br/>
                            <button type="submit" class="btn btn-default" disabled>Create and email temporary password</button>
                        </form>
                    </div>
                </div>
                <div class="panel panel-warning">
                    <div class="panel-heading">Modify account</div>
                    <div class="panel-body">
                        <p class='text-muted'>Unavailable</p>
                    </div>
                </div>
                <div class="panel panel-danger">
                    <div class="panel-heading">Suspend account</div>
                    <div class="panel-body">
                        <form>
                            <input type='text' name='suspendusername' class='form-control' placeholder='Username to suspend' />
                            <br/>
                            <input type='text' name='confirmsuspendusername' class='form-control' placeholder='Confirm username to suspend' />
                            <br/>
                            <button type="submit" class="btn btn-default" disabled>Suspend account (no email)</button>
                        </form>
                    </div>
                </div>
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
