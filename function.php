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

?>