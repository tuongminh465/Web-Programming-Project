<?php
    $conn = mysqli_connect('localhost', 'root', 'root', 'user_db') or die('connection failed');

    if(isset($_POST['submit'])){    

        $name = mysqli_real_escape_string($conn, $_POST['name']); //check input, prevent SQLi    
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password'])); //using MD5 cryptographic protocol
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

        $select = mysqli_query($conn, "SELECT * FROM `user_form` 
        WHERE email = '$email' AND password = '$pass'") or die('query failed');

        if(mysqli_num_rows($select) > 0){
            $message[] = 'User already exit';
        }else{
            if($pass != $cpass){
                $message = 'Password does not matched!';

            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $message = 'Invalid email address!'; 
            }
            }else{
                $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password)
                VALUES('$name', '$email', '$pass')") or die ('query failed');

                if($insert){
                    $message[] = 'Registered successfully!';
                    header('location:login.php');
                }else{
                    $message[] = 'Registration failed';
                }
            }
        }
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>
<body>
    <div class="form-container">
        <button id="home" onclick="window.location.href='../../index.php'">
            <i class="fas fa-arrow-left"></i>
            <span>Go to Home page</span>
        </button>
        <form name="form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()"> <!-- enctype: encoded before submit to server -->
            <h3>Register now!</h3>
            <?php
                if(isset($message)){
                    foreach((array) $message as $message){
                        echo '<div class="message">'.$message.'</div>';
                    }
                }
            ?>
            <input type="text" name="name" placeholder="Enter your username" class="box" required>
            <input type="email" name="email" placeholder="Enter your email" class="box" required>
            <input type="password" name="password" placeholder="Enter password" class="box" required>
            <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
            <input type="submit" name="submit" value="Register now" class="btn">
            <p>Already have an account? <a href="../login/login.php">Login now!</a></p>
        </form>  
    </div>
</body>
</html>
