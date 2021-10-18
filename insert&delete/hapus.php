<?php
require 'function.php';

$id = $_GET["id"];

if (hapus($id) > 0){
    echo "
    <script>
        alert('data telah berhasil dihapus!');
        document.location.href = 'index.php';

    </scrip>
    ";
} else {
    echo "
    <script>
        alert('data telah gagal dihapus!');
        document.location.href = 'index.php';

    </scrip>
    ";
}
?>