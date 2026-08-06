<?php
include '../config/auth.php';
include '../config/database.php';

include '../includes/header.php';
include '../includes/navbar.php';
?>

<div class="container-fluid">
<div class="row">

<?php include '../includes/sidebar.php'; ?>

<div class="col-md-10 p-4">

<div class="card shadow border-0">

<div class="card-header bg-primary text-white">
<h4><i class="bi bi-credit-card"></i> Payment</h4>
</div>

<div class="card-body">

<form action="simpan.php" method="POST">

<div class="row">

<div class="col-md-6">

<div class="mb-3">
<label>No Transaksi</label>
<input type="text"
name="no_transaksi"
class="form-control"
value="TRX<?= date('YmdHis'); ?>"
readonly>
</div>

<div class="mb-3">
<label>Total Belanja</label>
<input type="number"
name="total"
id="total"
class="form-control"
placeholder="Masukkan Total Belanja"
required>
</div>

<div class="mb-3">

<label>Metode Pembayaran</label>

<select
name="metode"
id="metode"
class="form-select"
required>

<option value="">Pilih Pembayaran</option>

<option value="Tunai">💵 Tunai</option>

<option value="QRIS">📱 QRIS</option>

<option value="Transfer">🏦 Transfer</option>

<option value="Debit">💳 Debit</option>

<option value="Kredit">💳 Kredit</option>

</select>

</div>

</div>

<div class="col-md-6">

<div id="qrisBox" style="display:none;" class="mt-4">

    <div class="card border-success shadow">

        <div class="card-header bg-success text-white">
            <i class="bi bi-qr-code"></i>
            Pembayaran QRIS
        </div>

        <div class="card-body text-center">

            <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=Pembayaran%20QRIS"
     class="img-fluid rounded"
     width="300"
     alt="QRIS">

            <h5 class="mt-3">Silakan Scan QRIS</h5>

        </div>

    </div>

</div>

<!-- Transfer -->
<div id="transferBox" style="display:none;" class="mt-4">

    <div class="card border-primary shadow">

        <div class="card-header bg-primary text-white">
            <i class="bi bi-bank"></i>
            Transfer Bank
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <td><b>Bank BCA</b></td>
                    <td>1234567890</td>
                    <td>a.n. Bekti Store</td>
                </tr>

                <tr>
                    <td><b>Bank BRI</b></td>
                    <td>9876543210</td>
                    <td>a.n. Bekti Store</td>
                </tr>

                <tr>
                    <td><b>Bank Mandiri</b></td>
                    <td>1122334455</td>
                    <td>a.n. Bekti Store</td>
                </tr>

                <tr>
                    <td><b>Bank BNI</b></td>
                    <td>5566778899</td>
                    <td>a.n. Bekti Store</td>
                </tr>

            </table>

            <div class="alert alert-info">
                Setelah transfer, silakan unggah bukti pembayaran atau tunjukkan kepada kasir.
            </div>

        </div>

    </div>

</div>

<!-- Debit -->
<div id="debitBox" style="display:none;" class="mt-4">

    <div class="card border-warning shadow">

        <div class="card-header bg-warning text-dark">
            <i class="bi bi-credit-card-2-front"></i>
            Pembayaran Kartu Debit
        </div>

        <div class="card-body">

            <h5>Bank yang Didukung</h5>

            <ul class="list-group">

                <li class="list-group-item">🏦 BCA Debit</li>
                <li class="list-group-item">🏦 BRI Debit</li>
                <li class="list-group-item">🏦 Mandiri Debit</li>
                <li class="list-group-item">🏦 BNI Debit</li>

            </ul>

            <div class="alert alert-warning mt-3">
                Gesek / Tap kartu debit pada mesin EDC kemudian tekan tombol <b>Simpan Payment</b>.
            </div>

        </div>

    </div>

</div>

<!-- Kredit -->
<div id="kreditBox" style="display:none;" class="mt-4">

    <div class="card border-danger shadow">

        <div class="card-header bg-danger text-white">
            <i class="bi bi-credit-card"></i>
            Pembayaran Kartu Kredit
        </div>

        <div class="card-body">

            <h5>Kartu yang Didukung</h5>

            <ul class="list-group">

                <li class="list-group-item">💳 VISA</li>
                <li class="list-group-item">💳 MasterCard</li>
                <li class="list-group-item">💳 JCB</li>
                <li class="list-group-item">💳 American Express</li>

            </ul>

            <div class="alert alert-danger mt-3">
                Gesek / Tap kartu kredit pada mesin EDC kemudian tekan tombol <b>Simpan Payment</b>.
            </div>

        </div>

    </div>

</div>

<!-- Tunai -->

<div id="tunaiBox">

<div class="mb-3">

<label>Bayar</label>

<input
type="number"
id="bayar"
name="bayar"
class="form-control">

</div>

<div class="mb-3">

<label>Kembalian</label>

<input
type="text"
id="kembalian"
class="form-control"
readonly>

</div>

</div>

</div>

</div>

<hr>

<div class="text-end">

<a href="../kasir/index.php"
class="btn btn-secondary">

<i class="bi bi-arrow-left"></i>

Kembali

</a>

<button
class="btn btn-success">

<i class="bi bi-check-circle"></i>

Simpan Payment

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>
<script>

document.addEventListener("DOMContentLoaded", function(){

    const metode = document.getElementById("metode");
    const qris = document.getElementById("qrisBox");
    const transfer = document.getElementById("transferBox");
    const debit = document.getElementById("debitBox");
    const kredit = document.getElementById("kreditBox");
    const tunai = document.getElementById("tunaiBox");

    metode.addEventListener("change", function(){

        qris.style.display="none";
        transfer.style.display="none";
        debit.style.display="none";
        kredit.style.display="none";
        tunai.style.display="none";

        if(this.value=="Tunai"){
            tunai.style.display="block";
        }

        if(this.value=="QRIS"){
            qris.style.display="block";
        }

        if(this.value=="Transfer"){
            transfer.style.display="block";
        }

        if(this.value=="Debit"){
            debit.style.display="block";
        }

        if(this.value=="Kredit"){
            kredit.style.display="block";
        }

    });

    const bayar = document.getElementById("bayar");

    if(bayar){
        bayar.addEventListener("keyup", function(){

            let total = parseInt(document.getElementById("total").value) || 0;
            let uang = parseInt(this.value) || 0;

            document.getElementById("kembalian").value = uang - total;

        });
    }

});

</script>

<?php include '../includes/footer.php'; ?>