<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>USER REGISTRATION PAGE</title>
        <?php  include 'style.php'?>
		<?php  include 'link.php'?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php 

include 'connection.php';

if(isset($_POST['create']))
{
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $cityid=mysqli_real_escape_string($con,$_POST['city']);
    $phno = mysqli_real_escape_string($con, $_POST['phno']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
    $cityname=$_SESSION['cityname'];
    $query="select 1 from user_master where mail='$email'"; 
    $result=mysqli_query($con,$query);
    $val;
    while($row=mysqli_fetch_array($result))
    {
        $val=$row['1'];
    }
    
    if($val!=1)
    {
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
    
        if($password === $cpassword)
        {
            $insertquery = "insert into user_master(name,address,cityid,phno,mail,password) values('$username','$address','$cityid','$phno','$email','$pass')";

            $iquery = mysqli_query($con, $insertquery);
            
            if($iquery)
            {
            ?>
                <script>
                    alert("Registration is done successfully..");
                    window.location.assign("home.php");
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
    
        else
        {
        ?>
        <script>
            alert ("Password is not matching");
        </script>
        <?php
        }
    }else{
        ?>
        <script>
            alert ("Email is already exist");
        </script>
        <?php
    }
}
?>
<div class="card bg-light">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="card-title mt-3 text-center">Create Account</h4>
				<p class="text-center">Get started with your free account</p>
				
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
						<button type="submit" name="create" class="btn btn-primary btn-block">Create Account</button></div>
						<p class="text-center">Have an account?<a href="login.php">Log In</a></p>
						</form>				
			</article>
		</div>
   </body>
    </html>