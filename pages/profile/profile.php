<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name='viewport' content="width=device-width, initial-scale=1.0" />
    <title>EShop Website</title>
    <link rel="stylesheet" href="../../index.css" />
    <link rel="stylesheet" href="./profile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <script src="./profile.js" async></script>
</head>

<body>
    <section id="header">
        <a href="#"><img width="100px" height="100px" src="../../img/logo.png" alt="logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="../../index.php">Home</a></li>
                <li><a href="../shop/shop.php">Shop</a></li>
                <li><a href="../login/login.php">Login</a></li>
                <li><a href="../register/register.php">Register</a></li>
                <li><a class="active" href="../../pages/profile/profile.php">Profile</a></li>
                <li><a href="../cart/cart.php"><i class="fas fa-shopping-cart"></i></a></li>
            </ul>
        </div>
    </section>

    <section id="user-profile" class="section-p1">
        <div id="left-profile">
            <img id="avatar" src="../../img/default-pfp.png" alt="">
            <div>
                <button id="edit-avatar-button"><label id="label" for="edit-avatar">Change avatar</label></button>
                <input type="file" id="edit-avatar" name="edit-avatar">
                <button id="edit-bio-button" onclick='editProfile()'>Edit bio</button>
            </div>
            <div id="bio">
                <p id="bio-field">This is the user's bio</p>
            </div>
        </div>

        <div id="right-profile">
            <div class="user-info">
                <h4>Full name:</h4>
                <p id='full-name'>John Doe</p>
            </div>
            <div class="user-info">
                <h4>Date of birth:</h4>
                <p id='dob'>01/01/2001</p>
            </div>
            <div class="user-info">
                <h4>Email:</h4>
                <p id='email'>johndoe123@gmail.com</p>
            </div>
            <div class="user-info">
                <h4>Hobbies:</h4>
                <p id='hobby'>food, gaming, listening to music</p>
            </div>
            <button onclick='editProfile()'>Edit profile</button>
        </div>
    </section>
</body>

</html>