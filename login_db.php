<?php

session_start();
include('dbconnect.php');

$errors = array();

if (isset($_POST['login_user'])){

     $username = $_POST['username'] ?? '';
     $password = $_POST['password'] ?? '';
    
    
     if(empty($username)){
         echo '1';
         array_push($errors, "Username is empty");
     }
     if(empty($password)){
        echo '2';
         array_push($errors, "Password is empty");
     }

     if(count($errors) == 0){
         $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
         $result = mysqli_query($con, $query);
         echo '3';

         if(mysqli_num_rows($result) == 1){
            echo '4';
             $_SESSION['username'] = $username;
             $_SESSION['success'] = "Your are now logged in";
             header("location: menu.php");
         }else{
            echo '5';
             array_push($errors, "Wrong username or password");
             $_SESSION['errors'] = "Wrong username or password try again";
             header("location: login.php");
         }
     }else{
            array_push($errors, "Wrong username or password");
             $_SESSION['errors'] = "Empty username or password try again";
             header("location: login.php");
        }
}else{
    echo 'ไม่สำเร็จ';
}

?>