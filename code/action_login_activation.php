<?php
// connect
$link = mysqli_connect("localhost", "hradutiu", "parola", "maindb");

// build query
$query = "SELECT * FROM `users` WHERE 
        email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'";

// run query
$result = mysqli_query($link, $query);

// fetch results from query
$row = mysqli_fetch_array($result);

// return results
echo json_encode(array(
    'first_name' => $row['first_name'],
    'last_name' => $row['last_name']
));
