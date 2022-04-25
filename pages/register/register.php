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
        <h3>register now</h3>
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype: encoded before submit to server -->
            <input type="text" name="name" placeholder="enter username" class="box" required>
            <input type="email" name="email" placeholder="enter email" class="box" required>
            <input type="password" name="password" placeholder="enter password" class="box" required>
            <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
            <input type="file" class="box" accept="image=/jpg, image/jpeg, image/png">
            <input type="submit" value="register now" class="btn">
            <p>Already have an account? <a href="login.php">login now</a></p>
        </form>  
    </div>
</body>
</html>
