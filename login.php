<?php

    require 'function.php';
    session_start();
    if(isset($_SESSION["login"])) {
        header("Location: datamahasiswa.php");
        exit;
    }


    if (isset($_POST['login'])) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Cek apakah username dan password sesuai
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($connection, $query);   
        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                // Set session atau cookie jika diperlukan
                $_SESSION["login"] = $user['id'];
                echo "<script>
                        alert('Login berhasil!');
                        document.location.href = 'datamahasiswa.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Password salah!');
                        document.location.href = 'login.php';
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Username tidak ditemukan!');
                    document.location.href = 'login.php';
                </script>";
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
    <link rel="stylesheet" href="css/style.css">
    <title>Pemrograman WEB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans+Hebrew:wght@100..800&display=swap" rel="stylesheet">

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
    <!-- <hr size="2px" color="maroon" width="90%" align="center"> -->
    <main>
        <legend style="border: 1px solid black; width: 500px; padding: 10px; border-radius: 5px;">
        <h1>Login</h1>
        <form class="form-login" method="post" enctype="multipart/form-data">
            <label for="Username">Username:</label> <br>
            <input type="text" id="text" name="username" placeholder="Username" required> <br>
            <label for="password">Password:</label> <br>
            <input type="password" id="password" name="password" placeholder="Password" required> <br>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember Me</label> <br>
            <input type="submit" name="login" value="Login"><br>
            <p>Belum punya akun?</p>
            <p><a href="register.php">Klik di sini untuk Buat Akun -></a></p>
        </form>

    </main>
</body>
</html>