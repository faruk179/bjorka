<?php
include '../config/auth.php';
include '../config/database.php';

$id=$_GET['id'];

$data=mysqli_fetch_assoc(mysqli_query($conn,"
SELECT * FROM users
WHERE id_user='$id'
"));

if(isset($_POST['update'])){

$nama=$_POST['nama'];
$username=$_POST['username'];
$role=$_POST['role'];

mysqli_query($conn,"
UPDATE users SET
nama='$nama',
username='$username',
role='$role'
WHERE id_user='$id'
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
Edit User
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>Nama</label>
<input type="text"
name="nama"
class="form-control"
value="<?= $data['nama']; ?>"
required>
</div>

<div class="mb-3">
<label>Username</label>
<input type="text"
name="username"
class="form-control"
value="<?= $data['username']; ?>"
required>
</div>

<div class="mb-3">
<label>Role</label>

<select name="role" class="form-select">

<option value="admin" <?=($data['role']=='admin')?'selected':'';?>>
Admin
</option>

<option value="kasir" <?=($data['role']=='kasir')?'selected':'';?>>
Kasir
</option>

</select>

</div>

<button name="update" class="btn btn-primary">
Update
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