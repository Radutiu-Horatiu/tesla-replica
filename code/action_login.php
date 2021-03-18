<?php
// connect
$link = mysqli_connect("localhost", "hradutiu", "parola", "maindb");

// variables to fill with results
$succes = false;
$first_name = "";
$last_name = "";

// build query
$query = "SELECT * FROM `users` WHERE 
        email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'
        AND password = '" . mysqli_real_escape_string($link, $_POST['password']) . "'
        AND active = true";

// run query
$result = mysqli_query($link, $query);

// fetch results from query
$row = mysqli_fetch_array($result);

// if we retrieved some rows from the database means login is successfull
if (isset($row)) {
    $succes = true;
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
}

// return results
echo json_encode(array(
    'success' => $succes,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $_POST['email']
));
