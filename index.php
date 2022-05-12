<?php
     $conn = mysqli_connect('localhost', 'root', '', 'user_db', '3307') 
     or die('connection failed' . $conn->connect_error); 
     // nho them '3307' do port 3306 trong xampp bị conflict
    
    $record_per_page = 3;
    $page = '';

    if (isset($_GET["page"])) {
        $page = intval($_GET["page"]);
    }
    else {
        $page = 1;
    }
    //get which page num is it

    $start_from = ($page - 1)*$record_per_page;
    //get which record to start fetching

    $select = mysqli_query($conn, 
        "SELECT `name`, `rating`, `content` 
        FROM `review` r join `user_form` u
        ON  r.r_id = u.id
        ORDER BY `r_id`
        DESC LIMIT $start_from, $record_per_page") 
    or die('query failed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name='viewport' content="width=device-width, initial-scale=1.0"/>
        <title>EShop Website</title>
        <link rel="stylesheet" href="index.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <script src="./index.js" async></script>
    </head>

    <body>
        <section id="header">
            <a href="#"><img width="100px" height="100px" src="img/logo.png" alt="logo"></a>
            <div>
                <ul id="navbar">
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="./pages/shop/shop.php">Shop</a></li>
                    <li><a href="./pages/login/login.php">Login</a></li>
                    <li><a href="./pages/register/register.php">Register</a></li>
                    <li><a onclick="getSession('./pages/profile/profilecard.php')">Profile</a></li>
                    <li><a onclick="getSession('./pages/cart/cart.php')"><i class="fas fa-shopping-cart"></i></a></li>
                </ul>
            </div>
        </section>

        <section id="hero">
            <h6>Trade-in-offer</h6>
            <h2>Super value deals</h2>
            <h1>On all products</h1>
            <p>Save more with coupons & up to 70% off!</p>
            <button onClick="window.location.href='./pages/shop/shop.php'">SHOP NOW!</button>
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

        <section id="banner" class="section-m1">
            <h4>Repair services</h4>
            <h2>Up to <span>70% Off</span></h2>
            <button class="normal">Explore more</button>
        </section>

        <section id="review" class="section-m1">
            <h2>User review</h2>
            <div class='reviews-container'>
                <?php
                    while($row = mysqli_fetch_array($select)) {
                ?>
                    <div class="review-container">
                        <div class='user-info'>
                            <img src="./img/default-pfp.png" alt="user profile picture">
                            <div>
                                <p><b>Name:</b> <?php echo $row["name"] ?></p>
                                <p><b>Review score:</b> <?php echo $row["rating"] ?>/5 <i style="color: yellow" class="fas fa-star"></i></p>
                            </div>
                        </div>
                        <div class="review-contents">
                            <p><?php echo $row["content"] ?></p>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
            <div id="pagination">
                <?php 
                    $select_page = mysqli_query($conn, "SELECT * FROM `review` 
                        ORDER BY `r_id` DESC") or die('query failed');
                    $total_records = mysqli_num_rows($select_page);
                    $total_pages = ceil($total_records/$record_per_page);
                    //get total number of pages
                    for ($i = 1; $i <= $total_pages; $i++){
                        echo '<a href="index.php?page='.$i.' onClick="changePage()">'.$i.'</a>';
                        //print out pagination button
                    }
                ?>
            </div>
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
                <a href="./pages/register/register.php">Sign up</a>
                <a href="./pages/login/login.php">Login</a>
                <a href="./pages/cart/cart.php">My cart</a>
                <a href="#">Help</a>
            </div>

            <div class="col2">
                <h4>Online Payment Methods</h4>
                <img src="img/payment.jpg" alt="payment-methods">
            </div>
        </footer>
    </body>
</html>