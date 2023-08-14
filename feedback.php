<?php
session_start();
?>
<html>

<head>
    <?php
    include 'link.php';
    ?>
</head>

<body>
<?php 

include 'connection.php';

if(isset($_POST['fsend']))
{
    // $fname = mysqli_real_escape_string($con,$_POST['fname']);
    $fmsg = mysqli_real_escape_string($con,$_POST['fmsg']);
    $fdate = mysqli_real_escape_string($con,$_POST['fdate']);
    $fid = $_SESSION['id'];
    $fquery = "insert into feedback_master(feedback,created_by,created_date) values('$fmsg','$fid','$fdate')";

    $fresult = mysqli_query($con, $fquery);
    
    if($fresult)
    {
    ?>
        <script>
            alert("Thank you For Giving Feedback, we ensure you that this will be changes soon");
        </script>
        <?php 
    }
    else
    {
    ?>
    <script>
        alert("Some Error.. please Wait");
    </script>
            <?php
    }
}
?>
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
    <!-- Default form contact -->
    <form class="text-center border border-light p-5" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">

        <p class="h4 mb-4">Give Us Your Valuable Feedback</p>
        <!-- Subject -->
        <label>Subject</label>
        <select class="browser-default custom-select mb-4">
            <option value="" disabled>Choose option</option>
            <option value="1" selected>Feedback</option>
            <option value="2">Report a bug</option>
            <option value="3">Feature request</option>
            <option value="4">For Improvement</option>
        </select>

        <!-- Message -->
        <div class="form-group">
            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="fmsg" placeholder="Message"></textarea>
        </div>

        <!-- Copy -->
        <!-- <div class="custom-control custom-checkbox mb-4">
        <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
        <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
    </div> -->

        <div class="form-group">
           <input type="date" id="defaultContactFormDate" class="form-control mb-4" name="fdate">
        </div>
        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit" name="fsend">Send</button>

    </form>
    <!-- Default form contact -->
</body>

</html>