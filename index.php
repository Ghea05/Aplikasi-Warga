<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Warga RT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Warga RT</h2>
    <form method="GET" action="">
        <input type="text" name="cari" placeholder="Cari Nama..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
        <button type="submit">Cari</button>
        <a href="tambah.php">+ Tambah Data</a>
    </form>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No. KK</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $where = "";
        if (isset($_GET['cari'])) {
            $cari = mysqli_real_escape_string($conn, $_GET['cari']);
            $where = "WHERE nama_lengkap LIKE '%$cari%'";
        }
        $sql = mysqli_query($conn, "SELECT * FROM warga $where ORDER BY id DESC");
        while ($data = mysqli_fetch_assoc($sql)) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nama_lengkap'] ?></td>
            <td><?= $data['nomor_kk'] ?></td>
            <td><?= $data['nik'] ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['status'] ?></td>
            <td>
                <a href="edit.php?id=<?= $data['id'] ?>">Edit</a> | 
                <a href="hapus.php?id=<?= $data['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
