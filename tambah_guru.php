// Ambil data dari form
$kd_guru   = $_POST['kd_guru'];
$nama_guru = $_POST['nama_guru'];
$pass_def  = '1234'; // Password default dari tugas
$role      = 'guru';

// 1. Simpan ke tabel guru
$insertGuru = mysqli_query($koneksi, "INSERT INTO guru (kd_guru, nama_guru) VALUES ('$kd_guru', '$nama_guru')");

// 2. Simpan ke tabel user (untuk login)
$insertUser = mysqli_query($koneksi, "INSERT INTO user (username, password, role) VALUES ('$kd_guru', '$pass_def', '$role')");

if($insertGuru && $insertUser){
    echo "Data Berhasil Disimpan!";
}