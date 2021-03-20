<?php
$link = mysqli_connect("localhost", "hradutiu", "parola", "maindb");

// build query
$query = "UPDATE `News` SET text = '" . mysqli_real_escape_string($link, $_POST['text']) . "' WHERE title = '" . mysqli_real_escape_string($link, $_POST['title']) . "'";

// run query
$result = mysqli_query($link, $query);

// return results
echo json_encode(array(
    'query' => $query
));
