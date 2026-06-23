<?php

include 'config/database.php';

$nama = "Administrator";
$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);
$role = "admin";

$sql = "INSERT INTO users
(nama,username,password,role)
VALUES
(
'$nama',
'$username',
'$password',
'$role'
)";

if(mysqli_query($conn,$sql)){
    echo "Admin berhasil dibuat<br>";
    echo "Username : admin<br>";
    echo "Password : admin123";
}else{
    echo mysqli_error($conn);
}