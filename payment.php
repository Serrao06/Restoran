<?php
    $title = "Restoran - Payment";
    $active5 = "active";
    include 'header.php';

    $u_id = $_GET['uid'];
    $total = $_GET['tot'];

    if (empty($_SESSION['u_id'])) {
        header('Location: signin.php');
    }
?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Payment</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Payment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Cart</h5>
                    <h1 class="mb-5">Order Payment</h1>
                </div>
            </div>
        </div>

        <div class="row">
  <div class="col-75">
    <div class="containe">
      <form action="process.php?tot=<?php echo $total; ?>" method="POST" class="col-md-5">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="fname"><i class="fa fa-user ps-2"></i> Full Name</label>
                    <input type="text" class="form-control" id="fname" name="name" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label for="email"><i class="fa-cc-discover ps-2"></i>Phone number</label>
                    <input type="text" id="email" class="form-control" name="phone" placeholder="Enter your phone no" pattern="[0-9]{10}" required>
                </div>
            </div>

            <div class="form-group">
                <label for="adr"><i class="fa fa-address-card-o ps-2"></i> Address</label>
                <textarea id="adr" name="address" class="form-control" placeholder="Enter your address"></textarea>
            </div>

            <div class="form-group">
                <label for="city"><i class="fa fa-institution ps-2"></i> City</label>
                <input type="text" id="city" name="city" class="form-control" placeholder="Enter your City name" required>
            </div>

            <div class="form-group">
                <label for="zip">Pincode</label>
                <input type="text" id="zip" name="pincode" class="form-control" placeholder="Enter current pincode" required>
            </div>
          </div>
        </div>

        <div class="col-50 mt-3">
            <h3>Payment</h3>
            <div class="col-md-5">
                <img src="img/scan.png" alt="">
                <p>name@upi</p>
                <p>1234567891</p>
                
                <label for="transaction">Transaction Id</label>
                <input type="text" id="transaction" name="transid" placeholder="Enter Transaction Id">
            </div>
        </div>
          
        </div>
        
        <input type="submit" value="Continue to checkout" name="submit" class="btn-primary mt-5" style="border:none; height:50px;">
      </form>
    </div>
  </div>

        <div class="container-fluid text-center">
            <div class="row p-10 text-light">
                <div class="col-25">
                    <div class="containe">
                        <h2>Total Amount</h2>
                        <!-- <h2>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php //echo $cartItems ; ?></b></span></h2> -->
                            
                            <?php
                            // $stmt = $conn->prepare("SELECT * FROM cart WHERE u_id = '$u_id'");
                            // $stmt->execute();
                            // while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ 
                            //     $vid = $row['pd_id'];
                            //     $astmt = $admin -> ret("SELECT * FROM `addsellerproduct` WHERE `p_id` = '$vid' ");
                            //     $arow = $astmt -> fetch(PDO::FETCH_ASSOC);
                            //     $pr = $arow['price'];
                                
                            ?>

                            <!-- <p><a href="#"></a><?php //echo $arow['name']; ?><span class="price">Rs <?php //echo $arow['price']; ?></span></p> -->

                            <?php 
                            // }
                             ?>
     
                            <hr>
                        <p style="color:black;">Total Amount: <span style="color:black; font-size:20px;"><b>Rs. <?php echo $total; ?>.</b></span></p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Reservation</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 08PM</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>