<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name='viewport' content="width=device-width, initial-scale=1.0"/>
        <title>EShop Website</title>
        <link rel="stylesheet" href="index.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    </head>

    <body>
        <section id="header">
            <a href="#"><img width="100px" height="100px" src="img/logo.png" alt="logo"></a>
            <div>
                <ul id="navbar">
                    <li><a class="active" href="index.html">Home</a></li>
                    <li><a href="./pages/shop/shop.php">Shop</a></li>
                    <li><a href="./pages/login/login.php">Login</a></li>
                    <li><a href="./pages/register/register.php">Register</a></li>
                    <li><a href="./pages/profile/profile.php">Profile</a></li>
                    <li><a href="./pages/cart/cart.php"><i class="fas fa-shopping-cart"></i></a></li>
                </ul>
            </div>
        </section>

        <section id="hero">
            <h6>Trade-in-offer</h6>
            <h2>Super value deals</h2>
            <h1>On all products</h1>
            <p>Save more with coupons & up to 70% off!</p>
            <button>SHOP NOW!</button>
        </section>

        <section id="feature" class="section-p1">
            <div class="feat-container">
                <img src="img/feat1.jpg" alt="free shipping">
                <h6>Free Shipping</h6>
            </div>
            <div class="feat-container">
                <img src="img/feat2.jpg" alt="free shipping">
                <h6>Online Order</h6>
            </div>
            <div class="feat-container">
                <img src="img/feat3.jpg" alt="free shipping">
                <h6>Save Money</h6>
            </div>
            <div class="feat-container">
                <img src="img/feat4.jpg" alt="free shipping">
                <h6>Promotions</h6>
            </div>
            <div class="feat-container">
                <img src="img/feat5.jpg" alt="free shipping">
                <h6>Save Time</h6>
            </div>
            <div class="feat-container">
                <img src="img/feat6.jpg" alt="free shipping">
                <h6>24/7 Support</h6>
            </div>
        </section>

        <section id="products" class="section-p1">
            <h2>Featured Products</h2>
            <p>Best Selling Gaming PC Hardware</p>
            <div class="product-container">
                <div class="product">
                    <img src="img/products/product1.jpg" alt="">
                    <div class="description">
                        <span>MSI</span>
                        <h5>MSI Geforce RTX™ 3080 GAMING Z TRIO 10GB GDDR6X (LHR)</h5>
                        <h4>$1,799.99</h4>
                    </div>
                    <a href="#">
                        <i 
                            style="position: absolute; bottom: 4%; right: 5%; font-size: 25px;" 
                            class="fas fa-cart-plus">
                        </i>
                    </a>
                </div>
                <div class="product">
                    <img src="img/products/product2.jpg" alt="">
                    <div class="description">
                        <span>Corsair</span>
                        <h5>Corsair Vengeance RGB PRO 16GB (2x8GB) DDR4</h5>
                        <h4>$89.99</h4>
                    </div>
                    <a href="#">
                        <i style="position: absolute; bottom: 4%; right: 5%; font-size: 25px;" class="fas fa-cart-plus">
                        </i>
                    </a>
                </div>
                <div class="product">
                    <img src="img/products/product3.jpg" alt="">
                    <div class="description">
                        <span>GIGABYTE</span>
                        <h5>Mainboard GIGABYTE B450 AORUS PRO Socket AM4 ATX</h5>
                        <h4>$129.99</h4>
                    </div>
                    <a href="#">
                        <i style="position: absolute; bottom: 4%; right: 5%; font-size: 25px;" class="fas fa-cart-plus">
                        </i>
                    </a>
                </div>
                <div class="product">
                    <img src="img/products/product4.jpg" alt="">
                    <div class="description">
                        <span>Intel</span>
                        <h5>CPU Intel Core i7-10700K (3.8GHz turbo up to 5.1GHz, 8 cores 16 threads, 16MB Cache, 125W) - Socket Intel LGA 1200</h5>
                        <h4>$399.99</h4>
                    </div>
                    <a href="#">
                        <i style="position: absolute; bottom: 4%; right: 5%; font-size: 25px;" class="fas fa-cart-plus">
                        </i>
                    </a>
                </div>
            </div>
        </section>

        <section id="banner" class="'section-m1">
            <h4>Repair services</h4>
            <h2>Up to <span>70% Off</span></h2>
            <button class="normal">Explore more</button>
        </section>

        <footer class="section-p1">
            <div class="col">
                <img class='logo' width="100" height="100" src="img/logo.png" alt="logo">
                <h4>Contact</h4>
                <p><b>Phone:</b> (+84)12434325</p>
                <p><b>Email:</b> EShopTMVH@gmail.com</p>
                <div class="follow">
                    <h4>Follow our social media</h4>
                    <div class="icon">
                        <a href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a>
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a>
                            <i class="fab fa-twitch"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col2">
                <h4>About</h4>
                <a href="#">About us</a>
                <a href="#">Terms of Service</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Delivery Information</a>
            </div>

            <div class="col2">
                <h4>Account</h4>
                <a href="#">Sign up</a>
                <a href="#">Login</a>
                <a href="#">My cart</a>
                <a href="#">Help</a>
            </div>

            <div class="col2">
                <h4>Online Payment Methods</h4>
                <img src="img/payment.jpg" alt="payment-methods">
            </div>
        </footer>

        <script src="script.js"></script>
    </body>

</html>