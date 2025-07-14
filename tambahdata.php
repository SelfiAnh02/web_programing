<?php

    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
    require 'function.php';


    if (isset($_POST["submit"])) {
        if (tambahData($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href= 'datamahasiswa.php';
                </script>
                ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan!');
                    document.location.href= 'datamahasiswa.php';
                </script>
                ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Pemrograman WEB">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Selfi Amanah">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="x-icon" href="img/favicon1.ico" type="img/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Tambah Data</title>
</head>
<body>
            <!-- membuat semantic tag header untuk memudahkan -->
    <header>
        <div class="logo">
            <img src="img/logo2.png" alt="Logo" width="110px">
            <h1>Selfi Amanah</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="datamahasiswa.php">Data Mahasiswa</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <button type="submit">Search</button>
        </div>
        <!-- <div class="social-media">
            <a href="#"><img src="img/facebook.png" alt="Facebook" width="30px"></a>
            <a href="#"><img src="img/twitter.png" alt="Twitter" width="30px"></a>
            <a href="#"><img src="img/instagram.png" alt="Instagram" width="30px"></a>
        </div> -->
    </header>

    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" required><br><br>

        <label for="alamat">Alamat:</label>
        <input id="alamat" name="alamat" required></input><br><br>

        <label for="foto">Upload Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

        <button type="submit" name="submit">Tambah Data</button>

    </form>
</body>
</html>