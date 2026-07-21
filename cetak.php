<?php

include '../config/database.php';

$id = $_GET['id'];

$trx = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT *
FROM transaksi
WHERE id_transaksi='$id'"
)
);

$detail = mysqli_query($conn,"
SELECT

detail_transaksi.*,
produk.nama_produk

FROM detail_transaksi

JOIN produk
ON detail_transaksi.id_produk=
produk.id_produk

WHERE id_transaksi='$id'
");
?>

<!DOCTYPE html>
<html>
<head>

<title>Struk</title>

<style>

<div class="mt-3">

<button
onclick="window.print()"
class="btn btn-primary">

Cetak Struk

</button>

<a
href="index.php"
class="btn btn-secondary">

Kembali

</a>

</div>

body{
font-family:monospace;
width:300px;
}

</style>

</head>

<body onload="window.print()">

<center>

<h3>POS KASIR</h3>

=================

</center>

<?php while($d=mysqli_fetch_assoc($detail)){ ?>

<?= $d['nama_produk'] ?>

<br>

<?= $d['qty'] ?>

x

<?= number_format($d['harga']) ?>

=

<?= number_format($d['subtotal']) ?>

<br>

<?php } ?>

<hr>

Total :
<?= number_format($trx['total']) ?>

<br>

Bayar :
<?= number_format($trx['bayar']) ?>

<br>

Kembali :
<?= number_format($trx['kembalian']) ?>

<br><br>

<center>

Terima Kasih

</center>

</body>
</html>
<br><br>

<center>

<button onclick="window.print();">
    Cetak Lagi
</button>

<a href="index.php">
    <button>
        Kembali ke Kasir
    </button>
</a>

</center>