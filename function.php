<?php
$connection = mysqli_connect("localhost:3306", "root", "", "web_informatic");

    if(! $connection)
    {
        die('Connection failed' . mysqli_connect_error());
    }else {
        
    }   

    
    function tampilData() {
        global $connection;
        $query = "SELECT * FROM mahasiswa";
        $result = mysqli_query($connection, $query);
        
        if (!$result) {
            die("Query gagal: " . mysqli_error($connection));
        }
        
        return $result;
    }


    function tambahData($data) {
        global $connection;
        
        $nama = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $password = htmlspecialchars($data["password"]);
        $umur = htmlspecialchars($data["umur"]);
        $tanggal_lahir = htmlspecialchars($data["tanggal lahir"]);
        $fav_color = htmlspecialchars($data["fav-color"]);
        $foto = htmlspecialchars($data["foto"]);
        $kelamin = htmlspecialchars($data["kelamin"]);
        $hobi = implode(", ", $data["hobi"]); // Menggabungkan hobi yang dipilih
        $negara = htmlspecialchars($data["negara"]);

        // Query untuk memasukkan data ke dalam tabel mahasiswa
        $query = "INSERT INTO mahasiswa (nama, email, password, umur, tanggal_lahir, fav_color, foto, kelamin, hobi, negara) 
                  VALUES ('$nama', '$email', '$password', '$umur', '$tanggal_lahir', '$fav_color', '$foto', '$kelamin', '$hobi', '$negara')";
        
        if (mysqli_query($connection, $query)) {
            return mysqli_affected_rows($connection);
        } else {
            die("Query gagal: " . mysqli_error($connection));
        }
    }

    function hapusData($id) {
        global $connection;
        
        // Query untuk menghapus data berdasarkan ID
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        
        if (mysqli_query($connection, $query)) {
            return mysqli_affected_rows($connection);
        } else {
            die("Query gagal: " . mysqli_error($connection));
        }
    }   

    function ubahData($data) {
        global $connection;
        
        $id = htmlspecialchars($data["id"]);
        $nama = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $password = htmlspecialchars($data["password"]);
        $umur = htmlspecialchars($data["umur"]);
        $tanggal_lahir = htmlspecialchars($data["tanggal lahir"]);
        $fav_color = htmlspecialchars($data["fav-color"]);
        $foto = htmlspecialchars($data["foto"]);
        $kelamin = htmlspecialchars($data["kelamin"]);
        $hobi = implode(", ", $data["hobi"]); // Menggabungkan hobi yang dipilih
        $negara = htmlspecialchars($data["negara"]);

        // Query untuk memperbarui data berdasarkan ID
        $query = "UPDATE mahasiswa SET nama='$nama', email='$email', password='$password', umur='$umur', 
                  tanggal_lahir='$tanggal_lahir', fav_color='$fav_color', foto='$foto', kelamin='$kelamin', 
                  hobi='$hobi', negara='$negara' WHERE id=$id";
        
        if (mysqli_query($connection, $query)) {
            return mysqli_affected_rows($connection);
        } else {
            die("Query gagal: " . mysqli_error($connection));
        }
    }   

    function register($data) {
        global $connection;

        $nama = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $password = htmlspecialchars($data["password"]);
        $umur = htmlspecialchars($data["umur"]);
        $tanggal_lahir = htmlspecialchars($data["tanggal lahir"]);
        $fav_color = htmlspecialchars($data["fav-color"]);
        $foto = htmlspecialchars($data["foto"]);
        $kelamin = htmlspecialchars($data["kelamin"]);
        $hobi = implode(", ", $data["hobi"]); // Menggabungkan hobi yang dipilih
        $negara = htmlspecialchars($data["negara"]);

        // Query untuk memasukkan data ke dalam tabel mahasiswa
        $query = "INSERT INTO mahasiswa (nama, email, password, umur, tanggal_lahir, fav_color, foto, kelamin, hobi, negara) 
                  VALUES ('$nama', '$email', '$password', '$umur', '$tanggal_lahir', '$fav_color', '$foto', '$kelamin', '$hobi', '$negara')";
        
        if (mysqli_query($connection, $query)) {
            return mysqli_affected_rows($connection);
        } else {
            die("Query gagal: " . mysqli_error($connection));
        }
    }

?>