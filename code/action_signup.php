<?php
// connect
$link = mysqli_connect("localhost", "hradutiu", "parola", "maindb");

// variables to fill with results
$succes = false;
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// build query
$query = "SELECT * FROM `users` WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'";

// run query
$result = mysqli_query($link, $query);

// fetch results from query
$row = mysqli_fetch_array($result);

// if we dont get any rows, means user is not already registered
if (!isset($row)) {
    $succes = true;
    $query = "INSERT INTO `Users` (`first_name`,`last_name`,`email`, `password`) VALUES ('" . mysqli_real_escape_string($link, $_POST['first_name']) . "', '" . mysqli_real_escape_string($link, $_POST['last_name']) . "', '" . mysqli_real_escape_string($link, $_POST['email']) . "', '" . mysqli_real_escape_string($link, $_POST['password']) . "')";
    mysqli_query($link, $query);

    // sending email
    mail($_POST['email'], "Activate Tesla Account", "http://localhost/programs/Tesla/code/login.php?code=" . mysqli_real_escape_string($link, $_POST['email']), "From: horatiuradutiu@gmail.com");
}

// return results
echo json_encode(array(
    'success' => $succes,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
));
