<?php
session_start();
if($_SESSION['validUser'] == "yes") {
	$msg = "Welcome back " . $_SESSION['inUsername'] . "!" ;
}
else {
  $msg = "";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movies Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
  .container {
    background-color: #fca311;
      }
  .head {
    text-align: center;
    justify-content: center;
    padding: 30px;
}


 .home h2{
   text-align: center;
   color: navy;
   margin: 20px;
 }
.home img {
  margin: 40px 15%;
}
</style>
</head>
<body>
<div class="container">

   <div class="row">
      <div class="head  col-xs-12 col-md-12 col-lg-12 bg-info">
        <header>
          <img src=images/imagesMovie.jpeg width="500px" alt="" /><br><br>
            <h1>Welcome to My Movie App </h1>
        </header>
      </div>
    </div>

      <div class="row"><!--row-->
        <nav class="navbar col-xs-12 col-md-12 col-lg-12 bg-dark ">
        <ul class="nav justify-content-center">
        <li class="nav-item"><a class="nav-link" href="moviesHome.php"> Home </a></li>
        <li class="nav-item"><a class="nav-link" href="movieApp.php"> Movies Gallery </a></li>
        <li class="nav-item"><a class="nav-link" href="moviesForm.php"> Add Movie</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php"> Contact Us </a></li>
        <?php
          if($_SESSION['validUser'] == "yes") {
          ?>
          <li class="nav-item"><a class="nav-link" href='logout.php'>Logout</a></li>
        <?php } else {
          ?>
          <li class="nav-item"><a class="nav-link" href="login.php">Admin Login</a></li>
        <?php } ?>
             </ul>
          </nav>
      </div><!--End of row-->
      
       


    <div class=row> 
      <div class= "home col-s-12 col-md-12 col-lg-12">
        <h2> Movies Homepage Page<br> </h2>
        <img  src=images/mvnight.jpg width="800px" alt="" />
      </div>
    </div>


    <div class="row"> <!--Footer Div-->
        <footer class="col-s-12 col-md-12 col-lg-12 text-center p-3 bg-info">
        &copy; <?php echo date ('Y'); ?>
        </footer>
    </div> <!--End of Footer Div-->


</div>
</body>
</html>