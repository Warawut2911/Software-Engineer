<?php 
    session_start();
    include('dbconnect.php');

    if (empty($_SESSION['username'])){
        $_SESSION['errors'] = 'You need to login';
        header('location: login.php');
    }
    
    $username = $_SESSION['username'];
    $status = "SELECT status FROM user WHERE username = '$username'";
    $result = mysqli_query($con, $status);
    $obj = mysqli_fetch_array($result);
?>     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Learning Outcomes</title>
</head>
<style>
    body {
        font-family: 'Open Sans';
        background-color: antiquewhite;
        }
</style>
<body>
<div class="d-flex bd-highlight mb-3" style="background-color: tomato; padding-left: 5rem; padding-right: 5rem;">
        <div class="me-auto p-2 bd-highlight">
        <a href="menu.php"><img src="img/home-white.png" style="width: 2rem;" alt=""></a>
        </div>
        <div class="p-2 bd-highlight">
            <h5 style="color: white;">
                ยินดีต้อนรับ <?php echo $username; ?>
            </h5>
        </div>
</div>
    <!-- END Heading -->
<!-- <footer class="bd-footer p-3 p-md-5 mt-5 bg-light text-center text-sm-right">
    <div class="d-flex align-items-end flex-column bd-highlight mb-3" style="height: 200px;">
        <div class="mt-auto p-2 bd-highlight">
            <button type="button" class="btn btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-skip-backward-fill" viewBox="0 0 16 16">
                <path d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V8.753l6.267 3.636c.54.313 1.233-.066 1.233-.697v-2.94l6.267 3.636c.54.314 1.233-.065 1.233-.696V4.308c0-.63-.693-1.01-1.233-.696L8.5 7.248v-2.94c0-.63-.692-1.01-1.233-.696L1 7.248V4a.5.5 0 0 0-.5-.5z"/>
                </svg>
            </button>
        </div>
    </div>
</footer> -->
</body>
</html>