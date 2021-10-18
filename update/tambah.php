<?php
//dipanggil function 
require 'function.php';

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["tambah"]))
    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0){
        echo"
        <script>
            alert('data telah berhasil ditambahkan!');
            document.location.href = 'index.php';

        </scrip>
        ";
    } else {
        echo"
        <script>
            alert('data telah gagal ditambahkan!');
            document.location.href = 'index.php';

        </scrip>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<body>
    <h1>Tambah Data Siswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nim">NIM:</label>
                <input type="text" name="nim" id="nim" required>
            </li>
            <li>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nim">Email:</label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="nim">Jurusan:</label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="nim">Gambar:</label>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="sumbit" name="tambah">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>