<?php
//dipanggil function 
require 'function.php';

//diambil dari URL
$id = $_GET["id"];

//query untuk menentukan berdasarkan ID
$sws = query("SELECT * FROM siswa WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["update"]))
    //cek apakah data berhasil ditambahkan atau tidak
    if (ubah($_POST) > 0){
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