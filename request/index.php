<?php
session_start();

$e = $_GET['e'];
if($e == '1'){
    $result = "Account requested!";
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
                    <a class="navbar-brand" href="/lta">LTA Knowledgebase</a>
                </div>
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">
                <?php
                if($e == '1'){
                    echo "<div class='panel panel-success'>";
                    echo "<div class='panel-heading'>Account requested!</div>";
                    echo "<div class='panel-body'>";
                    echo "<p>Your account request has been added to the queue. This process could take up to three days - if you still haven't had a response in this time please join <a href='irc://irc.freenode.net/#wikimedia-lta'>#wikimedia-lta</a> and let us know</p>";
                    echo "</div>";
                    echo "</div>";
                }else{
                    
                }
                ?>
                <h2>Request an account</h2>
                <form action='postrequest.php' method='post'>
                    <div class="form-group">
                        <label for="username">Requested username</label>
                        <input type="text" class="form-control" name='username' id="username" placeholder="Enter requested username" required>
                    </div>
                    <div class="form-group">
                        <label for="sul">Wikipedia username</label>
                        <input type="text" class="form-control" name='sul' id="sul" placeholder="Enter your Wikipedia username" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmdiff">Account confirmation</label>
                        <input type="text" class="form-control" name='confirmdiff' id="confirmdiff" aria-describedby="confirmdiffhelp" placeholder="Please enter the diff. For example: 761081495" required>
                        <small id="confirmdiffhelp" class="form-text text-muted">To confirm ownership of the Wikipedia account, please make an edit to your talk page and paste the diff number</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name='email' id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name='password' placeholder="Password" required>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">Submit account request</button>
                </form>
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