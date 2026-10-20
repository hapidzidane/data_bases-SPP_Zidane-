<?php
session_start();

// Menghubungkan PHP dengan database
include 'src/koneksi.php';

// Menangkap data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Mengecek username dan password
$login = mysqli_query($koneksi, "SELECT * FROM petugas
    WHERE username='$username' AND password='$password'")
    or die("Query error: " . mysqli_error($koneksi));

$cek = mysqli_num_rows($login);

// Mengecek apakah username dan password ditemukan
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // Jika login sebagai admin
    if ($data['level'] == "admin") {

        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = "admin";
        $_SESSION['id_petugas'] = $data['id_petugas'];

        echo '<script>
                alert("Anda berhasil Login Admin!");
                window.location="admin/halaman_admin.php";
              </script>';
        exit();

    // Jika login sebagai petugas
    } elseif ($data['level'] == "petugas") {

        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = "petugas";
        $_SESSION['id_petugas'] = $data['id_petugas'];

        echo '<script>
                alert("Anda berhasil Login Petugas!");
                window.location="petugas/halaman_petugas.php";
              </script>';
        exit();

    } else {

        header("location:index.php?pesan=gagal");
        exit();
    }

} else {

    header("location:index.php?pesan=gagal");
    exit();
}
?>