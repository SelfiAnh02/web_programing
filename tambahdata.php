<?php
$connection = mysqli_connect("localhost:3306", "root", "", "web_informatic");

    if(!$connection)
    {
        die('Connection failed' . mysqli_connect_error());
    }

    if(isset($_POST['submit'])) {
        // var_dump($_POST);
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        $file = $_FILES['foto']['name'];
        $namafile = date('DMY_Hm') . '_' . $file;
        $tmp = $_FILES['foto']['tmp_name'];
        $folder = 'img/mhs/';
        $path = $folder . $namafile; 
        
        if (move_uploaded_file($tmp, $path)) {
            // File uploaded successfully
            $query = "INSERT INTO mahasiswa (nama, nim, jurusan, alamat, foto) VALUES ('$nama', '$nim', '$jurusan', '$alamat', '$namafile')";
            mysqli_query($connection, $query);

        } 
        if (mysqli_affected_rows($connection) > 0) {
            // Redirect to data mahasiswa page after successful insertion
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'datamahasiswa.php';
            </script>";
        } else {
            // Handle error
            echo "Error: " . mysqli_error($connection);
        }

        // Handle file upload
        // if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        //     $foto = $_FILES['foto']['name'];
        //     move_uploaded_file($_FILES['foto']['tmp_name'], "img/" . $foto);
        // } else {
        //     $foto = 'default.jpg'; // Use a default image if no file is uploaded
        // }

        // Insert data into database
        // $query = "INSERT INTO mahasiswa (nama, nim, jurusan, alamat, foto) VALUES ('$nama', '$nim', '$jurusan', '$alamat', '$foto')";
        // mysqli_query($connection, $query);
        
        // header("Location: datamahasiswa.php");
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
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="login.html">Login</a></li>
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