<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Warga</title>
	 <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Warga</h2>
    <form method="POST" action="">
        <p>Nama Lengkap: <input type="text" name="nama_lengkap" required></p>
        <p>Nomor KK: <input type="text" name="nomor_kk" required></p>
        <p>NIK: <input type="text" name="nik" required></p>
        <p>Alamat: <textarea name="alamat" required></textarea></p>
        <p>Status: 
            <select name="status" required>
                <option value="Kepala Keluarga">Kepala Keluarga</option>
                <option value="Anggota Keluarga">Anggota Keluarga</option>
            </select>
        </p>
        <button type="submit" name="simpan">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama_lengkap'];
        $kk   = $_POST['nomor_kk'];
        $nik  = $_POST['nik'];
        $alamat = $_POST['alamat'];
        $status = $_POST['status'];

        $query = "INSERT INTO warga (nama_lengkap, nomor_kk, nik, alamat, status) VALUES ('$nama', '$kk', '$nik', '$alamat', '$status')";
        mysqli_query($conn, $query);
        header("Location: index.php");
    }
    ?>
</body>
</html>
