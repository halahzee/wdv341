<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP Functions </title>
	
	<style>
		div {
			display: block;
		
			background-color: lightskyblue;
			padding: 40px;
			width: 700px;
			height: 130vh;
			border-radius: 30px;
			margin-left: 20%;

		}

		div h1 {
			text-align: center;
		}
	</style>
</head>
<body>



<?php 



function mmddYYDate($inDate)
{

$timestamp = strtotime($inDate);
$date = date('m/d/Y', $timestamp);
echo $date;

	};
function ddmmYYDate($inDate){

$timestamp = strtotime($inDate);
$date = date('d/m/Y', $timestamp);
echo $date;


};
function stringInputResults($inString)
{
		$charNum = strlen($inString);
		$strTrim = trim($inString);
		$lowerStr = strtolower($strTrim);
	
		
		echo "<h3> - The number of characters in the string is</h3>" . $charNum. "<br>";

		echo "<h3> - Trim any leading or trailing whitespace:</h3>" . $strTrim. "<br><br>";

		echo "<h3> - Display the string as all lowercase characters</h3>" . $lowerStr . "<br><br>";

		echo "<h3>- Will display whether or not the string contains DMACC either upper or lowercase</h3>";
	

		if(strpos($lowerStr, 'dmacc') !== false)
		{
		echo("The string contains DMACC.");
		}
		else
		{
		echo("The string does not contain DMACC.");
		}
}


function phone_Forma($number) {
	// Allow only Digits, remove all other characters.
	$number = preg_replace("/[^\d]/","",$number);
   
	// get number length.
	$length = strlen($number);
   
   // if number = 10
   if($length == 10) {
	$number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
   }
	
	return $number;
   
  }



function formatMoney($inNum)
{
		$amount = number_format($inNum, 2, ".", ",");
		echo("$".$amount);
}
?>
<div>
<h1>PHP Functions</h1>
<h3>1. Create a function that will accept a timestamp and format it into mm/dd/yyyy format. <br><br>
<?php mmddYYDate('today')?></h3>
<hr>
<h3>2. Create a function that will accept a timestamp and format it into dd/mm/yyyy format to use when working with international dates.<br><br>
<?php ddmmYYDate('today')?>
</h3>
<hr>
<br>
<h3>3. Create a function that will accept a string input.  It will do the following things to the string:<br>

<h4>
<?php stringInputResults( "   Hello DMACC, I'm a Web Dev. Student");?>
</h4>

<hr>

<h3>4. Create a function that will accept a number and display it as a formatted phone number.   Use 1234567890 for your testing.<br><br>
<?php echo phone_Forma(1234567890);?>
</h3>

<hr>
<h3>5. Create a function that will accept a number and display it as US currency with a dollar sign.  Use 123456 for your testing.<br><br>
<?php formatMoney(123456);?>
</h3>
</div>
</body>
</html>
