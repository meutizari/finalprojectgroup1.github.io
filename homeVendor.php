<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HomeBTS</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <style>
    .navbar{
        background-color: #f4623a;
    }
    </style>
</head>

<body>
    <?php session_start(); ?> 
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Explore BTS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="homeVendor.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logoutSession.php">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <img src="assets/logo-bts.png" width="75%">
        <div class="list-group">
          <a href="#" class="list-group-item">My Services</a>
          <a href="#" class="list-group-item">Ordered Services</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="myCarousel" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="assets/slider-jumbotron-1.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="assets/slider-jumbotron-2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="assets/slider-jumbotron-3.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="container">
        <?php 
        $username = $_SESSION['username'];        
        if($_SESSION['loggedIn']){ ?>
            <h1>Welcome, <?php echo $username; ?> !</h1> <br>
            <?php } ?>
            <h3>Your Services</h3> <br>
        </div>
        
        <div class="row">
        <?php
                include "connection.php";                
                $username = $_SESSION['username'];
                $query = "SELECT p.product_id, p.product_name, p.product_pict, p.unit_price, p.product_desc, v.user_id 
                          FROM products p INNER JOIN users v ON p.vendor_id = v.user_id WHERE v.username = '$username';";
                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <!-- product card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="uploads/<?php echo $row['product_pict'];?>" alt="">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $row['product_name'];?></h5>
                        <h5>Rp <?php echo $row['unit_price'];?></h5>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn" data-toggle="modal" data-target="#modal<?php echo $row['product_id']; ?>">Order > </button>
                        </div>
                    </div>
                </div>
          <!-- /.product card -->
          <!-- modal -->
            <div id="modal<?php echo $row['product_id'];?>" class="modal fade" role="dialog" >
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo $row['product_name'];?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body" style="align-items: center;">
                    <img class="img-fluid" src="uploads/<?php echo $row['product_pict'];?>" alt="">
                    <?php echo $row['product_desc']; ?>
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
          
                </div>
              </div>
            </div>
          <!-- /.modal -->
            <?php
                        }
                    } else{
                        echo "0 result";
                    }
                ?>
            </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy;  2020 - Group 1 Web Programming Design TI-2H</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
