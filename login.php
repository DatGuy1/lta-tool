<?php
session_start();
if( isset($_SESSION['uid']) ){
   header( 'Location: http://tools.wmflabs.org/lta' ) ; 
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
        <link href="css/login.css" rel="stylesheet">

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

        <div class="container">
<!--
            <div class="panel panel-danger">
                <div class="panel-heading">Login disabled</div>
                <div class="panel-body">
                    <ul>
                        <li>Undergoing fixes</li>
                    </ul>
                </div>
            </div>
-->
            <div class="row" style="margin-top:20px">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form" action="login_process.php" method="POST">
                        <fieldset>
                            <h2>Please sign in</h2>
                            <div class='text-muted'>or <a href='request'>request an account</a></div>
                            <hr class="colorgraph">
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
                            </div>
                            <span class="button-checkbox">
					<!-- one day <a href="#" class="btn btn-link pull-right">Forgot Password?</a> -->
				</span>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
                                </div>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>

        </div>
        <!-- /.container -->

        <!-- jQuery Version 1.11.1 -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>