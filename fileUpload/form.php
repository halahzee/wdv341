<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
	.form {
		text-align: center;
		padding: 10%;
		margin: 0%;
        background-color: beige;
        box-shadow: 20px 20px 50px gray;
        border-radius: 0px 0px 20px 20px;
	}
	body {
		background-color: rgb(206, 192, 500);
	}

    header {
            background-color: rgb(55, 20, 80);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 10px;
            font-size: 20px;
            list-style: none;
            border-radius: 20px 20px 0px 0px;
        }

        header a {
            padding: 20px;
            color: yellow;
        }

        header a:hover {
            color: rgb(106, 192, 228);
        }

        .nav_links {
            list-style: none;


        }

        .nav_links li {
            display: inline-block;
            padding: 0px 40px;
            font-size: 20px;

        }


        .nav_links li a {
            color: yellow;
            transition: all 0.3s ease 0s;

        }

        .nav_links li a:hover {
            color: rgb(106, 192, 228);
        }

	</style>
</head>
<body>
<header>
        <li><a href="http://www.halahaz.us">Home</a></li>
        <nav>
            <ul class="nav_links">
                <li><a href="http://www.halahaz.us/wdv341">My wdv341</a></li>
                <li><a href="https://github.com/halahzee/wdv341">Git Repo</a></li>
            </ul>
        </nav>
    </header>

<div class="form">
    <form action="fileUpload.php" method="post" enctype="multipart/form-data">
        <h2>Upload File</h2><br><br>
        <label for="fileSelect">Filename:</label>
        <input type="file" name="photo" id="fileSelect"/>
        <input type="submit" name="submit" value="Upload"/>
    </form>
</div>	
</body>
</html>