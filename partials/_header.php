<style>



@media screen and (min-width: 576px){
.form-inline .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle;
}
.form-inline {
    display:-ms-flexbox;
    display: flex;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    -ms-flex-align: center;
    align-items: center;
}
.mr-sm-2, .mx-sm-2 {
    margin-right:.5rem!important;
}
}



</style> 

<?php include "partials/_dbconnect.php"?>
<?php

// $loggedin=false;
$showerror=false;
session_start();
echo '<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand " href="index.php"><span class="text-primary font-weight-bold">i</span>Forum</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item ">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown ">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top Categories
      </a>
      <div class="dropdown-menu dropdown bg-dark" aria-labelledby="navbarDropdown">';
      
      $sql="SELECT category_name,category_id FROM `category` LIMIT 4";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result))
      {
      echo '<a class="dropdown-item text-light bg-dark" href="threadlist.php?catid='. $row['category_id'] .'">'.$row['category_name'].'</a>';
      } 
      echo '</div>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="contact.php">Contact</a>
  </li>
  </ul>

  <div class="mx-2 row ">
  <form class="form-inline  my-2 my-lg-0 mr-3" action="search.php" method="GET">
  <input id="search-bar" class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
  <button id="search-btn" class="btn btn-primary  my-2 my-sm-0" "type="submit">Search</button>
  </form>';


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo    
        // '<p class=" text-center my-1 mx-2" padding:0px> welcome '. $_SESSION['username'].'</p>
        // <a href="partials/_logout.php" class="btn btn-outline-dark ml-2">logout</a>';
        '<div class="dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              '. $_SESSION['useremail'].'
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
          
            <button type="submit" class="btn btn-dark my-0 mx-2 py-0 "><a class="dropdown-item bg-dark text-light 
              " href="partials/_logout.php"> logout</a></button>
           </div>
          </div>';
   }
 else{ 
        echo '<button id="login" class="btn btn-outline-primary ml-1"  data-toggle="modal" data-target="#loginModal">login</button>
      <button id="signup" class="btn btn-outline-primary mx-1" data-toggle="modal" data-target="#signupModal">Register</button>';
}
    echo '</div>
    </div>
    </nav>';
include 'partials/_login.php';
include 'partials/_signup.php';
// if(isset($_GET['signup']) && $_GET['signup']=="true"){
//   // echo 'yes';
//     echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
//     <strong>Sucess!</strong> You can now login by using your email and password.
//     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//       <span aria-hidden="true">&times;</span>
//     </button>
//   </div>';
// }
// else{
//   // echo $_GET['error'];
//   echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
//     <strong>Error!</strong> username already defined or Password do not match
//       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//       <span aria-hidden="true">&times;</span>
//     </button>
//   </div>';
// }


?>