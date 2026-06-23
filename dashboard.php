<?php

include 'config/auth.php';
include 'config/database.php';

$chart = mysqli_query($conn,"
SELECT
DATE(tanggal) tanggal,
SUM(total) total

FROM transaksi

GROUP BY DATE(tanggal)

ORDER BY tanggal ASC

LIMIT 7
");

$total_produk = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM produk")
);

$total_kategori = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM kategori")
);

$total_transaksi = mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM transaksi
WHERE DATE(tanggal)=CURDATE()"
)
);

$pendapatan = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT SUM(total) total
FROM transaksi
WHERE DATE(tanggal)=CURDATE()"
)
);

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container-fluid">

<div class="row">

<?php include 'includes/sidebar.php'; ?>

<div class="col-md-10 p-4">

<h3>Dashboard</h3>

<div class="row">

<div class="col-md-3">

<div class="card bg-primary text-white">

<div class="card-body">

<h5>Total Produk</h5>

<h2>
<?= $total_produk ?>
</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-success text-white">

<div class="card-body">

<h5>Kategori</h5>

<h2>
<?= $total_kategori ?>
</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-warning text-white">

<div class="card-body">

<h5>Transaksi Hari Ini</h5>

<h2>
<?= $total_transaksi ?>
</h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-danger text-white">

<div class="card-body">

<h5>Pendapatan</h5>

<h5>

Rp <?= number_format($pendapatan['total']) ?>

</h5>

</div>

</div>

</div>

</div>

</div>

</div>

</div>
