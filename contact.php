<?php
require_once('contactFunction.php');

$validForm= true;
$fnameErrMsg = "";
$lnameErrMsg = "";
$emailErrMsg = "";
$messageErrMsg = "";

$form_submitted = v_array('submitForm', $_POST);

$honeypot_value = v_array('dont_you_do_it', $_POST); // we need to make sure that the honeypot is empty
$valid_form_submission= $form_submitted && !$honeypot_value;


if($valid_form_submission) {
  $fname = v_array('fname', $_POST);
  $lname = v_array('lname', $_POST);
  $email = v_array('email', $_POST);
  $message = v_array('message', $_POST);

  if(!valid_fname($fname)){
    $validForm = false;
    $fnameErrMsg = "Please Add your first name";
  }
  if(!valid_lname($lname)){
    $validForm = false;
    $lnameErrMsg = "Please Add your last name";
  }
  if(!valid_email($email)){
    $validForm = false;
    $emailErrMsg= "Please Add your email address";
  }
  if(!valid_message($message)){
    $validForm = false;
    $messageErrMsg = "Please add a message";
  }
 
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Me</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/contact.css">
    <style>*{font-family:  'Trebuchet MS', sans-serif;list-style: none;}.container {background-color: black;}.head {text-align: center;background-image: url(./images/header.jpg);color: white;font-weight: bold;padding: 30px;}.head h1{background: rgba(50, 0, 10, 0.6);}.head li a{color: white;text-decoration: underline;}.head img{width: 60%;}.navbar{background:#931056;}.navbar li a{color: white;font-size: 20px;text-align: center;}  .navbar a:hover{background: black;width: 200px;transition: 0.5s linear;} .error{color: red;}.head {text-align: center;justify-content: center;padding: 20px;}.form {background: #faf0ca;color: navy;width: 100%;text-align: center;margin: auto;padding: 10px;border: 50px solid black }.footer {background:#931056; color: white;} .contact{
    color: white; background:rgba(100, 0, 10, 0.6); margin-top: 20px; padding: 10px;} form ul {text-align: left; font-size: 22px; margin:0;}  .head li a {color: white; font-size: 22px; text-align: left; text-decoration: underline;}</style>
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
        <section>
            <?php 
  if($valid_form_submission && $validForm) {?>
            <div class="contact"> 
                <h2>
                    Thank You for contact us <?=$first_name?> <?=$last_name?>!!<br>
                    An email will sent to <?= $email?> as soon as we review your message.</p>
            </div>

            <?php } elseif($valid_form_submission)?>
<div class="row"> 
            <form class="form" method="post" action="" name="contactForm" id="contactForm">
                <h1>Contact Me</h1>
                <div class="fill">
                    <label for="fname">First Name:</label><br>
                    <td class="error"><?php echo "$fnameErrMsg"; ?></td><br>
                    <input type="text" id="fname" name="fname"></input><br><br>

                    <label for="lname">Last Name:</label><br>
                    <td class="error"><?php echo "$lnameErrMsg"; ?></td><br>
                    <input type="text" id="lname" name="lname"></input><br><br>

                    <label for="email">Email:</label><br>
                    <td class="error"><?php echo "$emailErrMsg"; ?></td><br>
                    <input type="email" id="email" name="email"></input><br><br>
                    <input type="text" name="dont_you_do_it" id="dont-you-do-it" value="" />

                    <label for="message">Message:</label><br>
                    <td class="error"><?php echo "$messageErrMsg"; ?></td><br>
                    <textarea id="message" name="message" cols="30" rows="10"></textarea><br><br>

                    <input type="reset" id="reset" name="reset" value="Reset"></input>
                    <input type="submit" id="submitForm" name="submitForm" value="Submit"></input>
                </div>
            </form>
            </div>
        </section>
        <div class="row">
            <!--Footer Div-->

            <footer class="col-s-12 col-md-12 col-lg-12 text-center p-3 footer">copy right
                &copy; <?php echo date ('Y'); ?>
            </footer>
        </div>
        <!--End of Footer Div-->

</body>

</html>