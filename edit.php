<?php
include '../config/auth.php';
include '../config/database.php';

$id=$_GET['id'];

if($id==$_SESSION['id_user']){

echo "<script>
alert('Tidak bisa menghapus akun sendiri');
window.location='index.php';
</script>";

exit;
}

mysqli_query($conn,"
DELETE FROM users
WHERE id_user='$id'
");

header("Location:index.php");
exit;