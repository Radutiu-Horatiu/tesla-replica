<?php
// connect
$link = mysqli_connect("localhost", "hradutiu", "parola", "maindb");

// variables
$producer = $_POST['producer'];
$title = $_POST['title'];
$text = $_POST['text'];
$date = $_POST['date'];
$category = $_POST['category'];

// build query
$query = "INSERT INTO `News` VALUES (
'" . mysqli_real_escape_string($link, $_POST['producer']) . "', 
'" . mysqli_real_escape_string($link, $_POST['title']) . "', 
'" . mysqli_real_escape_string($link, $_POST['text']) . "', 
'" . mysqli_real_escape_string($link, $_POST['date']) . "', 
'" . mysqli_real_escape_string($link, $_POST['category']) . "')
";

// run query
mysqli_query($link, $query);