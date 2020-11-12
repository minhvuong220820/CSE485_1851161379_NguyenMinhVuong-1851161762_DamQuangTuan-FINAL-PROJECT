<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "projectdb");
	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
?>