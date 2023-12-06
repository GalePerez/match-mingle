<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "matchmingle");
if (!$conn) {
	die("Error! Couldn't connect. " . mysqli_connect_error());
}


function cleanString($string)
{
	return $string = preg_replace("/&#?[a-z0-9]+;/i", "", $string);
}

function Secure($string, $censored_words = 0, $br = true, $strip = 0)
{
	global $conn;

	$string = trim($string);
	$string = cleanString($string);
	$string = mysqli_real_escape_string($conn, $string);
	$string = htmlspecialchars($string, ENT_QUOTES);
	if ($br == true) {
		$string = str_replace('\r\n', " <br>", $string);
		$string = str_replace('\n\r', " <br>", $string);
		$string = str_replace('\r', " <br>", $string);
		$string = str_replace('\n', " <br>", $string);
	} else {
		$string = str_replace('\r\n', "", $string);
		$string = str_replace('\n\r', "", $string);
		$string = str_replace('\r', "", $string);
		$string = str_replace('\n', "", $string);
	}
	if ($strip == 1) {
		$string = stripslashes($string);
	}
	$string = str_replace('&amp;#', '&#', $string);
	if ($censored_words == 1) {
		global $config;
		$censored_words = @explode(",", $config['censored_words']);
		foreach ($censored_words as $censored_word) {
			$censored_word = trim($censored_word);
			$string        = str_replace($censored_word, '****', $string);
		}
	}
	return $string;
}
