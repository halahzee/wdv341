<?php require_once("connectPDO.php"); //connect to db?>
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
  $valid_form_submission = $formSubmitted && !$honeypot_value;

  if ($valid_form_submission) {

    $inTitle = v_array('movieTitle', $_POST);
    $inDirector = v_array('movieDirector', $_POST);
    $inRating = v_array('movieRating', $_POST);
    $inYear = v_array('movieYear', $_POST);
    $inCategories = v_array('movieCategories', $_POST);


    function validateTitle($inTitle)
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



    function validateDirector($inDirector)
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

    function validateRating($inRating)
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


    function validateYear($inYear)
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

    function validateCategories($inCategories)
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
      $sql .= "rating, ";
      $sql .= "releaseyear, ";
      $sql .= "categorires, ";
      $sql .= "movie_image ";
      $sql .= ") VALUES (:title, :director, :rating, :releaseyear, :categorires,:movie_image)";
      //PREPARE the SQL statement
      $stmt = $conn->prepare($sql);


      $dir = "images/";


        if (!file_exists($_FILES['file_img']['tmp_name']) || !is_uploaded_file($_FILES['file_img']['tmp_name'])) 
            {
               $slider_image_name_new = '';
            }
            else
            {
                $slider_image_name = $_FILES['file_img']['name'];   
                $slider_image_tmp_name = $_FILES['file_img']['tmp_name'];
                $slider_image_extension = strrchr($slider_image_name, '.');
                $slider_image_extension = strtolower($slider_image_extension);
                
                $slider_image_name_new = "movie_image_" . time() . $slider_image_extension;
                
                $upload_image = move_uploaded_file($slider_image_tmp_name, $dir . $slider_image_name_new);
            }
        


      $params = [
        'title' => $inTitle,
        'director' => $inDirector,
        'rating' => $inRating,
        'releaseyear' => $inYear,
        'categorires' => $inCategories,
        'movie_image' => $slider_image_name_new 
      ];

      //EXECUTE the prepared statement
      $stmt->execute($params);


      $_SESSION['success'] = $message;
    } catch (PDOException $e) {
      $message = "There has been a problem.";
      error_log($e->getMessage());
      // error_log(var_dump(debug_backtrace()));
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
    #dont-you-do-it {
      display: none;
    }

    * {
        font-family: 'Trebuchet MS', sans-serif;
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

    .head h1 {
        background: rgba(50, 0, 10, 0.6);


    }

    .head li a {
        color: white;
        text-decoration: underline;
    }

    .head img {
        width: 60%;
    }

    .navbar {
        background: #931056;
    }

    .navbar li a {
        color: white;
        font-size: 20px;
        text-align: center;


    }

    .navbar a:hover {
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

    .addForm {
        background: #faf0ca;
        color: navy;
        padding: 100px;
        text-align: center;
        justify-content: center;
        width: 200px;
        border: 50px solid black
    }

    .footer {
        background: #931056;
        color: white;

    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="head  col-xs-12 col-md-12 col-lg-12">
                <header>
                    <h1>Movie Night
                        <ul>
                            <li class="nav-item"><a class="nav-link" href="login.php">Admin Login</a></li>
                        </ul>
                        <form method="post" action="moviesEditForm.php" enctype="multipart/form-data" name="movieForm"
                            id="movieForm" onsubmit="return confirm('wanna log out!!')">
                            <ul> <input type="submit" id="logout" name="logout" value="Log Out"></input></ul>
                        </form>
                    </h1>
                </header>
            </div>
        </div>

        <div class="row">
            <!--row-->
            <nav class="navbar col-xs-12 col-md-12 col-lg-12  ">
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a class="nav-link" href="moviesHome.php"> Home </a></li>
                    <li class="nav-item"><a class="nav-link" href="movieApp.php"> Movies Gallery </a></li>
                    <li class="nav-item"><a class="nav-link" href="moviesForm.php"> Add Movie</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php"> Contact Us </a></li>


                </ul>
            </nav>
        </div>
        <!--End of row-->

        <main>

            <div class="row">
                <div class="addForm col-sm-12 col-md-12 col-lg-12">

                    <?php
                      if (isset($_SESSION['success'])) {
                            ?>
                    <div class="alert alert-secondary" role="alert">
                        <?php echo $_SESSION['success'];  ?>
                    </div>

                    <?php
                       unset($_SESSION['success']);
                               }
                          ?>
                    <form method="post" action="moviesForm.php" name="movieForm" id="movieForm"
                        enctype="multipart/form-data" onsubmit="return confirm('Do you want to submit movie?')">
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
                                <input type="radio" id="star5" name="movieRating" value="5 stars" /><label for="star5"
                                    title="Super Good!">5 stars</label>
                                <input type="radio" id="star4" name="movieRating" value="4 stars" /><label for="star4"
                                    title="Pretty Good">4 stars</label>
                                <input type="radio" id="star3" name="movieRating" value="3 stars" /><label for="star3"
                                    title="kinda">3 stars</label>
                                <input type="radio" id="star2" name="movieRating" value="2 stars" /><label for="star2"
                                    title="Kinda bad">2 stars</label>
                                <input type="radio" id="star1" name="movieRating" value="1 stars" /><label for="star1"
                                    title="Poor">1 star</label>
                            </fieldset><br>
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
                        <div class="fill">
                            <label for="file_img">Movie Image:</label><br>
                            <td class="error"><?php echo "$catErrMsg";  ?></td><br>
                            <input type="file" id="image" id="file_img" name="file_img"
                                accept="image/*"></input><br><br>
                            <!-- <input type="text" name="dont_you_do_it" id="dont-you-do-it" value="" /> -->
                        </div>
                        <input type="reset" id="reset" name="reset" value="Reset"></input>
                        <input type="submit" id="submitForm" name="submitForm" value="Submit"></input><br><br>

                        <input type="submit" id="logout" name="logout" value="Log Out"></input>
                    </form>

                </div>
        </main>
        <div class="row">
            <!--Footer Div-->

            <footer class="col-s-12 col-md-12 col-lg-12 text-center p-3 footer">copy right
                &copy; <?php echo date('Y'); ?>
            </footer>
        </div>
        <!--End of Footer Div-->
    </div>

</body>

</html>