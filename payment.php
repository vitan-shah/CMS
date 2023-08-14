<?php
session_start();
if (!$_SESSION['id']) {
    header('location:../project/login.php');
}
?>
<html>

<head>
    <?php
    include 'link.php';
    include 'connection.php';
    ?>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: white;

            padding: 30px 10px;
        }

        .card {
            max-width: 500px;
            margin: auto;
            color: black;
            border-radius: 20 px;
        }

        p {
            margin: 0px;
        }

        .container .h8 {
            font-size: 30px;
            font-weight: 800;
            text-align: center;
        }

        .btn.btn-primary {
            width: 100%;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            /* background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%); */
            border: none;
            transition: 0.5s;
            background-size: 200% auto;

        }


        .btn.btn.btn-primary:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
        }



        .btn.btn-primary:hover .fas.fa-arrow-right {
            transform: translate(15px);
            transition: transform 0.2s ease-in;
        }

        .form-control {
            color: white;
            /* background-color: #223C60; */
            border: 2px solid transparent;
            height: 60px;
            padding-left: 20px;
            vertical-align: middle;
        }

        .form-control:focus {
            color: white;
            /* background-color: #0C4160; */
            border: 2px solid #2d4dda;
            box-shadow: none;
        }

        .text {
            font-size: 22px;
            font-weight: 600;
        }

        .pay {
            display: flex !important;
            justify-content: center !important;
        }

        ::placeholder {
            font-size: 14px;
            font-weight: 600;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-blue" style="background-color: blue;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DeliverFast.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>
    <!-- <form action="" method="POST">

       
    </form> -->
    <?php

    // include('./Razorpay/Razorpay/razorpay-php/razorpay-php/Razorpay.php');
    include('../Razorpay/Razorpay/razorpay-php/razorpay-php/Razorpay.php');

    use Razorpay\Api\Api;

    $key_id = "rzp_test_RQzjnMA3oenHVW";
    $secret = "uVr0pd8HQL5E4uQgaN0jQcUG";



    // Creating order
    $api = new Api($key_id, $secret);
    $order = $api->order->create(array('receipt' => $_SESSION['recid'], 'amount' => $_SESSION['ramt']*100, 'currency' => 'INR'));
    $precid = $_SESSION['recid'];
    $pamt = $_SESSION['ramt'];
    
    ?>

    <div class="container p-0" style="text-align: center;">
        <div class="d-flex justify-content-center">

            <div class="card mb-4">
                <div class="card-header" style="background-color: blue;">
                    <p class="h8 py-3">Payment Details</p>
                </div>
                <div class="row gx-3">
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Your RecieptID:</p>
                            <?php
                            echo "$precid";
                            ?>
                            <!-- <input class="form-control mb-3" type="text"> -->
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Total Amount:</p>
                            <?php
                            echo "$pamt";
                            ?>
                            <!-- <input class="form-control mb-3" type="text"> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Expiry</p>
                        <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">CVV/CVC</p>
                        <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                    </div>
                </div> -->
                <div class="row gx-3">
                    <div class="col-12">
                        <div class="pay">
                            <!-- <span class="ps-3">Pay $243</span>
                        <span class="fas fa-arrow-right"></span> -->
                            <!-- <button class="btn btn-success" type=" submit" name="payment" style="background-color:blue;">Proceed To Pay</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="" method="POST">        
            <script src="https://checkout.razorpay.com/v1/checkout.js" 
            data-key="<?php echo $key_id; ?>" 
            data-amount="<?php echo intval($pamt)*100; ?>" 
            data-currency="INR" 
            data-order_id="<?php echo $order->id ?>"
            data-buttontext="Proceed to Pay" data-name="Order Payment"
            data-description="Payment of  booking order" 
            data-image="https://example.com/your_logo.jpg" 
            data-prefill.name="" data-prefill.email="" 
            data-theme.color="#F37254">
            </script>
        <input type="hidden" custom="Hidden Element" name="hidden" id="hidden">
    </form>
    </div>
    <!-- 'Pay with Razorpay' button -->
    


    <!-- After successful payment -->
    <?php
    if (isset($_POST['hidden'])) {
        // echo "<script>alert('Payment successful!! Payment id is : " . $_POST['razorpay_payment_id'] . "');</script>";
        $pdate = date("Y-m-d");
        $sql = "insert into payment_master(payment_amount,create_date,recieptid) values('$pamt','$pdate','$precid')";
        $presult = mysqli_query($con, $sql);

        if ($presult) {
            unset($_SESSION['precid']);
            unset($_SESSION['pamt']);
    ?>
            <script>
                alert("payment is done successfully..");
                window.location.assign("home.php");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Payment is Not done Plaese Try Again");
            </script>
    <?php
        }
    }
    ?>
</body>

</html>