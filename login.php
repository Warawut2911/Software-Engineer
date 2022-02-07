<?php include('dbconnect.php'); ?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>!!! Log In !!!</title>
</head>
<style>
    body {font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;}
</style>
<body>
    <br><br><br><br><br>
    <form action="login_db.php" method="POST">
    <div class="container-fluid">
        <div class="card border-primary" style="border-radius: 20px;">
            <div class="row">
                <div class="text-center">
                    <p><h1>Learning Outcomes</h1></p>
                    <?php if (isset($_SESSION['errors'])): ?>
                    <span class="badge bg-danger">
                        <h5>
                            <?php
                                echo $_SESSION['errors'];
                                unset($_SESSION['errors']); 
                            ?>
                        </h5>
                    </span><br><br>
                    <?php endif ?>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-auto">
                        <label for="username" class="col-form-label">Username</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="username" name="username" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>
            </div>
            <p></p>
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-auto">
                        <label for="password" class="col-form-label">Password</label>
                    </div>
                    <div class="col-auto">
                        <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <span>
                        <button type="submit" class="btn btn-primary" name="login_user">Login</button>
                    </span>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>
