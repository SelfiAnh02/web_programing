<?php

require "function.php";

if (isset($_POST["submit"])) {
    $message = register($_POST);

    if ($message === "Registrasi Berhasil") {
        echo "
        <script>
            alert('" . addslashes($message) . "');
            document.location.href = 'login.php';
        </script>";
    } else {
        echo "
        <script>
            alert('" . addslashes($message) . "');
            document.location.href = 'register.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Web Informatika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5 p-4" style="max-width: 600px; background-color: #506caaff;">

        <h3 class="card-title mb-4 text-center">Register</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>

            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password" required>
            </div>
            
            <button type="submit" class="btn btn-primary w-100" name="submit">Submit</button>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>