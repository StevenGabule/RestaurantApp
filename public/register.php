<?php require '../includes/db/init.php';

$user_name = $user_email = $user_password = '';
$_SESSION['err'] = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $user_password = isset($_POST['user_password']) ? $_POST['user_password'] : '';
    $user_password_confirm = isset($_POST['user_password_confirm']) ? $_POST['user_password_confirm'] : '';

    $user_name = clean($user_name);
    $user_password = clean($user_password);
    $user_password_confirm = clean($user_password_confirm);
    $user_email = clean($user_email);

    if (!empty($user_name) && !empty($user_email) && !empty($user_password) && !empty($user_password_confirm)) {
        if ($user_password !== $user_password_confirm) {
            $_SESSION['err'] = '<div class="alert alert-danger" role="alert">Password input mismatched! Please check your password.</div>';
        } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['err'] = '<div class="alert alert-danger" role="alert">Oops! Error found in your email! Please use proper format of email.</div>';
        } else if (Users::CheckEmail($user_email) > 0) {
            $_SESSION['err'] = '<div class="alert alert-danger" role="alert">Email is already taken or used! Please use another email.</div>';
        } else {
            try {
                global $connect;
                $q = "INSERT INTO tblusers(user_name, user_email, user_role, user_password, user_birthday,user_is_deleted) 
                      VALUES ('$user_name','$user_email',2, '$user_password', '02/12/93', 0)";
                if ($connect->exec($q)) {
                    $_SESSION['success'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success</strong> Your registration is completed. Please login<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button></div>';
                    redirect_to('login.php');
                }
            } catch (Exception $e) {
                echo $q . '<br>' . $e->getMessage();
            }
        }
    } else {
        $_SESSION['err'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Oops, error!</strong> Please fill up the forms.  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
            max-width: 530px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<form class="form-signin bg-white p-4 shadow" method="post" action="">
    <div class="text-center">
        <img class="mb-4" src="images/2037159.svg" alt="" width="75" height="75" style="">
        <h4 class="h4 mb-3 font-weight-normal">Free Registration</h4>
    </div>
    <?= ($_SESSION['err']) ?: '' ?>
    <?php unset($_SESSION['err']); ?>
    <div class="form-group">
        <label for="inputName" style="text-align: left !important;">Name</label>
        <input type="text" id="inputName" class="form-control" name="user_name"
               value="<?= $user_name !== '' ? $user_name : 'johnpaul gabule' ?>" placeholder="Name" required autofocus>
    </div>

    <div class="form-group">
        <label for="inputEmail">Email address</label>
        <input type="email" id="inputEmail" class="form-control" name="user_email"
               value="<?= $user_email !== '' ? $user_email : 'johnpaul@gmail.com' ?>" placeholder="Email address"
               required>
    </div>

    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" name="user_password" class="form-control" value="password"
               placeholder="Password"
               required>
    </div>

    <div class="form-group">
        <label for="inputConfirmPassword">Confirm Password</label>
        <input type="password" id="inputConfirmPassword" name="user_password_confirm" class="form-control"
               value="password"
               placeholder="Retype Password" required>
    </div>

    <div class="form-group">
        <button class="btn btn-lg btn-dark btn-block" type="submit" name="register">Register</button>
        <p class="mt-2 text-center">Already have an account? <a href="login.php" class="btn-link">Login here</a></p>
        <p class="mt-1 mb-3 text-muted text-center">&copy; Valencianos Foods - All right reserved <?= date('Y') ?></p>
    </div>

</form>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
