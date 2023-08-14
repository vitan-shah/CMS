<?php

session_start();
include('connection.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Editing Page</title>
        <?php  include 'style.php'?>
		<?php  include 'link.php'?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php 

include 'connection.php';

if(isset($_POST['edituser']))
{
    $uid=$_SESSION['id'];
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $cityid=mysqli_real_escape_string($con,$_POST['city']);
    $phno = mysqli_real_escape_string($con, $_POST['phno']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
   
   
    
    
            $updatequery = "update user_master set name='$username',address='$address',cityid='$cityid',phno='$phno',mail='$email',password='$password' where userid=$uid";

            $iquery = mysqli_query($con, $updatequery);
            
            if($iquery==1)
            {
            ?>
                <script>
                    alert("Account Updated..");
                    window.location.assign("profile.php");
                </script>
                <?php 
            }
            else
            {
            ?>
            <script>
                alert("Error..Please Try Again");
            </script>
                    <?php
            }
        }
    
        



?>
<div class="card bg-light">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="card-title mt-3 text-center">Edit Your Account</h4>
				
				
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">

                    <!--form-group//Username-->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-user"></i></span>
						</div>
						<input  name="username" class="form-control" placeholder="Name" type="text" required>
					</div>
                    
                    <div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-address-book"></i></span>
						</div>
						<input type="text" name="address" class="form-control" placeholder="Write Down Your Address.." required>
					</div>

                    <div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-list"></i></span>
						</div>
                        <?php 
                        $sql="select * from city_master";
                        $cityResult=mysqli_query($con,$sql);
                        ?>
						<select name="city" class="form-control">
                        <option value="">Select City..</option>
                        <?php
                        while ($row = mysqli_fetch_array($cityResult)) {
                            echo "<option value='" . $row['cityid'] ."'>" . $row['cityname'] ."</option>";
                        }
                        ?>
                        </select>
					</div>

                    <!--form-group//Phonenumber-->
                    <div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
						</div>
						<input type="number" name="phno" class="form-control" placeholder="Phone number" required>
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fa fa-envelope"></i>
							</span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="Email address" required>
					</div>
					
                    <!--form-group//-->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="Create Password" value="" required>
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
						</div>
						<input type="password" name="cpassword" class="form-control" placeholder="Confirm password" required>
					</div>
                    <div class="form-group">
                    <div class="form-check form-check-inline">
							
                    <input type="radio" name="individualflag" class="form-check-input"  id="i_self" checked><label class="form-check-label" for="i_self">Self</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input type="radio" name="individualflag" class="form-check-input" id="i_org"><label class="form-check-label" for="i_org">Organization</label>
                    </div>
                    </div>
					<div class="form-group">
						<button type="submit" name="edituser" class="btn btn-primary btn-block">Edit Profile</button></div>
						
						</form>				
			</article>
		</div>
   
</body>
    </html>