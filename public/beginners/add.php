<?php
require 'config.php';
$avatar = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (isset($_FILES['avatar'])) {
        $avatar = $_FILES['avatar']['name'];
    }

    if ($password === $confirm_password) {
        try {
            global $connect;
            $password = md5($password);
            $q = "INSERT INTO TBLPersons(user_name, user_email, user_password, user_avatar) 
                    VALUES ('$name','$email', '$password', '$avatar')";

            if ($connect->exec($q)) {
                $_SESSION['success'] = 'You successfully registered it!';
                $folder = 'uploads/';
                $path = $folder . $avatar;
                move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
                header('Location: index.php');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    } else {
        echo 'Password mismatched!';
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Person Info</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" placeholder="Enter name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" placeholder="Enter name"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" placeholder="Enter password"></td>
        </tr>
        <tr>
            <td>Confirm password</td>
            <td><input type="password" name="confirm_password" placeholder="Retype your password"></td>
        </tr>
        <tr>
            <td>Profile Image</td>
            <td><input type="file" name="avatar" accept="image/*"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Submit" name="submit"></td>
        </tr>
    </table>
</form>
</body>
</html>

