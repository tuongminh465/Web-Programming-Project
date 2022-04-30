<?php
    $conn = mysqli_connect('localhost', 'root', 'root', 'user_db') or die ('connect failed');
    session_start();
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['update_profile'])){
        $update_name = mysqli_real_escape_string($conn, $_POST['updated_name']);
        $update_email = mysqli_real_escape_string($conn, $_POST['updated_email']);

       mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email =
       '$update_email' WHERE id = '$user_id'") or die('query failed');

       $old_pass = $_POST['old_pass'];
       $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
       $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
       $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

       if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
           if($update_pass != $old_pass){
               $message[] = 'old password does not matched!';
           }elseif($new_pass != $confirm_pass){
                $message[] = 'confirm password does not matched!';
           }else{
            mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") 
            or die('query failed');
                $message[] = 'password updated successfully!';
           }
       }
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../../uploaded_img/'.$image;

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$update_email' AND password = '$update_pass'") 
        or die('query failed');

        if($image_size > 2000000){
            $message[] = 'image size is too large!';
        }else{
            $insert = mysqli_query($conn, "UPDATE `user_form` SET image = '$image' WHERE id = '$user_id'") 
            or die('query failed');
   
            if($insert){
               move_uploaded_file($image_tmp_name, $image_folder);
            }
            $message[] = 'image updated successfully!';
        }
    }
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
            ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php
            if($fetch['image'] == ''){
                echo '<img src="../../img/default_pic.jpg">' ;
            }else{
                echo '<img src="../../uploaded_img/'.$fetch['image'].'">';
            }
        ?>
        <div class="flex">
            <div class="inputBox">
                <span>username :</span>
                <input type="text" name="updated_name" value="<?php echo $fetch['name']?>"
                class="box">

                <span>your email :</span>
                <input type="email" name="updated_email" value="<?php echo $fetch['email']?>"
                class="box">

                <span>update your pic :</span>
                <input type="file" name="image" class="box" accept="image/jpg, img/jpeg, image/png">
            </div>
            <div class="inputBox">
                <input type="hidden" name="old_pass" value="<?php echo $fetch['password']?>">
                <span>old password :</span>
                <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                <span>new password :</span>
                <input type="password" name="new_pass" placeholder="enter new password" class="box">
                <span>confirm password :</span>
                <input type="password" name="confirm_pass" placeholder="confirm password"
                class="box">
            </div>
        </div>
        <input type="submit" value="update profile" name="update_profile" class="btn">
        <a href="profilecard.php" class="delete-btn">go back</a>
    </form>
    </div>
</body>
</html>