<?php
include '../config/auth.php';
include '../config/database.php';

if($_SESSION['role']!='admin'){
    header("Location: ../dashboard.php");
    exit;
}

$data = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM pengaturan_toko LIMIT 1"
)
);

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_toko'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    if($_FILES['logo']['name']!=""){

        $logo = time()."_".$_FILES['logo']['name'];

        move_uploaded_file(
        $_FILES['logo']['tmp_name'],
        "../assets/img/logo/".$logo
        );

        mysqli_query($conn,"
        UPDATE pengaturan_toko
        SET logo='$logo'
        ");
    }

    mysqli_query($conn,"
    UPDATE pengaturan_toko SET

    nama_toko='$nama',
    alamat='$alamat',
    telepon='$telepon'
    ");

    echo "
    <script>
    alert('Pengaturan berhasil disimpan');
    location='index.php';
    </script>
    ";
}
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/navbar.php'; ?>

<div class="container-fluid">
<div class="row">

<?php include '../includes/sidebar.php'; ?>

<div class="col-md-10 p-4">

<div class="card">

<div class="card-header">
Pengaturan Toko
</div>

<div class="card-body">

<form method="POST"
enctype="multipart/form-data">

<div class="mb-3">
<label>Nama Toko</label>
<input type="text"
name="nama_toko"
class="form-control"
value="<?= $data['nama_toko'] ?>">
</div>

<div class="mb-3">
<label>Alamat</label>
<textarea
name="alamat"
class="form-control"><?= $data['alamat'] ?></textarea>
</div>

<div class="mb-3">
<label>Telepon</label>
<input type="text"
name="telepon"
class="form-control"
value="<?= $data['telepon'] ?>">
</div>

<div class="mb-3">
<label>Logo</label>
<input type="file"
name="logo"
class="form-control">
</div>

<button
name="simpan"
class="btn btn-primary">

Simpan

</button>

</form>

</div>

</div>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>