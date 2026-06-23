<?php
session_start();
include 'config/database.php';

// Jika sudah login
if(isset($_SESSION['login'])){
    header("Location: dashboard.php");
    exit;
}

$error = "";

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("
        SELECT id_user,nama,username,password,role
        FROM users
        WHERE username=?
        LIMIT 1
    ");

    $stmt->bind_param("s",$username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){

            $_SESSION['login']   = true;
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['nama']    = $user['nama'];
            $_SESSION['role']    = $user['role'];

            header("Location: dashboard.php");
            exit;

        }else{
            $error = "Password salah!";
        }

    }else{
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login POS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background: linear-gradient(135deg,#0d6efd,#6610f2);
    height:100vh;
}

.login-card{
    border:none;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.2);
}

.logo{
    font-size:60px;
    color:#0d6efd;
}

</style>

</head>
<body>

<div class="container">

<div class="row justify-content-center align-items-center vh-100">

<div class="col-md-4">

<div class="card login-card">

<div class="card-body p-4">

<div class="text-center mb-4">
<i class="bi bi-shop logo"></i>
<h3 class="fw-bold">POS KASIR</h3>
<p class="text-muted">Silakan Login</p>
</div>

<?php if($error != "") : ?>
<div class="alert alert-danger">
    <?= $error; ?>
</div>
<?php endif; ?>

<form method="POST">

<div class="mb-3">
<label class="form-label">
Username
</label>

<input
type="text"
name="username"
class="form-control"
required>
</div>

<div class="mb-3">
<label class="form-label">
Password
</label>

<input
type="password"
name="password"
class="form-control"
required>
</div>

<button
type="submit"
name="login"
class="btn btn-primary w-100">

<i class="bi bi-box-arrow-in-right"></i>
Login

</button>

</form>

</div>
</div>

</div>

</div>

</div>

</body>
</html>