<?php
session_start();
if( !isset($_SESSION['uid']) ){
   header( 'Location: http://tools.wmflabs.org/lta/login.php' ) ; 
}

//import database connection information
include("config.php");

//import version information
include("version.php");
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
                <h2>About this tool</h2>
                <h3>What is it?</h3>
                <p>This tool hopes to be a better alternative to the Wikipedia LTA pages, which are often cited as an example of <a href='https://en.wikipedia.org/wiki/Wikipedia:Don%27t_stuff_beans_up_your_nose'>[[WP:BEANS]]</a> and detract from the premise of <a href='https://en.wikipedia.org/wiki/Wikipedia:Deny_recognition'>[[WP:DENY]]</a>. By taking this information off-wiki, we can control access to the data whilst being able to keep useful information about long-term abuse cases.</p>
                <h3>Personal information</h3>
                <p>Please treat all information stored on this tool as publicly accessible - although efforts have been taken to ensure the security of data stored here, we can't be held responsible for it falling into the wrong hands. Do not store sensitive information on this tool.</p>
                <h2>Tech stuff</h2>
                <h3>Source</h3>
                <p><a href='https://github.com/lta-knowledgebase/lta-tool'>Available here</a></p>
                <h3>Licence</h3>
                <p><a href='https://raw.githubusercontent.com/lta-knowledgebase/lta-tool/master/LICENSE'>GPL-3.0</a></p>
                <h3>Support</h3>
                <p>Please report bugs to the <a href='https://phabricator.wikimedia.org/tag/tool-labs-tools-lta-knowledgebase/'>phabricator project</a>.</p>
                <h3>Version information</h3>
                <p>Software version: <?php echo $ver_version; ?></p>
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