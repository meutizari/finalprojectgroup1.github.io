<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>List Inn - Explore BTS</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  <style>
    .navbar{
        background-color: #f4623a;
    }

    h1{
        padding-top: 25px;
        text-align: center;
        padding-bottom: 25px;
        color: #404040;
        background: linear-gradient(to bottom, #cccccc 0%, #ffffff 100%);
    }
    </style>
</head>

<body>

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
            <a class="nav-link" href="homeUsers.html">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Book Ticket</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Services
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="listJeep.php">Jeep</a>
                <a class="dropdown-item" href="listTravel.php">Travel</a>
                <a class="dropdown-item" href="listInn.php">Inn</a>
                <a class="dropdown-item" href="listCampTools.php">Camping Tools</a>
            </div>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <h1>List Inn</h1>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <img src="assets/logo-bts.png" width="75%">
        <div class="list-group">
          <a href="#" class="list-group-item">Ticket</a>
          <div class="list-group-item">
            <a class="dropdown-toggle" href="" data-toggle="dropdown">Services<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li role="presentation"></li><a href="listInn.html" class="list-group-item">Inn</a></li>
              <li role="presentation"></li><a href="listJeep.html" class="list-group-item">Jeep</a></li>
              <li role="presentation"></li><a href="listTravel.html" class="list-group-item">Travel</a></li>
              <li role="presentation"></li><a href="listCampTools.html" class="list-group-item">Camp Tools</a></li>
            </ul>
          </div>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div class="row">
          <?php
                include "connection.php";
                $query = "SELECT * FROM products WHERE category_code LIKE '%INN%'";
                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <!-- product card -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="uploads/<?php echo $row['product_pict'];?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title"><?php echo $row['product_name'];?></h4>
                  <h5><?php echo $row['unit_price'];?></h5>
                </div>
                <div class="card-footer">
                  <a class="text-muted" data-toggle="modal" data-target="#modal<?php echo $row['product_id']; ?>">Order > </a>
                </div>
            </div>
          </div>
          <!-- /.product card -->
          <!-- modal -->
            <div id="#modal<?php echo $row['product_id']; ?>" class="modal fade"  tabindex="-1" role="dialog" >
              <div class="modal-dialog" style="width:100%;">
                <div class="modal-content">
          
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title"><?php echo $row['product_name'];?></h4>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
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
  <footer class="fixed-bottom py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; 2020 - Group 1 Web Programming Design TI-2H</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>