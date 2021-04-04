<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>iForum</title>

<style>
/* .container-flex{
    display:flex;
    margin:40px 45px;
    justify-content:center;
    align-items: center;
} */

</style>
</head>
<body>
<?php


  ?>
    <?php  include "partials/_header.php"?>
    <?php include "partials/_dbconnect.php"?>
    <?php
    // signup alerts-------------------------------------
    
    if(isset($_GET['signup']) && $_GET['signup']=="true"){
        // echo 'yes';
          echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Sucess!</strong> You can now login by using your email and password.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }
      if(isset($_GET['signup']) && $_GET['signup']=="false"){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error! </strong>'. $_GET["error"] .'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }

    ?>
    
    
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slider01.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slider02.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slider03.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        
    </div>


    <h2 class="text-center my-3"><b>iForum-Browse Categories</b></h2>
    <div class="container ">
        <div class="row  ">
            <!-- fetch all the category  -->


 <?php 
$sql="SELECT * FROM `category`";
$result=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_assoc($result)){
  $id=$rows['category_id'];
  $name=$rows['category_name'];
  $desc= $rows['category_description'];
 
      //  <!-- use for loop to irretate category -->
      echo' <div class="col-md-4 my-5  my-3 d-flex justify-content-center align-items-center">
        <div class="card " style="width: 18rem;">
            <img src="img/card-'.$id.'.jpg" class="card-img-top" alt="...">
            <div class="card-body ">
                <h5 class="card-title "><a href="threadlist.php?catid='.$id.'"> '. $name .'</a></h5>
                <p class="card-text">'. substr($desc,0,82) .'...</p>
                <a href="threadlist.php?catid='.$id.'" class="btn-sm btn-dark">View Threads</a>
            </div>
        </div>
    </div>';
}

?>

        
        </div>
    </div>


    <?php  include "partials/_footer.php"?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>