<?php

include '../config/database.php';

$id = $_GET['id'];

$cek = mysqli_query($conn,"
SELECT *
FROM cart
WHERE id_produk='$id'
");

if(mysqli_num_rows($cek) > 0){

    mysqli_query($conn,"
    UPDATE cart
    SET qty = qty + 1
    WHERE id_produk='$id'
    ");

}else{

    mysqli_query($conn,"
    INSERT INTO cart(
        id_produk,
        qty
    )
    VALUES(
        '$id',
        '1'
    )
    ");

}

header("Location: index.php");
exit;