<?php
session_start();
include("connection.php");
if (!$_SESSION['id']) {
  header('location:../project/login.php');
}
$uid = $_SESSION['id'];
$name;
$mail;
$pno;
$qry = "select name,mail,phno from user_master where userid=$uid";
$rows = mysqli_query($con, $qry);
while ($res = mysqli_fetch_array($rows)) {
  $name = $res['name'];
  $mail = $res['mail'];
  $pno = $res['phno'];
}

?>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>

<body>
  <section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="../project/images/user_logo.png" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"><?php echo $name; ?></h5>
              <button type="submit"><a href="edit_profile.php">Edit Profile</a></button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $name; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $mail; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">+91 <?php echo $pno; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['addr']; ?></p>
              </div>
            </div>
          </div>
        </div>
  </section>
</body>

</html>