<?php
$link = mysqli_connect("localhost", "hradutiu", "parola", "maindb");

// build query
if ($_POST['filter'] != 'all') {
    $query = "SELECT * FROM `News` WHERE category = '" . mysqli_real_escape_string($link, $_POST['filter']) . "'";

    // check for date
    if ($_POST['from'])
        $query .= " AND DATE >= '" . mysqli_real_escape_string($link, $_POST['from']) . "'";

    if ($_POST['to'])
        $query .= " AND DATE <= '" . mysqli_real_escape_string($link, $_POST['to']) . "'";
} else {
    $query = "SELECT * FROM `News`";

    // check for date
    if ($_POST['from'])
        $query .= " WHERE DATE >= '" . mysqli_real_escape_string($link, $_POST['from']) . "'";

    if ($_POST['to'])
        $query .= " AND DATE <= '" . mysqli_real_escape_string($link, $_POST['to']) . "'";
}

// run query
$result = mysqli_query($link, $query);

$posts = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($posts, $row);
}

// return results
echo json_encode(array(
    'data' => $posts,
    'query' => $query
));
