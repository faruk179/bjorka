<?php

require_once
'../assets/vendor/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

include '../config/database.php';

$html = '

<h2>Laporan Penjualan</h2>

<table border="1"
width="100%"
cellpadding="5">

<tr>

<th>No</th>
<th>Tanggal</th>
<th>Total</th>

</tr>

';

$no=1;

$data = mysqli_query($conn,"
SELECT *
FROM transaksi
");

while($d=mysqli_fetch_assoc($data)){

$html .= '

<tr>

<td>'.$no++.'</td>

<td>'.$d['tanggal'].'</td>

<td>'.$d['total'].'</td>

</tr>

';

}

$html .= '</table>';

$pdf = new Dompdf();

$pdf->loadHtml($html);

$pdf->setPaper(
'A4',
'portrait'
);

$pdf->render();

$pdf->stream(
"laporan.pdf",
array(
"Attachment"=>false
)
);
<a href="export_pdf.php"
class="btn btn-danger">

Export PDF

</a>