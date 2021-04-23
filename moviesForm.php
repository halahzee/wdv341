<?php require_once("connectPDO.php"); ?>
<?php require_once('functions.php'); ?>
<?php

session_start();

$logout = v_array('logout', $_POST);

// If the user is not logged in, then sent them back to the login page
if ($logout || !is_logged_in()) {
  if ($logout) {
    log_out();
  }

  header('Location: login.php');
}

if (is_logged_in()) {
  $titleErrMsg = "";
  $directorErrMsg = "";
  $yearErrMsg = "";
  $ratingErrMsg = "";
  $catErrMsg = "";
  $validForm = true;
  $formSubmitted = v_array('submitForm', $_POST);

  // $inTitle = "";
  // $inDirector = "";
  // $inYear = "";
  // $inRating = "";
  // $inCategories = "";

  $honeypot_value = v_array('dont_you_do_it', $_POST); // we need to make sure that the honeypot is empty
  $valid_form_submission = $form_submitted && !$honeypot_value;

  if ($valid_form_submission) {

    $inTitle = v_array('movieTitle', $_POST);
    $inDirector = v_array('movieDirector', $_POST);
    $inRating = v_array('movieRating', $_POST);
    $inYear = v_array('movieYear', $_POST);
    $inCategories = v_array('movieCategories', $_POST);


    function validateTitle()
    {
      if ($inTitle == '') {
        return false;
      }
      return true;
    }

    if (!validateTitle($inTitle)) {
      $validForm = false;
      $titleErrMsg = 'please Add title';
    }



    function validateDirector()
    {
      if ($inDirector == '') {
        return false;
      }
      return true;
    }

    if (!validateDirector($inDirector)) {
      $validForm = false;
      $directorErrMsg = 'please Add Director Name';
    }

    function validateRating()
    {
      if ($inRating == '') {
        return false;
      }
      return true;
    }

    if (!validateRating($inRating)) {
      $validForm = false;
      $ratingErrMsg = 'please choose rating';
    }


    function validateYear()
    {
      if ($inYear == '') {
        return false;
      }
      return true;
    }

    if (!validateYear($inYear)) {
      $validForm = false;
      $yearErrMsg = 'please add year';
    }

    function validateCategories()
    {
      if ($inCategories == '') {
        return false;
      }
      return true;
    }

    if (!validateCategories($inCategories)) {
      $validForm = false;
      $catErrMsg = 'please add year';
    }
  }
  if ($validForm) {
    $message = "You have submitted the form successfully!";

    try {
      //Create the SQL command string
      $sql = "INSERT INTO wdv341_movies (";
      $sql .= "title, ";
      $sql .= "director, ";
      $sql .= "rating ";
      $sql .= "releaseyear, ";
      $sql .= "categorires, ";

      $sql .= ") VALUES (:title, :director, :rating, :releaseyear, :categorires)";

      //PREPARE the SQL statement
      $stmt = $conn->prepare($sql);

      //BIND the values to the input parameters of the prepared statement
      $stmt->bindParam(':title', $inTitle);
      $stmt->bindParam(':director', $inDirector);
      $stmt->bindParam(':rating', $inRating);
      $stmt->bindParam(':releaseyear', $inYear);
      $stmt->bindParam(':categorires', $inCategories);

      //EXECUTE the prepared statement
      $stmt->execute();

      $message = "A Movie has been added.";
    } catch (PDOException $e) {
      $message = "There has been a problem.";

      error_log($e->getMessage());
      error_log(var_dump(debug_backtrace()));
    }
  } else {
    $message = "Please fill out the form.";
  }
} else {
  $message = "";
}


?>

<!DOCTYPE html>
<html lang="'en'" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Movie Form</title>
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
      padding: 20px;
      margin: 0;
    }

    .addForm {
      background: navy;
      color: white;
      padding: 100px;
      text-align: center;
      justify-content: center;
      width: 200px;
    }
  </style>
</head>

<body>
  <div class="container bg-warning">
    <div class="row">
      <div class="head  col-xs-12 col-md-12 col-lg-12 bg-info">
        <header>
          <img src=images/imagesMovie.jpeg width="500px" alt="" /><br><br>
          <h1>Welcome to My Movie App </h1>
        </header>
      </div>
    </div>

    <div class="row">
      <!--row-->
      <nav class="navbar col-xs-12 col-md-12 col-lg-12 bg-dark ">
        <ul class="nav justify-content-center">
          <li class="nav-item"><a class="nav-link" href="moviesHome.php"> Home </a></li>
          <li class="nav-item"><a class="nav-link" href="movieApp.php"> Movies Gallery </a></li>
          <li class="nav-item"><a class="nav-link" href="moviesForm.php"> Add Movie</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php"> Contact Us </a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Admin Login</a></li>

        </ul>
      </nav>
    </div>
    <!--End of row-->

    <main>

      <div class="row">
        <div class="addForm col-sm-12 col-md-12 col-lg-12">

          <form method="post" action="moviesForm.php" name="movieForm" id="movieForm">
            <h1 class="fill">Add a Movie!</h1>
            <div class="fill">
              <label for="movieTitle">Movie Title:</label><br>
              <td class="error"><?php echo "$titleErrMsg"; ?></td><br>
              <input type="text" id="movieTitle" name="movieTitle"></input><br><br>
            </div>

            <div class="fill">
              <label for="movieDirector">Movie Director :</label><br>
              <td class="error"><?php echo "$directorErrMsg";  ?></td><br>
              <input type="text" id="movieDirector" name="movieDirector"></input><br><br>
            </div>

            <div class="rate">
              <label for="movieRating">Movie Rating :</label><br>
              <td class="error"><?php echo "$ratingErrMsg"; ?></td><br>
              <fieldset class="movieRating">
                <input type="radio" id="star5" name="movieRating" value="5 stars" /><label for="star5" title="Rocks!">5 stars</label>
                <input type="radio" id="star4" name="movieRating" value="4 stars" /><label for="star4" title="Pretty good">4 stars</label>
                <input type="radio" id="star3" name="movieRating" value="3 stars" /><label for="star3" title="Meh">3 stars</label>
                <input type="radio" id="star2" name="movieRating" value="2 stars" /><label for="star2" title="Kinda bad">2 stars</label>
                <input type="radio" id="star1" name="movieRating" value="1 stars" /><label for="star1" title="Sucks big time">1 star</label>
              </fieldset><br><br><br><br>
            </div>

            <div class="fill">
              <label for="rearRelease">Year Release :</label><br>
              <td class="error"><?php echo "$yearErrMsg";  ?></td><br>
              <input type="text" id="year" name="movieYear"></input><br><br>
            </div>
            <div class="fill">
              <label for="movieCategories">Movie Categories:</label><br>
              <td class="error"><?php echo "$catErrMsg";  ?></td><br>
              <input type="text" id="categories" name="movieCategories"></input><br><br>
            </div>
            <input type="reset" id="reset" name="reset" value="Reset"></input>
            <input type="submit" id="submitForm" name="submitForm" value="Submit"></input>
            <input type="submit" id="logout" name="logout" value="Log Out"></input>
          </form>

        </div>
    </main>
    <div class="row">
      <!--Footer Div-->

      <footer class="col-s-12 col-md-12 col-lg-12 text-center p-3 bg-info">
        &copy; <?php echo date('Y'); ?>
      </footer>
    </div>
    <!--End of Footer Div-->
  </div>


</body>

</html>