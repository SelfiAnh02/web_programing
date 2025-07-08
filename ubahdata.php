<?php
    require 'function.php';

    // Ambil ID dari URL
    $id = $_GET["id"];
    $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $mhs = tampilData($query)[0]; // perbaikan: akses indeks array, bukan $query[0]

    // Proses saat tombol submit ditekan
    if (isset($_POST["submit"])) {
        if (ubahdata($_POST, $id) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href= 'datamahasiswa.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Diubah!');
                    document.location.href= 'datamahasiswa.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>

<body>

    <div class="container mt-5 p-4 rounded" style="max-width: 600px; background-color: #ffe6f0;">
        <h2 class="mb-4 text-center">Ubah Data Mahasiswa</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mhs['id']; ?>">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama"
                    value="<?= $mhs['nama']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim"
                    value="<?= $mhs['nim']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan"
                    value="<?= $mhs['jurusan']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                    required><?= $mhs['alamat']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Upload Foto</label>
                <input class="form-control" type="file" id="foto" name="foto">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                <div class="mt-2">
                    <img src="img/mhs/<?= $mhs['foto']; ?>" alt="Foto Mahasiswa" width="120">
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100" name="submit">Simpan Perubahan</button>
        </form>
    </div>

</body>

</html>