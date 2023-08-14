<?php
session_start();
include('../admin_side/dbcon.php');
if (!$_SESSION['aid']) {
    header('location:../admin_side/admin_login.php');
  }
?>
<html>

<head>
    <title>

    </title>

    <style>
        .row h1 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 10px;
        }

        nav {
            display: block;
            text-align: center;
        }

        nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .nav a {
            display: block;
            background: #111;
            color: #fff;
            text-decoration: none;
            padding: .8em 1.8em;
            text-transform: uppercase;
            font-size: 80%;
            letter-spacing: 2px;
            text-shadow: 0 -1px 0 #000;
            position: relative;
        }

        .nav {
            vertical-align: top;
            display: inline-block;
            box-shadow: 1px -1px -1px 1px #000, -1px 1px -1px 1px #fff, 0 0 6px 3px #fff;
            border-radius: 6px;
        }

        .nav li {
            position: relative;
        }

        .nav>li {
            float: left;
            border-bottom: 4px #aaa solid;
            margin-right: 1px;
        }

        .nav>li>a {
            margin-bottom: 1px;
            box-shadow: inset 0 2em .33em -.5em #555;
        }

        .nav>li:hover,
        .nav>li:hover>a {
            border-bottom-color: orange;
        }

        .nav li:hover>a {
            color: orange;
        }

        .nav>li:first-child {
            border-radius: 4px 0 0 4px;
        }

        .nav>li:first-child>a {
            border-radius: 4px 0 0 0;
        }

        .nav>li:last-child {
            border-radius: 0 0 4px 0;
            margin-right: 0;
        }

        .nav>li:last-child>a {
            border-radius: 0 4px 0 0;
        }

        .nav li li a {
            margin-top: 1px
        }



        .nav li a:first-child:nth-last-child(2):before {
            content: "";
            position: absolute;
            height: 0;
            width: 0;
            border: 5px solid transparent;
            top: 50%;
            right: 5px;
        }





        /* submenu positioning*/
        .nav ul {
            position: absolute;
            white-space: nowrap;
            border-bottom: 5px solid orange;
            z-index: 1;
            left: -99999em;
        }

        .nav>li:hover>ul {
            left: auto;
            padding-top: 5px;
            min-width: 100%;
        }

        .nav>li li ul {
            border-left: 1px solid #fff;
        }


        .nav>li li:hover>ul {
            /* margin-left: 1px */
            left: 100%;
            top: -1px;
        }

        /* arrow hover styling */
        .nav>li>a:first-child:nth-last-child(2):before {
            border-top-color: #aaa;
        }

        .nav>li:hover>a:first-child:nth-last-child(2):before {
            border: 5px solid transparent;
            border-bottom-color: orange;
            margin-top: -5px
        }

        .nav li li>a:first-child:nth-last-child(2):before {
            border-left-color: #aaa;
            margin-top: -5px
        }

        .nav li li:hover>a:first-child:nth-last-child(2):before {
            border: 5px solid transparent;
            border-right-color: orange;
            right: 10px;
        }
    </style>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>


    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">DeliverFast.com</a>

            </div>
            <div class="me-auto">
                <form action="admin_login.php" style="text-align: right;">
                    <button class="btn btn-outline-success" type="submit">LogOut</button>
                </form>

            </div>
        </nav>
    </div><!-- /#wrapper -->





    <div class="row" id="main">
        <div class="col-sm-12 col-md-12 well" id="content">
            <h1>Welcome Admin!</h1>
        </div>
    </div>
    <nav>
        <ul class="nav">
            <li><a href="#">About</a></li>
            <li><a href="user_data.php">Manage User Data</a>
          </li>
            <li><a href="city_data.php">Manage City</a>
                
            </li>
           
            <li><a href="product_category.php">Manage Product Category</a>
                
            </li>
            <li><a href="pricetb.php">Manage Price </a>
                
            </li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    
</body>

</html>