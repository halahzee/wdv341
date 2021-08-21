<?php
require_once('connectPDO.php'); //connect to db
session_start();

$formSubmitted = v_array('movie_id', $_POST);
if ($formSubmitted) {


  $stmt = $conn->prepare('delete from wdv341_movies WHERE id=?');
  $stmt->execute([$formSubmitted]);
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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
  <style>

*{
  font-family:  'Trebuchet MS', sans-serif;
 list-style: none;
}
  .container {
    background-color: black;

      }
  .head {
    justify-content: space-between;
    text-align: center;
    background-image: url(./images/header.jpg);
    color: white;
    font-weight: bold;
    padding: 30px;
}
.head h1{
  background: rgba(50, 0, 10, 0.6);
}

.head li a{
  color: white;
  text-decoration: underline;
}

.head img{
  width: 60%;
}

.navbar{
 background:#931056;
}

.navbar li a{
  color: white;
  font-size: 20px;
  text-align: center;
 
 
}
.navbar a:hover{
      background: black;
      width: 200px;
      transition: 0.5s linear;
 }
  
 form ul {
        text-align:
            left;
        font-size: 22px;
        margin: 0;
    }

    .head li a {
        color: white;
        font-size: 22px;
        text-align: left;
        text-decoration: underline;
    }

    .head {
      margin-left: 0;
      padding: 30px;
    }

    .displayMain{
    margin: 30px 0px;
    padding: 20px;
    color: white;
    width: 70%;
    background: #f2e2ba;
    border: 20px solid black 
    
    }

.infoDisplay{
  color: navy;
  font-weight: bold;
  font-size: 18px;
  padding-top: 30px;
  text-align: center;
}

.infoDisplay h2{
  font-size: 20px;
  background: #931056;
  color: white;
  padding: 5px;
  text-align: center;
}

.imgDisplay img{
  width: 400px;
}
    .jumbotron h1 {
      text-align: center;
      margin: 10px;
    }
.action{color: white;}

.footer {
  background:#931056;
}
@media screen and (max-width:660px){
  .imgDisplay img{
    width: 200px;
}
.displayMain{
  width: 100%;
  background-color: blue;

}
    }



  </style>
</head>

<body>
  <div class="container">
    <!--main container-->
    <div class="row">
      <div class="head  col-xs-12 col-md-12 col-lg-12">
      <header>
      
          <h1>Movie Night
          <ul> <li class="nav-item"><a class="nav-link" href="login.php">Admin Login</a></li></ul>
          <form method="post" action="moviesForm.php" enctype="multipart/form-data" name="movieForm" id="movieForm" onsubmit="return confirm('wanna log out!!')">
          <ul> <input type="submit" id="logout" name="logout" value="Log Out"></input></ul>
          </form>
         </h1>
        </header>
      </div>
    </div>


    <div class="row">
      <!--row-->
      <nav class="navbar col-xs-12 col-md-12 col-lg-12">
        <ul class="nav justify-content-center">
          <li class="nav-item"><a class="nav-link" href="moviesHome.php"> Home </a></li>
          <li class="nav-item"><a class="nav-link" href="movieApp.php"> Movies Gallery </a></li>
          <li class="nav-item"><a class="nav-link" href="moviesForm.php"> Add Movie</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php"> Contact Us </a></li>
         
         
      
        </ul>
      </nav>
    </div>
    <!--End of row-->

    <?php foreach ($results as $results) { ?>

    
       <div class="row">
       <div class="col-xs-12 col-md-12 col-lg-12 displayMain">
       <div class="row">
       <div class="col-xs-12 col-md-12 col-lg-6 imgDisplay">
          <img src="images/<?= $results['movie_image'] ?>" width="300px">  
          </div><br>
          <div class="col-xs-12 col-md-12 col-lg-6 infoDisplay">   
          <p class="movieName"><h2>Movie Title:</h2><?= $results['title'] ?></p><br>
          <p class="movieDirector"><h2>Movie Director : </h2><?= $results['director'] ?></p><br>
          <p class="movieRating"><h2>Movie Rating : </h2><?= $results["rating"] ?></p><br>
          <p class="movieYear"><h2>Movie Release year : </h2><?= $results["releaseyear"] ?></p><br>
          <p class="movieCat"><h2>Movie Categories : </h2><?= $results["categorires"] ?></p>
          </div>
      </div>
      </div>
      </div>
          <div class="action">
                <?php
                if ($_SESSION['is_logged_in'] == 1) {
                ?>
                  <p class="movieCat">Actins :
                  <form id="delete-movie-<?= $results['id'] ?>" method="post" action="movieApp.php" style="display: none">
                    <input type="hidden" name="movie_id" value="<?= $results['id'] ?>">
                  </form>
                  <a href="moviesEditForm.php?id=<?=$results['id']?>" class="btn btn-primary">Edit</span></a>
                  <button id="submitFormDelete" name="submitFormDelete" class="btn btn-danger" onclick="
                            if(confirm('Are you sure, You Want to delete this?'))
                                {
                                  event.preventDefault();
                                  document.getElementById('delete-movie-<?= $results['id'] ?>').submit();
                                }
                                else{
                                  event.preventDefault();
                                }">Delete</button></p>

                <?php  } ?>
                      <?php } ?>
               </div>
  

      <div class="row">
      <!--Footer Div-->
      <footer class="col-s-12 col-md-12 col-lg-12 text-center p-3 footer">copy right
        &copy; <?php echo date('Y'); ?>
      </footer>
    </div>
    <!--End of Footer Div-->
  </div>
  <!--End of main container-->
</body>

</html>