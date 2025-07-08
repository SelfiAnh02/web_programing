<?php
    

   require 'function.php';
    // Query untuk mengambil data mahasiswa
    $query = "SELECT * FROM mahasiswa";
    $rows = tampilData($query);
    // mysqli_fetch_row()
    //  mysqli_fetch_assoc()
    //  mysqli_fetch_array()
    // mysqli_fetch_object()

    // $mhs = mysqli_query($result);
    // var_dump($mhs);
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
    <title>Pemrograman WEB</title>
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

    <main>
        <h1>Data Mahasiswa</h1>
        <a href="tambahdata.php">
            <button type="button" class="tambah-data">
                Tambah Data
            </button>
        </a>
        <table border="1" cellspacing="0" cellpadding="10px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1; 
        foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td>
                    <img src="img/mhs/<?php echo($row['foto']) ?>" alt="Foto" width="80" height="80">
                </td>
                <td><?php echo ($row['nama']); ?></td>
                <td><?php echo ($row['nim']); ?></td>
                <td><?php echo ($row['jurusan']); ?></td>
                <td><?php echo ($row['alamat']); ?></td>
                <td>
                    <a href="ubahdata.php?id=<?php echo $row['id']; ?>">
                        <button>Ubah</button>
                    </a>
                    <a href="hapusdata.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');">
                        <button>Hapus</button>
                    </a>
                </td>

                
            </tr>
            <?php endforeach; ?>

        </table>
    </main>
</body>
</html>