<?php

include '../config/database.php';

$id = $_GET['id'];

mysqli_query(
$conn,
"DELETE FROM cart
WHERE id_cart='$id'"
);

header("Location:index.php");