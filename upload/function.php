<?php
// koneksikan ke database

//urutannya "nama hostnya" , "user" , "password" , "nama database"
$koneksi = mysqli_connect ("localhost", "root", "", "pkk");

function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi,$query);
        $rows = [];
        while($sws = mysqli_fetch_assoc($result)){
                $rows[] = $sws;
        }
        // ini bukan rowns , tapi rows
        return $rows;
}

fungtion tambah ($data)
{
      global $koneksi;
      //ambil data dari form ( input )  
      $nim = htmlspecialchars($data["nim"]);
      $nama = htmlspecialchars($data["nama"]);
      $email = htmlspecialchars($data["email"]);
      $jurusan = htmlspecialchars($data["jurusan"]);
      $gambar = htmlspecialchars($data["gambar"]);

      //upload gambar 
      $gambar = upload();
      if (!$gambar) {
         return false;
      }

      //query insert data
      $query = "INSERT INTO siswa
      VALUES (id, '$nim', '$nama', '$email', '$jurusan', '$gambar')";
      mysqli_query($koneksi, $query);

      return mysqli_affected_rows ($koneksi);
}

function upload()
{
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        //cek apakah tidak ada gambar yang di upload
        if ($error === 4){
                echo   "<script>
                alert('pilih gambar terlebih dahuli');
                </script>";
                return false;
        }

        //cek apakah yang di upload adalah gambar 
        $ekstensiGambarValid = ['JPG', 'jpeg', 'png', 'jpg', 'PNG', 'JPEG'];
        $ekstensiGambar = explode('.', $namaFile);
        //fungsi emplode itu string array , kalau nama
        //filenya qibar,jpg itu menjadi ['qibar', 'jpg']
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
                echo "<script>
                alert('yang anda upload bukan gambar');
                </script>";
                return false;
        }

        //cek jika filenya ukurannya terlalu besar
        if ($ukuranFile)> 1000000 {
                echo "<script>
                alert('gambar yang anda upload terlalu besar');
                </script>";
                return false;
        }

        //lolos pengecekan , gambar siap diupload
        //dan generate nama baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;
}

function ubah($data){
        global $conn;
        //ambil dari data tiap elemen form
        $id = $data["id"];
        $nim = htmlspecialchars ($data["nim"]);
        $nama = htmlspecialchars ($data["nama"]);
        $email = htmlspecialchars ($data["email"]);
        $jurusan = htmlspecialchars ($data["jurusan"]);

        //cek apakah user pilih gambar baru atau tidak 
        $gambarLama = htmlspecialchars ($data["gambarLama"]);
        if ($_FILES['gambar']['error'] === 4) {
                $gambar = $gambarLama;
        }else{
                $gambar = upload();
        }

        //query insert data
        $query = "UPDATE mahasiswa SET
                        nim = '$nim',
                        nama = '$nama',
                        email = '$email',
                        jurusan = '$jurusan',
                        gambar = '$gambar'

                        WHERE id = $id
                        ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
}

function hapus($id)
{
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM siswa WHERE id = $id");
        return mysqli_affected_rows($koneksi);
}

function cari ($keyword){
        $query = "SELECT * FORM siswa
                        WHERE
                        nim LIKE '%$keyword%' OR
                        nama LIKE '%$keyword%' OR
                        email LIKE '%$keyword%' OR
                        jurusan LIKE '%$keyword%' OR
                ";
        return query($query);
                
}
?>