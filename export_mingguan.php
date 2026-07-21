<?php
include '../config/auth.php';
include '../config/database.php';

header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Mingguan.xls");

$tanggal = date('Y-m-d');

$data = mysqli_query($conn,"
SELECT *
FROM transaksi
WHERE DATE(tanggal)='$tanggal'
ORDER BY id_transaksi DESC
");
?>

<table border="1">

<tr>
    <th>No</th>
    <th>No Transaksi</th>
    <th>Tanggal</th>
    <th>Total</th>
    <th>Bayar</th>
    <th>Kembalian</th>
</tr>

<?php
$no=1;
while($d=mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['no_transaksi']; ?></td>

<td><?= $d['tanggal']; ?></td>

<td><?= $d['total']; ?></td>

<td><?= $d['bayar']; ?></td>

<td><?= $d['kembalian']; ?></td>

</tr>

<?php } ?>

</table>