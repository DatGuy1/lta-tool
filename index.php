<?php
session_start();

if( !isset($_SESSION['uid']) ){
   header( 'Location: http://tools.wmflabs.org/lta/login.php' ) ; 
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
                <form action='view.php' method='post'>
                    <div class="search-group">
                        <label for="lt">Search LTA</label>
                        <input type="text" class="form-control" id="lt" name='lt' aria-describedby="searchhelp" placeholder="Orangemoody">
                        <small id="searchhelp" class="form-text text-muted">Search currently only matches exact LTA titles (in development)</small>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">Search &raquo;</button> 
                </form>
                <h2>Recently created LTAs</h2>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <td width='200px'><strong>LTA Report</strong></td>
                            <td><strong>Description</strong></td>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                            include("config.php");
                            $sql = "SELECT * FROM ltalist ORDER BY lid DESC LIMIT 5";
                            $result = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>";
                                echo "<a href='http://tools.wmflabs.org/lta/view.php?lid=".$row['lid']."'>";
                                echo htmlentities($row['ltitle']);
                                echo "</a>";
                                echo "</td>";
                                echo "<td>";
                                echo htmlentities($row['lshortdesc']);
                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>


                    </tbody>

                </table>
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
