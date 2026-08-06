<?php
include '../config/auth.php';
include '../config/database.php';

$no_transaksi = $_POST['no_transaksi'];
$total        = $_POST['total'];
$metode       = $_POST['metode'];

$bayar = 0;
$kembalian = 0;

if($metode == "Tunai"){
    $bayar = $_POST['bayar'];
    $kembalian = $bayar - $total;
}

$sql = "INSERT INTO payment
(no_transaksi,total,metode,bayar,kembalian)
VALUES
('$no_transaksi','$total','$metode','$bayar','$kembalian')";

if(mysqli_query($conn,$sql)){
    echo "<script>
    alert('Payment berhasil disimpan');
    window.location='index.php';
    </script>";
}else{
    die("Error Database : ".mysqli_error($conn));
}
?>