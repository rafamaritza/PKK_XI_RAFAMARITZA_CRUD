<?php
require 'function.php';
// ini bukan FORM tapi FROM
$siswa = query("SELECT * FROM siswa");
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" ccontent="width=device-width, initial-3cale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Siswa</h1>
    <a hreff="tambah.php">Tambah data siswa</a>
    <br>

    <table border="1" cellpadding='10' cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Aksi</td>
            <td>Gambar</td>
            <td>NIM</td>
            <td>Nama</td>
            <td>Email</td>>
            <td>Jurusan</td>
        </tr>
        <?php $i = 1;?>
        <?php foreach ($siswa as $sws): ?>
            <tr>
            <td><?= $i?></td>
            <td>
                <a href="ubah.php">ubah</a>
                <a href="hapus.php?id<?= $sws["id"]?>"
                onclick="return confirm('yakin mau dihapus?');">hapus</a>
            </td>
            <td><img scr="img/<?= $sws["gambar"]?>" alt="" width="100"></td>
            <td><?= $sws["nim"]?></td>
            <td><?= $sws["nama"]?></td>
            <td><?= $sws["email"]?></td>>
            <td><?= $sws["jurusan"]?></td>
        </tr>
    <?php $i++ ?>
    <?php endforeach; ?>


</body>
</html>