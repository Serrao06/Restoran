<?php
    session_start();
    require 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/2ae7b43f8d.js" crossorigin="anonymous"></script>

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <?php
        $active1 = "";
        $active2 = "";
        $active3 = "";
        $active4 = "";
        $active5 = "";
        $active6 = "";
        $active7 = "";
        $active8 = "";
        $stmt = $conn->prepare("SELECT name, u_id FROM user WHERE email=:email");
        $stmt->bindParam(':email', $_SESSION['email']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>STARBELLY</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link <?php echo $active1; ?>">Home</a>
                        <a href="about.php" class="nav-item nav-link <?php echo $active2; ?>">About</a>
                        <a href="service.php" class="nav-item nav-link <?php echo $active3; ?>">Service</a>
                        <a href="menu.php" class="nav-item nav-link <?php echo $active4; ?>">Menu</a>
                        <a href="feedback.php" class="nav-item nav-link <?php echo $active6; ?>">Feedback</a>
                        <a href="carrier.php" class="nav-item nav-link <?php echo $active7; ?>">Carrier</a>
                        <a href="qr.php" class="nav-item nav-link <?php echo $active8; ?>">Qr</a>
                        <a href="cart.php" class="nav-item nav-link <?php echo $active5; ?>">Cart</a>
                        <?php if (empty($_SESSION['email'])) {
                            echo '<a href="signin.php" class="nav-item nav-link">Login / Register</a>';
                        }
                        else {
                            echo '<div class="dropdown show">
                                    <a href="#" class="nav-item dropdown-toggle nav-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'. $result['name']; echo '</a>
                                    
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="logout.php">Log Out</a>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                    <a href="booking.php" class="btn btn-primary py-2 px-4">Book A Table</a>
                </div>
            </nav>
