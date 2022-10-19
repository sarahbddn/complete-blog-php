<?php 
	session_start();
	// connect to database
	//$conn = mysqli_connect("localhost", "root", "", "complete-blog-php");
	$conn = new PDO("mysql:host=localhost;dbname=complete-blog-php;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
    // define global constants
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/complete-blog-php/');
?>