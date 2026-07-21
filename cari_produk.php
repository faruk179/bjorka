<?php

include '../config/database.php';

$keyword = $_GET['keyword'];

$data = mysqli_query($conn,"
SELECT *
FROM produk

WHERE nama_produk
LIKE '%$keyword%'
LIMIT 10
");

while($d=mysqli_fetch_assoc($data)){
?>

<div class="border p-2">

<b><?= $d['nama_produk'] ?></b>

<br>

Rp <?= number_format($d['harga_jual']) ?>

<a
href="tambah_cart.php?id=<?= $d['id_produk'] ?>"
class="btn btn-primary btn-sm float-end">

Tambah

</a>

</div>

<?php } ?>