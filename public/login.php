<?php require '../includes/db/init.php' ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (Users::CheckLogin($_POST['user_email'], $_POST['user_password']) > 0) {
        redirect_to('admin/');
    } else {
        $_SESSION['err'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops,</strong> Credentials not found. Please try again!  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button></div>';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Valencianos - Free Registration</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 500px;
            padding: 30px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {

        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;

        }
    </style>
</head>
<body class="text-center">

<form class="form-signin bg-white shadow rounded" method="post" action="">

    <img class="mb-4" src="images/2037159.svg" alt="" width="100" height="100">

    <h1 class="h3 mb-3 font-weight-normal">Welcome back, Valencianos</h1>

    <?php if (isset($_SESSION['success'])): ?>
        <?= $_SESSION['success'] ?>
    <?php endif ?>
    <?php unset($_SESSION['success']); ?>

    <?php if (isset($_SESSION['err'])): ?>
        <?= $_SESSION['err'] ?>
    <?php endif ?>
    <?php unset($_SESSION['err']); ?>

    <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" name="user_email" value="johnpaulgabule@gmail.com" placeholder="Email address" required
               autofocus>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="user_password" class="form-control" placeholder="Password" value="password"
               required>
    </div>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember" value="remember-me"> Remember me
        </label>
    </div>

    <button class="btn btn-lg btn-dark btn-block" type="submit" name="login">Log In</button>
    <p class="mt-2">Don't have an account? <a href="register.php" class="btn-link">Register here</a></p>
    <p class="mt-3 mb-3 text-muted small">All right reserved &copy; <?= date('Y') ?></p>

</form>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
