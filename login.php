<?php

@include 'tracking_db.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CSD Sign In</title>
   <link rel="stylesheet" href="login.css">

</head>
<body>

<?php

@include 'tracking_db.php';


if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
   
      $user_id = $row['user_id'];
   
      if($row['user_type'] == '1'){
         $_SESSION['user_name'] = $row['names'];
         $_SESSION['user_id'] = $user_id; 
         header('location: admin/adminpage.php');
      } elseif($row['user_type'] == '3'){
         $_SESSION['user_name'] = $row['names'];
         $_SESSION['user_id'] = $user_id; 
         header('location: Page/StudentPage.php');
      } elseif($row['user_type'] == '2'){
        $_SESSION['prof_name'] = $row['names'];
        $_SESSION['user_id'] = $user_id; 
        header('location: Page/profpage.php');
     }
   } else {
      $error[] = 'Incorrect email or password!';
   }

};

?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Sign In</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login" class="form-btn">
      <p>Don't have an account? <a href="/CSD System/landing/Register/signup.php">Register</a></p>
   </form>

</div>

</body>
</html>
