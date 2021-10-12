<?php 

require 'function.php';


 if (isset($_POST["tambah"])){  

    if(tambah($_POST) > 0){
        echo"
        <script>
        alert('data telah berhasil ditambah!');
        document.location.href='index.php';
        </script>
        ";
    } else {
        echo"
            <script>
            alert('data telah gagal ditambah!');
            document.location.href='index.php';
            </script>
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
    <title>Document</title>
</head>
<body>
    <h1>Tambah data siswa</h1>
    
    <form action="" method="post">
        <ul>
            <li>
                <label for="nim">NIM:</label>
                <input type="text" name="nim" id="nim" required>
            </li>
            <li>
                <label for="nama">NAMA:</label>
                <input type="text" name="nama" id="nama" required></li>
            <li>
                <label for="email">EMAIL:</label>
                <input type="text" name="email" id="email" required></li>
            <li>
                <label for="jurusan">Jurusan:</label>
                <input type="text" name="jurusan" id="jurusan" required></li>
            <li>
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="tambah">tambah data</button>
            </li>
        </ul>
    </form>
</body>
</html>