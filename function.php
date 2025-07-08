<?php
    $connection = mysqli_connect("localhost:3306", "root", "", "web_informatic");

    if(! $connection)
    {
        die('Connection failed' . mysqli_connect_error());
    }else {

    }

    
    function tambahData($data) {
        global $connection;
        
        $nama = $data["nama"];
        $email = $data["nim"];    
        $jurusan = $data["jurusan"];
        $alamat = $data["alamat"];
        
        $file = $_FILES["foto"]["name"];
        $namafile = date('DMY_Hm') . '_'. $file;
        $tmp = $_FILES["foto"]["tmp_name"]; 
        $folder = "img/mhs/";
        $path = $folder . $namafile;
        
        if (move_uploaded_file($tmp, $path)) 
        {
            // Query untuk memasukkan data ke dalam tabel mahasiswa
            $query = "INSERT INTO mahasiswa VALUES ('', '$namafile', '$nama', '$email', '$jurusan', '$alamat')";
            
            mysqli_query($connection, $query);
            
            return mysqli_affected_rows($connection);
            
        }else 
        {
            return mysqli_affected_rows($connection);
        } 
    }
    
    function tampilData($query) 
    {
        global $connection;
        $result = mysqli_query($connection, $query);
        
        if (!$result) {
            die("Query gagal: " . mysqli_error($connection));
        }

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    
    function ubahdata($data, $id)
    {
        global $connection;
        
        $nama    = $data["nama"];
        $nim     = $data["nim"];
        $jurusan = $data["jurusan"];
        $alamat  = $data["alamat"];
        
        $file = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];
        
        if (!empty($file)) {
            // Jika ada foto baru
            $namafile = date('dmY_His') . '_' . $file;
            $folder   = 'img/mhs/';
            $path     = $folder . $namafile;
            
            if (move_uploaded_file($tmp, $path)) {
                $query = "UPDATE mahasiswa SET 
                            foto = '$namafile',
                            nama = '$nama',
                            nim = '$nim',
                            jurusan = '$jurusan',
                            alamat = '$alamat'
                        WHERE id = $id";
            } else {
                return 0; // gagal upload file
            }
        } else {
            // Tanpa ganti foto
            $query = "UPDATE mahasiswa SET 
                        nama = '$nama',
                        nim = '$nim',
                        jurusan = '$jurusan',
                        alamat = '$alamat'
                    WHERE id = $id";
        }

        mysqli_query($connection, $query) or die(mysqli_error($connection));
        return mysqli_affected_rows($connection);

    }

    function hapusData($id) {
        global $connection;
        
        // Query untuk menghapus data berdasarkan ID
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        mysqli_query($connection, $query);

        return mysqli_affected_rows($connection);
    }

    function register($data)
    {
        global $connection;

        $username = stripslashes(trim($data["username"]));
        $password1 = trim($data["password1"]);
        $password2 = trim($data["password2"]);

        $queryusername = "SELECT id from user 
        where username = $username";

        $username_check = mysqli_query($con , $queryusername);

        if(mysqli_num_rows($username_check) > 0)
        {
            return "Username Sudah Terdaftar!";
        }

        if(!preg_match('/^[a-zA-Z0-9._-]+$/' , $username));
        {
            return "Username Tidak Valid!";
        }

        if($password1 !== $password2)
        {
            return "Konfirmasi Password Salah!";
        }
        
        $hash_password = password_hash($password1, PASSWORD_DEFAULT);

        $query_insert = "INSERT INTO user VALUES ('' , '$username' , '$hash_password')";

        if(mysqli_query($con, $query_insert))
        {
            return "Registrasi Berhasil";
        } else 
        {
            return "Gagal" . mysqli_error($con);
        }
    }

?>