<?php
    $conn = mysqli_connect('localhost', 'root', 'root', 'user_db') or die ('connect failed');
    session_start();
    $user_id = $_SESSION['user_id'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update profile</title>
    <link rel="stylesheet" href="../login/style.css">
</head>
<body>
    <div class="update-profile">
    <?php
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'")
            or die('query failed');
            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
            }
            if($fetch['updated_image'] == ''){
                echo '<img src="../img/default_pic.jpg">' ;
            }else{
                echo 'img src="uploaded_img/'.$fetch['updated_image'].'">' ;
            }
            ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="flex">
            <div class="inputBox">
                <span>username :</span>
                <input type="text" name="updated_name" value="<?php echo $fetch['name']?>"
                class="box">

                <span>your email :</span>
                <input type="email" name="updated_email" value="<?php echo $fetch['email']?>"
                class="box">

                <span>update your pic :</span>
                <input type="file" name="updated_image" class="box" accept="image/jpg, img/jpeg, image/png">
            </div>
            <div class="inputBox">
                <input type="hidden" name="old_name" value="<?php echo $fetch['password']?>">
                <span>new password :</span>
                <input type="password" name="new_pass" placeholder="enter new password"
                class="box">

                <span>confirm password :</span>
                <input type="password" name="confirm_pass" placeholder="confirm password"
                class="box">
            </div>
        </div>
    </form>
    </div>
</body>
</html>