\<?php
include '../config/auth.php';
include '../config/database.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    mysqli_query($conn,"
    INSERT INTO users(nama,username,password,role)
    VALUES('$nama','$username','$password','$role')
    ");

    header("Location:index.php");
    exit;
}

include '../includes/header.php';
include '../includes/navbar.php';
?>

<div class="container-fluid">
<div class="row">

<?php include '../includes/sidebar.php'; ?>

<div class="col-md-10 p-4">

<div class="card">
<div class="card-header">
Tambah User
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
<label>Username</label>
<input type="text" name="username" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label>Role</label>

<select name="role" class="form-select">
<option value="admin">Admin</option>
<option value="kasir">Kasir</option>
</select>

</div>

<button name="simpan" class="btn btn-primary">
Simpan
</button>

<a href="index.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>
</div>

</div>
</div>
</div>

<?php include '../includes/footer.php'; ?>