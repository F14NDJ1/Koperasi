<?php
session_start();
include "../config/koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
if (empty($username) || empty($password)) {
echo "<div class='alert'>
<button type='button' class='close' data-dismiss='alert'>×</button>
<strong>Peringatan!</strong> Username atau password anda belum diisi!</div>";
} else {
$a = "select * from admin where username='$username'";
$b = mysqli_query($koneksi, $a);
$c = mysqli_fetch_array($b);
if ($username <> $c['username']) {
    echo "<div class='alert'>
<button type='button' class='close' data-dismiss='alert'>×</button>
<strong>Peringatan!</strong> Username anda salah!</div>";
} elseif ($password <> $c['password']) {
    echo "<div class='alert'>
<button type='button' class='close' data-dismiss='alert'>×</button>
<strong>Peringatan!</strong> Password anda salah!</div>";
} else {
    $_SESSION['username'] = $c['username'];
    $_SESSION['password'] = $c['password'];
    header("location:dashboard/konten.php");
}
}
?>