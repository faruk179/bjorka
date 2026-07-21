<?php
include '../config/auth.php';
include '../config/database.php';

$tanggal = date('Y-m-d');

$data = mysqli_query($conn,"
SELECT *
FROM transaksi
WHERE DATE(tanggal)='$tanggal'
ORDER BY id_transaksi DESC
");

$total = mysqli_fetch_assoc(
mysqli_query($conn,"
SELECT SUM(total) total
FROM transaksi
WHERE DATE(tanggal)='$tanggal'
")
);

include '../includes/header.php';
include '../includes/navbar.php';
?>

<div class="container-fluid">
<div class="row">

<?php include '../includes/sidebar.php'; ?>

<div class="col-md-10 p-4">

<h3>Laporan Harian</h3>

<div class="card mb-3">
<div class="card-body">

<div class="mb-3 d-flex gap-2">

    <a href="index.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <a href="export_excel.php" class="btn btn-success">
Export Excel
</a>

</div>


</div>

<div class="card">
<div class="card-body">

<table class="table table-bordered datatable">

<thead>

<tr>
<th>No Transaksi</th>
<th>Tanggal</th>
<th>Total</th>
<th>Bayar</th>
<th>Kembalian</th>
</tr>

</thead>

<tbody>

<?php while($d=mysqli_fetch_assoc($data)){ ?>

<tr>

<td><?= $d['no_transaksi'] ?></td>

<td><?= $d['tanggal'] ?></td>

<td><?= number_format($d['total']) ?></td>

<td><?= number_format($d['bayar']) ?></td>

<td><?= number_format($d['kembalian']) ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>
</div>

</div>
</div>
</div>

<?php include '../includes/footer.php'; ?>