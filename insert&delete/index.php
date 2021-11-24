<?php
require 'function.php';
$siswa = query("SELECT * FROM siswa");

//tombol cari ditekan

if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Halaman Admin</title>
</head>

<body>
    
    <div>
        <h1>Daftar Siswa</h1>
        <a href="tambah.php" class="btn btn-primary">Tambah data siswa</a>
        <br/>
        <br/>
    </div>

    <from action="" method="post" class="row g-3">
        <div class="col-auto col-sm-4">
            <input type="text" name="keyword" id="" autofocus
            placeholder="Masukan keyword pencarian!" autocompalete="off" class="form-control"> 
        </div>
            <div class="col-auto">
                <button type="submit" name="cari!" class="btn btn-primary mb-2"> CARI ! </button>
            </div>
    </from>
    <br />
    
    <div class="container">
        <div class="row">

    <table class="table table-hover table-bordered text-center">
        <thead>
            <tr class="table-primary">
                <th>No</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach ($siswa as $sws) : ?>
            <tr>
                <td ><?= $i ?></td>
                <td>
                    <a href="ubah.php" class="btn btn-success">UBAH</a>
                    <a href="hapus.php?id=<?= $sws["id"] ?>" onclick="return confirm('yakin mau dihapus?');" class="btn btn-danger">HAPUS</a>
                </td>
                <td><img src="img/<?= $sws["gambar"] ?>" alt="" width="100"></td>
                <td><?= $sws["nim"] ?></td>
                <td><?= $sws["nama"] ?></td>
                <td><?= $sws["email"] ?></td>
                <td><?= $sws["jurusan"] ?></td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </table>
    
    </div>
</div>

</body>

</html>