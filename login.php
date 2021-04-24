<?php
require_once('functions.php');
session_start();

if ($logged_in = is_logged_in()) {
    header('Location: moviesForm.php');
} else {
    // Check if the user submitted the login form
    if (v_array('submit', $_POST)) {
        $username = v_array('username', $_POST);
        $password = v_array('password', $_POST);
        $logged_in = log_in($username, $password, $conn);

        // Send the logged in user to the movies page
        if ($logged_in) {
            header('Location: moviesForm.php');
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Movies App</title>
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
        }

        .loginForm {
            color: navy;

        }

        .formLogin {
            background-color: navy;
            color: white;
            margin: 40px 25%;
            width: 50%;
            padding: 100px;
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
        <section>
            <div class="row">
                <div class="loginForm col-sm-12 col-md-12 col-lg-12 bg-warning ">
                    <div class="formLogin">
                        <h1>Admin Log in</h1>
                        <form action="login.php" method="post">
                            <p>
                                <label for="username">Username</label><br>
                                <input type="text" name="username" id="username" />
                            </p>
                            <p>
                                <label for="password">Password</label><br>
                                <input type="password" name="password" id="password" />
                            </p>
                            <input type="submit" name="submit" id="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <!--Footer Div-->

            <footer class="col-s-12 col-md-12 col-lg-12 text-center p-3 bg-info">
                &copy; <?php echo date('Y'); ?>
            </footer>
        </div>
        <!--End of Footer Div-->
        <div>
</body>

</html>