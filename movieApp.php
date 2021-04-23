<?php
require_once('connectPDO.php');
session_start();

if($_SESSION['validUser'] == "yes") {
	$msg = "Welcome back " . $_SESSION['inUsername'] . "!" ;
}
else {
  $msg = "";
}

$query = "SELECT * FROM wdv341_movies";
$queryObj = $conn->query($query);
$results = $queryObj->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>'; print_r($results); echo '</prev>';
$conn = null;

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Movies App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href = "css/style.css">
    <style>
    .container {
      background-color: #fca311;
      }
  .head{
    margin-left: 0;
    padding: 30px;
  }
 .moviesDiv{
    
    width: 60%;
    color: whitesmoke;
   margin: auto;
    border-radius: 20px;
 }

 .moviesDiv p{
    color: navy;
    font-family: "time new roman";
    font-weight: bold;
    font-size: 18px;
  
    padding-top: 10px;


 }

 .jumbotron h1{
     text-align:center;
     margin: 10px;
 }


    </style>
</head>

<body>
<div class="container">  <!--main container-->
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
      
        <?php foreach($results as $results){ ?>
       
    <div class="mt-4 moviesDiv " >
        <div class="moviesImages">
				<img src="images/<?=$results['movie_image']?>" width="300px">
            <p class="movieName">The Movie Title <br><?=$results['title']?></p><br>
            <p class="movieDirector">Movie Director : <?=$results['director']?></p><br>
            <p class="movieRating">Movie Rating : <?=$results["rating"]?></p><br>
            <p class="movieYear">Movie Release year : <?=$results["releaseyear"]?></p><br>
            <p class="movieCat">Movie Categories : <?=$results["categorires"]?></p>
            </div>
        </div>
        <?php }?>

        <div class="row"> <!--Footer Div-->
        <footer class="col-s-12 col-md-12 col-lg-12 text-center p-3 bg-info" >
        &copy; <?php echo date ('Y'); ?>
        </footer>
    </div> <!--End of Footer Div-->
  </div> <!--End of main container-->
</body>

</html>