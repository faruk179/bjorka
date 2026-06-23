<?php

include 'config/database.php';

$data = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT * FROM users WHERE username='admin'")
);

echo "<pre>";
print_r($data);
echo "</pre>";

echo "<hr>";

echo "admin123 : ";
var_dump(password_verify("admin123", $data['password']));

echo "<br>";

echo "password : ";
var_dump(password_verify("password", $data['password']));