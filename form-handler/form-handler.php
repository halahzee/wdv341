<?php
//Model-Controller Area.  The PHP processing code goes in this area. (could be in a different file and included)
require_once('functions.php');

//echo '<pre>'; print_r($_POST) ; echo '<pre>';

$form_submitted = v_array('submitted', $_POST);
$honeypot_value = v_array('dont_you_do_it', $_POST); // we need to make sure that the honeypot is empty
$valid_form_submission= $form_submitted && !$honeypot_value;

if($valid_form_submission) {
    // we know that the form submitted.
$first_name = v_array('first_name', $_POST);
$last_name = v_array('last_name', $_POST);
$email = v_array('email', $_POST);
$radio_input = v_array('radio_input', $_POST);
$radio_sub = v_array('radio_sub', $_POST);
$find_us = v_array("find_us", $_POST);




// This is where you can send an email to the user
 
mail($email, 'WDV341 Class Subscription', 'in-Class test is working !!!');

}



// if($form_submitted) {
//     // we know that the form submitted.
// $first_name = v_array('first_name', $_POST);
// $last_name = v_array('last_name', $_POST);
// $email = v_array('email', $_POST);

// }

// This is where you'll check if the form has been submitted via the POST method
    // This is where you'll define your variables for your display



?>
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Form handling</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}
        #dont-you-do-it {display:none;}
        input[type=submit], input[type=reset]{
            padding:10px;
            background-color:#484c9b;
            color: white;
            font-size: 15px;
        }
    
    </style>
</head>

<body>
    <header>
        <h1>WDV341 Intro <span>PHP</span></h1>
        <p>Form Handler Result Page - Code Example</p>
    </header>

    <section>
        <?php  
        // This is where you'll check if the form was submitted and show a response, and hide the form
        // Only show the form on page load if the form wasn't submitted
    if ($valid_form_submission){?>

    <h2>
    Thank You for submitting the form <?=$first_name?> <?=$last_name?>!!<br>
    Your Subscription Type is : <?=$radio_input?> <br>
    Receive Special Offers : <?=$radio_sub?>
    <br>
    How did you find us: <?=$find_us?>
    </h2>
    
    <p>A confirmation email has been sent to  <?= $email?> which contains instruction on next steps.</p>

    <?php }  else {?>
   
        <h2>Newsletter Signup</h2>
        <p>Please enter your full name and email to receive our super sweet newsletter!</p>

        <form id="newsletter-form" name="newsletter_form" method="post" action="form-handler.php">
            <p>First Name: <input type="text" name="first_name" id="first-name" /></p>
            <p>Last Name: <input type="text" name="last_name" id="last-name" /></p>
            <p>Email: <input type="text" name="email" id="email" /></p>
            <input type="text" name="dont_you_do_it" id="dont-you-do-it" value="" />
            
            <p>
            <h2>Please Select Subscription Type:</h2>
            <input type="radio" value="Normal" id="normal-radio" name='radio_input'>
            <label for="Normal">Normal</label>
            <br>
          
            <input type="radio" value="Expert" id="expert-radio" name='radio_input'>
            <label for="Expert">Expert</label>

            </p>

            <p>
            <h2>Receive Special offers and latest update?</h2>
            <input type="radio" value="Yes" id="yes-radio" name='radio_sub'>
            <label for="Normal">Yes</label>
            <input type="radio" value="No" id="yes-radio" name='radio_sub'>
            <label for="Normal">No</label>
            <br>
            </p>

            <label for="findingUs">How did you find us?</label>
            <select name="find_us" id="selectAway">
            <option value="">Select One:</option>
            <option value="Word of mouth">Word of mouth</option>
            <option value="Internet">Internet</option>
            <option value="Podcast">Podcast</option>
            </select>
            <br><br><br>
          
            <p>
                <input type="submit" name="submitted" id="submitted" value="Submit" />
                <input type="reset" name="clear-form" id="clear_form" value="Clear Form" />
            </p>


        </form>
        <?php }?>
    </section>
</body>

</html>