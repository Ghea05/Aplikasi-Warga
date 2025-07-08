<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM warga WHERE id=$id");
$data = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Warga</title>
	 <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Warga</h2>
    <form method="POST" action="">
        <p>Nama Lengkap: <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" required></p>
        <p>Nomor KK: <input type="text" name="nomor_kk" value="<?= $data['nomor_kk'] ?>" required></p>
        <p>NIK: <input type="text" name="nik" value="<?= $data['nik'] ?>" required></p>
        <p>Alamat: <textarea name="alamat" required><?= $data['alamat'] ?></textarea></p>
        <p>Status: 
            <select name="status" required>
                <option <?= $data['status'] == 'Kepala Keluarga' ? 'selected' : '' ?>>Kepala Keluarga</option>
                <option <?= $data['status'] == 'Anggota Keluarga' ? 'selected' : '' ?>>Anggota Keluarga</option>
            </select>
        </p>
        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="index.php">Batal</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama_lengkap'];
        $kk   = $_POST['nomor_kk'];
        $nik  = $_POST['nik'];
        $alamat = $_POST['alamat'];
        $status = $_POST['status'];

        $query = "UPDATE warga SET 
                    nama_lengkap='$nama',
                    nomor_kk='$kk',
                    nik='$nik',
                    alamat='$alamat',
                    status='$status'
                  WHERE id=$id";
        mysqli_query($conn, $query);
        header("Location: index.php");
    }
    ?>
</body>
</html>
