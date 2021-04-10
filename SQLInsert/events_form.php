<?php include 'functions.php'; ?>
<?php $events = get_events(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Uploader</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}
        .success {color: green;}.error {color:#cc0000;}
        section {display: flex;}section div {width: 50%;}#characters {display: flex;}#characters div {width: 50%;}#characters img {max-width: 100%;}#characters p {font-size: .75rem; margin: 0;}
    </style>
</head>
<body>
    <header>
        <h1>WDV341 Intro <span>PHP</span></h1>
        <p>Unit-12 SQL INSERT</p>
    </header>
    <section>
        <div>
            <?php 
                if($result = v_array('result', $_GET)) {
                    echo $result == 'success'
                        ? '<p class="success">Events added successfully </p>'
                        : '<p class="error">There was a problem with your event entry!, pleas try again.</p>';
                }
            ?>
            <form action="character-upload.php" method="post" enctype="multipart/form-data">
            <p> Event Name <input type="text" name="name" id="name"/></p>
            <p> Description <input type="text" name="desc" id="desc"/></p>
            <p> Presenter <input type="text" name="pres" id="pres"/></p>
            <p> Event date <input type="text" name="date" id="date"/></p>
            <p> Event time <input type="text" name="time" id="time"/></p>
            <p> Date entered <input type="text" name="current" id="current"/></p>
            <p><input type="submit" value="Upload Event"/></p>
            </form>
        </div>
        <div id="characters">
            <?php 
            foreach($events as $events) { 
                ?>
                <div>
                    <p><?=$events['name']?></p>
                    <p><?=$events['description']?></p>
                    <p><?=$events['presenter']?></p>
                    <p><?=$events['date']?></p>
                    <p><?=$events['time']?></p><br>
                    <p><?=$events['current']?></p>
                </div>
            <?php } ?>
        </div>
    </section>
</body>
</html>