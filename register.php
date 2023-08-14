<?php
session_start();
if(!$_SESSION['id'])
{
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
    .title-style {
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-weight: 700;
      font-size: 20px;
      color: hsl(52, 0%, 98%);
    }

    .title-quote {
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-weight: 400;
      color: hsl(52, 0%, 98%);
    }
  </style>
</head>

<body>
  <?php
        if(isset($_POST['porder']))
        {
          $rid = $_SESSION['id'];
          $cityid=$_SESSION['cid'];
          $rcid=mysqli_real_escape_string($con,$_POST['city']);
          $rdate=date("Y-m-d");
          $ramt=mysqli_real_escape_string($con,$_POST['rmt']);
          $recid=mt_rand(5000001,9999999);
          $name = mysqli_real_escape_string($con,$_POST['rname']);
          $addr = mysqli_real_escape_string($con,$_POST['raddr']);
          $cno=mysqli_real_escape_string($con,$_POST['cno']);
          $nqty=mysqli_real_escape_string($con,$_POST['rqty']);

          $inqry="insert into request_master(created_by,from_cityid,to_cityid,created_date,amount,recieptid,name,address,contactno,weight) values('$rid','$cityid','$rcid','$rdate','$ramt','$recid','$name','$addr','$cno','$nqty')";
          $inresult = mysqli_query($con, $inqry);
          // echo $inresult;
            if($inresult)
            {
              $_SESSION['recid']=$recid;
              $_SESSION['ramt']=$ramt;
              $_SESSION['rdate']=$rdate;
            ?>
                <script>
                  alert("Your order has been placed now make payment");
                    window.location.assign("payment.php");
                </script>
                <?php 
            }
            else
            {
            ?>
            <script>
                alert("Error..We Can't Get Your Request Please Try Again");
            </script>
                    <?php
            }
        }
  ?>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <div class="card my-4 shadow-3">
          <div class="row g-0">

            <div class="mask" style="background-color: blue">
              <div class=" justify-content-center align-items-center h-100">
                <div class=" text-center" style="margin-top: 20px;">
                  <i class="fas fa-truck text-white fa-3x"></i>
                  <p class="text-white title-style">Deliver Fast</p>
                  <p class="text-white mb-0"></p>

                  <figure class="text-center mb-0">
                    <blockquote class="blockquote text-white">
                      <p class="pb-3">
                        <i class="fas fa-quote-left fa-xs text-primary" style="color:hsl(0,0,0) ;"></i>
                        <span class="lead font-italic">Everything From Your Door to Door.</span>
                        <i class="fas fa-quote-right fa-xs text-primary" style="color:hsl(0,0,0) ;"></i>
                      </p>
                    </blockquote>

                  </figure>
                </div>
              </div>
            </div>
            <div class="col-xl-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-4 text-uppercase">Delivery Info</h3>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1m" name="rname" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1m">Name</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example8" name="raddr" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example8">Address</label>
                  </div>
                  <div class="col-md-6 mb-4">


                    <?php
                    $sql = "select * from city_master";
                    $cityResult = mysqli_query($con, $sql);
                    ?>
                    <select name="city" class="form-outline">
                      <option value="">Select Recieve City..</option>
                      <?php
                      while ($row = mysqli_fetch_array($cityResult)) {
                        echo "<option value='" . $row['cityid'] . "'>" . $row['cityname'] . "</option>";
                      }
                      ?>
                    </select>

                  </div>
                </div>



                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1m" name="cno" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1m">Contact No.:</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <?php
                    $city=$_SESSION['cid'];
                    $sql_did = "select * from delivery_partner_master where cityid=$city";
                    $dResult = mysqli_query($con, $sql_did);
                    ?>
                    <select name="dpartner" class="form-outline">
                      <option value="">Select Delivery Partner Type</option>
                      <?php
                      while ($row = mysqli_fetch_array($dResult)) {
                        echo "<option value='" . $row['did'] . "'>" . $row['name'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-6 mb-4">
                    <?php
                    $sql = "select * from product_master";
                    $pResult = mysqli_query($con, $sql);
                    ?>
                    <select name="product" class="form-outline" id="categoryid">
                      <option value="">Select Product Type</option>
                      <?php
                      while ($row = mysqli_fetch_array($pResult)) {
                        echo "<option value='" . $row['pid'] . "'>" . $row['product_type'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-outline">
                  <div class="form-check form-check-inline">
                    <input type="radio" name="priceflag" value="N" class="form-check-input" id="i_self" checked><label class="form-check-label" for="i_self">Normal</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" name="priceflag" value="E" class="form-check-input" id="i_org"><label class="form-check-label" for="i_org">Express</label>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="qty" name="rqty" class="form-control form-control-lg"/>
                      <label class="form-label" for="form3Example2">Weight(in Kg.)</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="amt" name="rmt" class="form-control form-control-lg" readonly />
                      <label class="form-label" for="form3Example2">Amount</label>
                    </div>
                  </div>
                </div>
                <!-- <div class="form-outline">
           <input type="date" id="defaultContactFormDate" class="form-control mb-4" name="rdate">
        </div> -->
                <div class="d-flex justify-content-end pt-3">
                  <button type="submit" name="porder" class="btn btn-success btn-lg ms-2" style="background-color:hsl(210, 100%, 50%) ">Place order</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      
      $("#amt").val(0);

      $("#qty").change(function(){
        var qty = $("#qty").val();
        var cid = $("#categoryid").val();
        var selectedDelivery = $('input[name="priceflag"]:checked').val();
        $.post('calc.php', { quantity: qty, category: cid, del: selectedDelivery }, function(data){
          $("#amt").val(JSON.parse(data).price)
      });
    });
  });
    function calc_price() {
      // let qty = document.getElementById("qty").value;
      // let cid = document.getElementById("categoryid").value;
      // let delivery = document.getElementsByName("priceflag");
      // let selectedDelivery = Array.from(delivery).find(radio => radio.checked);
      // $.ajax({
      //   url: "localhost/project/calc.php", //the page containing php script
      //   type: "POST", //request type,
      //   dataType: 'json',
      //   data: {
      //     quantity: qty,
      //     category: cid,
      //     del: selectedDelivery
      //   },
      //   success: function(result) {
      //     console.log(result.abc);
      //   }
      // });
    }
  </script>
  <?php

  include 'connection.php';
  if (isset($_POST['order'])) {
    echo "<script> window.location.assign('payment.php'); </script>";
  }
  ?>
</form>
</body>

</html>