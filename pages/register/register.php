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
            $message[] = 'user already exit';
        }else{
            if($pass != $cpass){
                $message = 'confirm password does not matched!';
            }else{
                $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password)
                VALUES('$name', '$email', '$pass')") or die ('query failed');

                if($insert){
                    $message[] = 'registered successfully!';
                    header('location:login.php');
                }else{
                    $message[] = 'registration failed';
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
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype: encoded before submit to server -->
            <h3>register now</h3>
            <?php
                if(isset($message)){
                    foreach((array) $message as $message){
                        echo '<div class="message">'.$message.'</div>';
                    }
                }
            ?>
            <input type="text" name="name" placeholder="enter username" class="box" required>
            <input type="email" name="email" placeholder="enter email" class="box" required>
            <input type="password" name="password" placeholder="enter password" class="box" required>
            <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
            <input type="submit" name="submit" value="register now" class="btn">
            <p>Already have an account? <a href="../login/login.php">login now</a></p>
        </form>  
    </div>
</body>
</html>
