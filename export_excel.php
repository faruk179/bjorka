<?php
include '../config/auth.php';
include '../config/database.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Transaksi.xls");
header("Pragma: no-cache");
header("Expires: 0");

$data = mysqli_query($conn,"
SELECT
    transaksi.id_transaksi,
    transaksi.tanggal,
    transaksi.total,
    transaksi.bayar,
    transaksi.kembali,
    users.nama
FROM transaksi
LEFT JOIN users
ON transaksi.id_user = users.id_user
ORDER BY transaksi.tanggal DESC
");
?>

<table border="1">

<tr style="background:#cccccc;">
    <th>No</th>
    <th>Tanggal</th>
    <th>Kasir</th>
    <th>Total</th>
    <th>Bayar</th>
    <th>Kembali</th>
</tr>

<?php
$no=1;

while($d=mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['tanggal'] ?></td>

<td><?= $d['nama'] ?></td>

<td><?= number_format($d['total']) ?></td>

<td><?= number_format($d['bayar']) ?></td>

<td><?= number_format($d['kembali']) ?></td>

</tr>

<?php } ?>

</table>