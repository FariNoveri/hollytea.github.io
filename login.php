<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi data tidak kosong
    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM register WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "Login berhasil. Selamat datang, " . htmlspecialchars($user['username']) . "!";
        } else {
            echo "Username atau password salah.";
        }
    } else {
        echo "Semua data harus diisi!";
    }
}
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Holly Tea</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link rel="stylesheet" href="firework.css">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <style>
            /* Gaya tambahan untuk konten */
            .content {
                display: none; /* Sembunyikan konten sampai loading selesai */
                text-align: center;
                color: white;
            }
        </style>
        <script>
            function showNotification() {
                alert("Anda sudah berada di sini");
            }
        </script>
        <style>
            @keyframes shake {
                0% { transform: translate(1px, 0); }
                25% { transform: translate(-1px, 0); }
                50% { transform: translate(1px, 0); }
                75% { transform: translate(-1px, 0); }
                100% { transform: translate(0, 0); }
            }
    
            .shake {
                animation: shake 0.5s;
            }
        </style>
    </head>

    <body>
        <!-- Loader Fireworks-->
        <div class="firework"></div>
        <div class="firework"></div>
        <div class="firework"></div>
        <!-- End loader Fireworks-->
        
    <script>
        // Hide loading animation after 3 seconds
        setTimeout(() => {
            document.querySelectorAll('.firework').forEach(el => el.style.display = 'none'); // Hide all fireworks
            document.querySelector('.content').style.display = 'block'; // Show content
        }, 3000);
    </script>
        <!-- Topbar Start -->
        <div class="container-fluid bg-primary py-3 d-none d-md-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-white pr-3 orderButton" href="">FAQs</a>
                            <span class="text-white">|</span>
                            <a class="text-white px-3 orderButton" href="">Help</a>
                            <span class="text-white">|</span>
                            <a class="text-white pl-3 orderButton" href="">Support</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            <a class="text-white px-3" href="https://www.instagram.com/holly_tea_lampung/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->


        <!-- Navbar Start -->
        <div class="container-fluid position-relative nav-bar p-0">
            <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
                <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
                    <a class="navbar-brand d-block d-lg-none" onclick="showNotification()">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">H</span>olly Tea</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav ml-auto py-0">
                            <a href="index.html" class="nav-item nav-link active orderButton">Home</a>
                            <a href="#about" class="nav-item nav-link">About</a>
                            <a href="#product" class="nav-item nav-link">Product</a>
                        </div>
                        <a class="navbar-brand mx-5 d-none d-lg-block" >
                            <h1 class="m-0 display-4 text-primary"><span class="text-secondary">H</span>olly <span class="text-secondary">T</span>ea</h1>
                        </a>
                        <div class="navbar-nav mr-auto py-0">
                            <a href="#services" class="nav-item nav-link">Service</a>
                            <a href="#gallery" class="nav-item nav-link">Gallery</a>
                            <ul class="nav">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Account
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                                        <li><a class="dropdown-item" href="register.php">Register</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
         
    <form method="POST" action="login.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
