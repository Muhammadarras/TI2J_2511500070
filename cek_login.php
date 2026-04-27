<?php
session_start();
include "config/koneksi.php";

$username = $_POST['Username'];
$password = $_POST['Password'];

$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE Username='$username' AND Password='$password'");

if (!$query) {
    die("Error pada Query: " . mysqli_error($koneksi));
}
$jml = mysqli_num_rows($query);
if($jml > 0){
    $data = mysqli_fetch_array($query);
    $_SESSION['Username'] = $data['Username'];
    $_SESSION['Nama_lengkap'] = $data['Nama_lengkap'];
    header("location:index.php");
} else {
    
    echo "<h3>Login Gagal!</h3>";
    echo "Username di Input: [" . $username . "]<br>";
    echo "Password di Input: [" . $password . "]<br>";
    echo "Jumlah data ditemukan di DB: " . $jml . "<br>";
    echo "<a href='login.php'>Kembali</a>";
}

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$data  = mysqli_fetch_array($query);
$jml   = mysqli_num_rows($query);

if($jml > 0){
    $_SESSION['username'] = $data['username'];
    $_SESSION['role']     = $data['role']; 

    if($data['role'] == 'admin'){
        header("location:admin/index.php");
    } elseif($data['role'] == 'guru'){
        header("location:guru/index.php");
    } else {
        header("location:siswa/index.php");
    }
}
?>