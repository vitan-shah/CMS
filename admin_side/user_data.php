<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage User Data</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="topnav">

<a href="#">DeliverFast.com</a>


<div class="me-auto">
    <form action="admin_login.php" style="text-align: right;">
        <button class="btn btn-outline-success" type="submit">LogOut</button>
    </form>

</div>
</div>
<div class="container">
        <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>User <b>Data</b></h2>
                    </div>
                </div>
        
        <div class="col-md-8">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">City ID</th>
                  <th scope="col">City Name</th>
                  <th scope="col">Phone No.</th>
                  <th scope="col">E-Mail</th>
                  </tr>
              </thead>
              <tbody>
                <?php

                include 'dbcon.php';

                $query="select userid,name,address,u.cityid,cityname,phno,mail from city_master c,user_master u where u.cityid=c.cityid"; 

                $result=mysqli_query($condb,$query);

                ?>

                <?php if ($result->num_rows > 0): ?>

                <?php while($array=mysqli_fetch_row($result)): ?>

                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[4];?></td>
                    <td><?php echo $array[5];?></td>
                    <td><?php echo $array[6];?></td>
                    <td> 
                      
                      <a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0];?>">Delete</a>
                </tr>

                <?php endwhile; ?>

                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
                <?php endif; ?>

                <?php mysqli_free_result($result); ?>

              </tbody>
            </table>
        </div>
    </div>        
</div>

<!-- boostrap model -->
    <div class="modal fade" id="ajax-modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="UserModal"></h4>
          </div>
         
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
<script type="text/javascript">
 

    $('body').on('click', '.delete', function () {

       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "deleteuser.php",
            data: { id: id },
            dataType: 'json',
            success: function(res){

              
              window.location.reload();
           }
        });
       }

    });

    </script>
<div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="dashboard.php" class="nav-link px-2 text-muted">Back To Dashboard</a></li>
                <li class="nav-item"><a href="#services" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#testimonial" class="nav-link px-2 text-muted">Testimonial</a></li>
                <li class="nav-item"><a href="#about-us" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 DeliverFast, Inc</p>
        </footer>
    </div>
</body>
</html>