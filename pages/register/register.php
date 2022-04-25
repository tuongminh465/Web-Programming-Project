<?php

    include 'config.php';

    if(isset($_POST['submit'])){    

        $name = mysqli_real_escape_string($conn, $_POST['name']); //check input, prevent SQLi    
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_img/'.$image;
    }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <!-- css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype: encoded before submit to server -->
            <h3>register now</h3>
            <input type="text" name="name" placeholder="enter username" class="box" required>
            <input type="email" name="email" placeholder="enter email" class="box" required>
            <input type="password" name="password" placeholder="enter password" class="box" required>
            <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
            <input type="file" name="image" class="box" accept="image=/jpg, image/jpeg, image/png">
            <input type="submit" name="submit" value="register now" class="btn">
            <p>Already have an account? <a href="login.php">login now</a></p>
        </form>  
    </div>
</body>
</html>
