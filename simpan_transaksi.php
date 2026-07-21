<?php

session_start();

include '../config/database.php';

$total = $_POST['total'];
$bayar = $_POST['bayar'];

$kembalian = $bayar - $total;

$no =
"TRX".
date("YmdHis");

mysqli_query($conn,"
INSERT INTO transaksi(

no_transaksi,
total,
bayar,
kembalian,
id_user

)

VALUES(

'$no',
'$total',
'$bayar',
'$kembalian',
'".$_SESSION['id_user']."'

)
");

$id_transaksi =
mysqli_insert_id($conn);

$cart = mysqli_query($conn,"
SELECT
cart.*,
produk.harga_jual

FROM cart

JOIN produk
ON cart.id_produk=produk.id_produk
");

while($d=mysqli_fetch_assoc($cart)){

$subtotal =
$d['harga_jual'] *
$d['qty'];

mysqli_query($conn,"
INSERT INTO detail_transaksi(

id_transaksi,
id_produk,
qty,
harga,
subtotal

)

VALUES(

'$id_transaksi',
'".$d['id_produk']."',
'".$d['qty']."',
'".$d['harga_jual']."',
'$subtotal'

)
");

mysqli_query($conn,"
UPDATE produk
SET stok=stok-'".$d['qty']."'
WHERE id_produk='".$d['id_produk']."'
");

}

mysqli_query($conn,"
TRUNCATE TABLE cart
");

header(
"Location:cetak.php?id=".$id_transaksi
);