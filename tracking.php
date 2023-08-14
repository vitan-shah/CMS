<?php
session_start();
if(!$_SESSION['id'])
{
    header('location:../project/login.php');
}
?>

<html>
    <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylsheet">
        <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style type="text/css">
           @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
           body
           {background-color: #eeeeee;font-family: 'Open Sans',serif
        }
        .container{margin-top:50px;margin-bottom: 50px}
        .card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}
        .card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}
        .card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}
        .track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}
        .track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}
        .track .step.active:before{background: #FF5722}
        .track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}
        .track .step.active .icon{background: #ee5435;color: #fff}
        .track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}
        .track .step.active .text{font-weight: 400;color: #000}
        .track .text{display: block;margin-top: 7px}
        .itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}
        .itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}
        .img-sm{width: 80px;height: 80px;padding: 7px}
        ul.row, ul.row-sm{list-style: none;padding: 0}
        .itemside .info{padding-left: 15px;padding-right: 7px}
        .itemside .title{display: block;margin-bottom: 5px;color: #212529}
        p{margin-top: 0;margin-bottom: 1rem}
        .btn-warning{color: #ffffff;background-color: #ee5435;border-color: #ee5435;border-radius: 1px}
        .btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
        </style>
        
    </head>
    <body>
    <div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
                  <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Ordered Confirm Date:</strong> <br><?php echo $_SESSION['rdate']?> </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> DeliverFast, | <i class="fa fa-phone"></i> +261 2730350</div>
                    <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                    <div class="col"> <strong>Track your recieptid:</strong> <br><?php echo $_SESSION['recid']?>  </div>
                    <div class="col"> <strong>Estimated Delivery time:<br><?php
                    $start = time();
                    $end = strtotime('2022-06-30');
                    $timestamp = mt_rand($start, $end);
                    echo date('Y-m-d', $timestamp);?></strong> <br> </div>
                </div>
            </article>
            <hr>
            <a href="home.php" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to Home</a>
        </div>
    </article>
</div>
    </body>
</html>