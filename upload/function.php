<?php

$koneksi = mysqli_connect("localhost", "root", "", "pkk");

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while($sws = mysqli_fetch_assoc($result)) {
        $rows[] = $sws; 
}
        return $rows;
    }
    
function tambah($data)
{
    global $koneksi;
    $nim =htmlspecialchars($data["nim"]);
    $nama =htmlspecialchars($data["nama"]);
    $email =htmlspecialchars($data["email"]);
    $jurusan =htmlspecialchars($data["jurusan"]);
    $gambar =htmlspecialchars($data["gambar"]);


    $gambar = upload();
    if (!$gambar){
        return false;
    }



    $query = "INSERT INTO siswa 
    VALUES(id, '$nim','$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4){
        echo"<script>
        alert('pilih gambar dlu');
        </script>";
        return false;
    }

    $eksistensiGambarValid =['JPG','jpeg','png','jpg','PNG','JPEG'];
    $eksistensiGambar = explode('.', $namafile);
    $eksistensiGambar = strtolower(end($eksistensiGambar));
    if (!in_array($eksistensiGambar,$eksistensiGambarValid)){
        echo"<script>
        alert('yang anda upload bukan gambar');
        </script>";
    }

}


function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM siswa where id =$id");
    return mysqli_affected_rows($koneksi);
}

function cari($keyword){
    $query ="SELECT * FROM siswa 
                WHERE
                nim LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' 
                ";
        return query($query);
}