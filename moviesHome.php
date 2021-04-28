<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Movies Homepage</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>
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
            font-size: 22px;
            text-align: left;
            text-decoration: underline;
        }

 .navbar a:hover{
      background: black;
      width: 200px;
      transition: 0.5s linear;
 }
        .navbar {
            background: #931056;
        }

        .navbar li a {
            color: white;
            font-size: 20px;
            text-align: center;


        }

        .head {
            margin-left: 0;
            padding: 30px;
        }


        .home h2 {
            text-align: center;
            color: navy;
            margin: 20px;
        }

        .home img {
            margin: 40px 15%;
            width: 400px;
          
        }

        .footer {
            background: #931056;
            color: white;
        }

        .button {
            text-align: right;

        }

        form ul {
            text-align: left;
            font-size: 22px;
            margin:0;
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
                        <form method="post" action="moviesForm.php" enctype="multipart/form-data" name="movieForm"
                            id="movieForm" onsubmit="return confirm('wanna log out!!')">
                            <ul> <input class="logout" type="submit" id="logout" name="logout" value="Log Out"></input></ul>
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




        <div class=row>
            <div class="home col-s-12 col-md-12 col-lg-12">
                <h2 style="color: white"> Movies Homepage Page<br> </h2>
                <div class="row">

                    <div class="col-xs-12 col-md-4 col-lg-6 picture">
                        <img src=images/mv1.jpg  alt="" />
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-6 picture">

                        <img src=images/shaw.jpg  alt="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-12 col-lg-12 button mb-4">
            <button type="button"><a class="nav-link" href="movieApp.php"> Click here for more movies ------->>>>>
                </a></button>

        </div>



        <div class="row">
            <!--Footer Div-->
            <footer class="col-s-12 col-md-12 col-lg-12 text-center p-3 footer">copy right
                &copy; <?php echo date ('Y'); ?>
            </footer>
        </div>
        <!--End of Footer Div-->


    </div>
</body>

</html>