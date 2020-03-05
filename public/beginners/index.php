<?php
require 'config.php';
global $connect;
$sql = 'SELECT * from TBLPersons';
$res = $connect->query($sql);
$persons = $res->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Persons Info</title>
    <style>
        table {width: 90%; margin: auto;}
    </style>
</head>
<body>
<table border="1">
    <caption><h3>Person Manager</h3></caption>
    <thead>
    <tr>
        <th width="2%">id</th>
        <th width="5%">Profile</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>
    <?php if (count($persons)) : ?>
    <?php foreach ($persons as $person) : ?>
        <tr>
            <td><?= $person['user_id'] ?></td>
            <td><img src="uploads/<?= $person['user_avatar'] ?>" height="50" width="50" alt=""></td>
            <td><?= $person['user_name'] ?></td>
            <td><?= $person['user_email'] ?></td>
            <td><?= $person['user_password'] ?></td>
            <td><a href="edit.php?id=<?= $person['user_id'] ?>">Edit</a> | <a
                        href="delete.php?id=<?= $person['user_id'] ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="6" align="center" style="padding: 20px;">No available data</td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>

<div style="width: 90%;margin: auto">
    <a href="add.php">New</a>
</div>

</body>
</html>
