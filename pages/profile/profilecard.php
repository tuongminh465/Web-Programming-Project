<?php
    $conn = mysqli_connect('localhost', 'root', 'root', 'user_db') or die('connection failed');
    session_start();
    $user_id = $_SESSION['user_id'];

    //if user does not login, show login page. If login successful, show profile page
    if(!isset($user_id)){ 
        header('location:../login/login.php');  
    };

    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header('location:../login/login.php');
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile</title>
    <link rel="stylesheet" href="../login/style.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <?php
                $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'")
                or die('query failed');
                if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                }
                if($fetch['image'] == ''){
                    echo '<img src="../../img/default_pic.jpg">' ;
                }else{
                    echo '<img src="../../uploaded_img/'.$fetch['image'].'">' ;
                }
            ?>

            <h3><?php echo $fetch['name']; ?></h3>
            <a href="../profile/update_profile.php" class="btn" >Update profile</a>
            <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
            <p>new <a href="../login/login.php">login</a> or <a href="../register/register.php">register</a></p>
        </div>
    </div>

</body>
</html>