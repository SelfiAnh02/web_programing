<?php
require 'function.php';

// ambil id dari URL
$id = $_GET["id"];

// cek apakah data berhasil dihapus
if (hapusData($id) > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'datamahasiswa.php';
          </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'datamahasiswa.php';
          </script>";
}

?>