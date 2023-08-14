<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Product Data</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
                        <h2>Manage Price<b>Data</b></h2>
                    </div>
                </div>
                <div class="col-md-8 mt-1 mb-2"><button type="button" id="create" class="btn btn-success">Add</button></div>
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">From City</th>
                                <th scope="col">To City</th>
                                <th scope="col">Normal Price</th>
                                <th scope="col">Express Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include 'dbcon.php';

                            $query = "SELECT prid,(select cityname from city_master where cityid=from_cityid) as from_city, (select cityname from city_master where cityid=to_cityid) as to_city,normal_price, express_price FROM `price_master`;";

                            $result = mysqli_query($condb, $query);

                            ?>

                            <?php if ($result->num_rows > 0) : ?>

                                <?php while ($array = mysqli_fetch_row($result)) : ?>

                                    <tr>
                                        <th scope="row"><?php echo $array[0]; ?></th>
                                        <td><?php echo $array[1]; ?></td>
                                        <td><?php echo $array[2]; ?></td>
                                        <td><?php echo $array[3]; ?></td>
                                        <td><?php echo $array[4]; ?></td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary edit" data-id="<?php echo $array[0]; ?>">Edit</a>
                                            <a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0]; ?>">Delete</a>
                                    </tr>

                                <?php endwhile; ?>

                            <?php else : ?>
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
                        <h4 class="modal-title" id="PriceModal"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="priceForm" name="priceForm" class="form-horizontal" method="POST">
                            <input type="hidden" name="priceId" id="priceId">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">From City</label>
                                <div class="col-md-6 mb-4">


                    <?php
                    $sql = "select * from city_master";
                    $cityResult = mysqli_query($condb, $sql);
                    ?>
                    <select id="fromcity" name="fromcity" class="form-outline">
                      <option value="">Select To City..</option>
                      <?php
                      while ($row = mysqli_fetch_array($cityResult)) {
                        echo "<option value='" . $row['cityid'] . "'>" . $row['cityname'] . "</option>";
                      }
                      ?>
                    </select>

                  </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">To City</label>
                                <div class="col-md-6 mb-4">


                    <?php
                    $sql = "select * from city_master";
                    $cityResult = mysqli_query($condb, $sql);
                    ?>
                    <select id="tocity" name="tocity" class="form-outline">
                      <option value="">Select From City..</option>
                      <?php
                      while ($row = mysqli_fetch_array($cityResult)) {
                        echo "<option value='" . $row['cityid'] . "'>" . $row['cityname'] . "</option>";
                      }
                      ?>
                    </select>

                  </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Normal Price</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nprice" name="nprice" placeholder="Enter Normal Price" value="" maxlength="100" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Express Price</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="eprice" name="eprice" placeholder="Enter Express Price" value="" maxlength="100" required="">
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->
    <script type="text/javascript">
        $(document).ready(function($) {

            $('#create').click(function() {
                $('#priceForm').trigger("reset");
                $('#PriceModal').html("Add Price");
                $('#ajax-modal').modal('show');
            });

            $('body').on('click', '.edit', function() {

                var id = $(this).data('id');

                // ajax
                $.ajax({
                    type: "POST",
                    url: "editprice.php",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#PriceModal').html("Edit Price..");
                        $('#ajax-modal').modal('show');
                        $('#priceId').val(res.prid);
                        $('#tocity').val(res.to_cityid);
                        $('#fromcity').val(res.from_cityid);
                        $('#nprice').val(res.normal_price);
                        $('#eprice').val(res.express_price);
                    }
                });

            });

            $('body').on('click', '.delete', function() {

                if (confirm("Delete Record?") == true) {
                    var id = $(this).data('id');

                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "deleteprice.php",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {

                            // $('#pname').html(res.pname);
                            window.location.reload();
                        }
                    });
                }

            });

            $('#priceForm').submit(function() {

                // ajax
                $.ajax({
                    type: "POST",
                    url: "addprice.php",
                    data: {
                        priceId: $('#priceId').val(),
                        tocity: $('#tocity').val(),
                        fromcity:$('#fromcity').val(),
                        nprice: $('#nprice').val(),
                        eprice:$('#eprice').val()
                    }, // get all form field value in 
                    dataType: 'json',
                    success: function(res) {
                        window.location.reload();
                    }
                });

            });

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
            <p class="text-center text-muted">© 2022 DeliverFast, Inc. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>