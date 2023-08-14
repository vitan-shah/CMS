<!-- admin logIn page and login logic -->
<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>
    <h5><a href="../home.php" style="float: right; margin-right:50px; color:blue">BackToHome</a></h5><br>
    <h1 align='center' style="color: blue;font-size:60px">Admin Login</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="margin: auto;">
        <table align="center">
            <tr>
                <td>Email_ID:</td>
                <td><input type="email" name="uname" required></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="pass" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="adlogin" value="Login" style="cursor: pointer;"></td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php

include('dbcon.php');
if (isset($_POST['adlogin'])) {
    $adminemail = $_POST['uname'];
    $password = $_POST['pass'];
    $selqry = "select * from admin_login where admin_email='$adminemail' and password='$password'";
    $resultqry = mysqli_query($condb, $selqry);
    $num = mysqli_num_rows($resultqry);

    if ($num == 1) {
        $row = mysqli_fetch_array($resultqry);
        $_SESSION['aname'] = $row['admin_email'];
        $_SESSION['aid'] = $row['aid'];
        if ($adminemail == $row['admin_email'] && $password == $row['password']) {

            echo "<script> window.location.assign('dashboard.php');</script>";
        }
    } else {
?>
        <script>
            alert("Only admin can login..");
            window.open('admin_login.php', '_self');
        </script><?php
                }
            }
                    ?>