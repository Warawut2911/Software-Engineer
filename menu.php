<?php 
    session_start();
    include('dbconnect.php');

    if (empty($_SESSION['username'])){
        $_SESSION['errors'] = 'You need to login';
        header('location: login.php');
    }

    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
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
    
    <title>Menu</title>
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
    <div class="d-flex justify-content-center" style="padding-top: 70px;">
        <!-- <div class="card" style="width: 100%; padding-bottom: 75px; padding-top: 0px; background-color:antiquewhite"> -->
            <br><br><br><br>
            <div class="container">
                <div class="align-self-center" style="flex-direction: center;">
                    <div class="d-flex justify-content-evenly">
                        <?php if($obj['status'] == 0): ?>
                            <div class="card" style="width: 15rem; border-width: 2px; border-radius: 20px;">
                                <div class="text-center">
                                    <img src="img/obj.png" class="card-img-top" style="width: 8rem; padding-top: 30px;">
                                        <div class="card-body">
                                            <p class="text-center">
                                            <h3>วัตถุประสงค์<a href="plo.php" class="stretched-link"></a></h3>
                                            </p>
                                        </div>
                                </div>
                            </div>
                            <div class="card" style="width: 15rem; border-width: 2px; border-radius: 20px;">
                                <div class="text-center">
                                    <img src="img/subject.png" class="card-img-top" style="width: 10rem;">
                                        <div class="card-body">
                                            <p class="text-center">
                                            <h3>กระบวนวิชา<a href="subject.php" class="stretched-link"></a></h3>
                                            </p>
                                        </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="card" style="width: 15rem; border-width: 2px; border-radius: 20px;">
                                <div class="text-center">
                                    <img src="img/subject.png" class="card-img-top" style="width: 10rem;">
                                        <div class="card-body">
                                            <p class="text-center">
                                            <h3>กระบวนวิชา<a href="subject_open.php" class="stretched-link"></a></h3>
                                            </p>
                                        </div>
                                </div>
                            </div>
                            <div class="card" style="width: 15rem; border-width: 2px; border-radius: 20px;">
                                <div class="text-center">
                                    <img src="img/score.png" class="card-img-top" style="width: 10rem;">
                                        <div class="card-body">
                                            <p class="text-center">
                                            <h3>คะแนนนักศึกษา<a href="s_score.php" class="stretched-link"></a></h3>
                                            </p>
                                        </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                    <br><br><br><br><br><br><br><br>
                    <div class="d-flex justify-content-center">
                        <a href="menu.php?logout='1'" class="btn btn-danger">ออกจากระบบ</a>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
</body>
</html>