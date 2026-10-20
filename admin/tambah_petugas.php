<?php

include_once "../src/koneksi.php";

// SKRIP TOMBOL SIMPAN DIKLIK
if (isset($_POST['btnSimpan'])) {

    $id_petugas   = $_POST['id_petugas'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level        = $_POST['level'];

    // Validasi Form Inputs
    $pesanError = array();

    if (trim($id_petugas) == "") {
        $pesanError[] = "Data <b>id petugas</b> tidak boleh kosong!";
    }

    if (trim($username) == "") {
        $pesanError[] = "Data <b>username</b> tidak boleh kosong!";
    }

    if (trim($password) == "") {
        $pesanError[] = "Data <b>password</b> tidak boleh kosong!";
    }

    if (trim($nama_petugas) == "") {
        $pesanError[] = "Data <b>nama petugas</b> tidak boleh kosong!";
    }

    if (trim($level) == "") {
        $pesanError[] = "Data <b>level</b> tidak boleh kosong!";
    }

    // Menampilkan Pesan Error
    if (count($pesanError) >= 1) {

        $noPesan = 0;

        foreach ($pesanError as $indeks => $pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }

        echo "<br>";

    } else {

        // Simpan data ke database
        $sql = mysqli_query($koneksi, "INSERT INTO petugas
            (id_petugas, username, password, nama_petugas, level)
            VALUES
            ('$id_petugas', '$username', MD5('$password'), '$nama_petugas', '$level')
        ");

        if ($sql) {

            echo "
            <center>
                <font color='red' size='4'>
                    <p><b>Data Berhasil Disimpan!</b></p>
                </font>
            </center>
            <br>
            ";
            echo "<meta http-equiv='refresh' content='2;url=?open=data_petugas'>";
            exit;

        } else {
            echo "
            <center>
                <font color='red' size='4'>
                    <p><b>Data Gagal Disimpan!</b></p>
                </font>
            </center>
            ";

            // Tampilkan penyebab error
            echo "<p><b>Error MySQL:</b> " . mysqli_error($koneksi) . "</p>";
        }
    }
}
?>
<form action="?open=tambah_petugas" method="post">

    <table cellspacing="1" cellpadding="3">

        <tr>
            <td colspan="3" bgcolor="#CCCCCC">
                <strong>TAMBAH DATA PETUGAS</strong>
            </td>
        </tr>

        <tr>
            <td>ID Petugas</td>
            <td>:</td>
            <td>
                <input
                    name="id_petugas"
                    type="text"
                    size="10"
                    maxlength="10"
                >
            </td>
        </tr>

        <tr>
            <td>Username</td>
            <td>:</td>
            <td>
                <input
                    name="username"
                    type="text"
                    size="50"
                    maxlength="50"
                >
            </td>
        </tr>

        <tr>
            <td>Password</td>
            <td>:</td>
            <td>
                <input
                    name="password"
                    type="password"
                    size="50"
                    maxlength="50"
                >
            </td>
        </tr>

        <tr>
            <td>Nama Petugas</td>
            <td>:</td>
            <td>
                <input
                    name="nama_petugas"
                    type="text"
                    size="50"
                    maxlength="50"
                >
            </td>
        </tr>

        <tr>
            <td>Level</td>
            <td>:</td>
            <td>
                <select name="level">

                    <option value="">
                        -- Pilih Level --
                    </option>

                    <option value="Admin">
                        Admin
                    </option>

                    <option value="Petugas">
                        Petugas
                    </option>

                </select>
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>
                <input
                    name="btnSimpan"
                    type="submit"
                    value="Simpan"
                >
            </td>
        </tr>

    </table>

</form>