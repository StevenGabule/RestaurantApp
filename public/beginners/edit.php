<?php
require 'config.php';
$avatar = '';

$id = $_GET['id'];

global $connect;
$sql = "SELECT * from TBLPersons where user_id = $id";
$res = $connect->query($sql);
$person = $res->fetch();

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
            $q = "UPDATE TBLPersons set user_name='$name', 
                      user_email = '$email', 
                      user_password='$password', 
                      user_avatar = '$avatar' WHERE user_id = $id";

            if ($connect->exec($q)) {
                $_SESSION['success'] = 'You successfully updated!';
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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Person Info</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?= $person['user_name'] ?>" placeholder="Enter name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="<?= $person['user_email'] ?>" placeholder="Enter name"></td>
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
            <td><img src="uploads/<?= $person['user_avatar']?>" width="100" height="100" alt=""></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Update" name="submit"></td>
        </tr>
    </table>
</form>
</body>
</html>

