<?php

class Users
{
    public $user_email;

    public static function getUser($user)
    {
        $user_object = array();

        foreach ($user as $item) {
            $user_object = $item;
        }

        return $user_object;
    }

    public static function CheckLogin($user_email, $user_password)
    {
        global $connect;
        $sql = 'SELECT * from tblusers WHERE user_email = :user_email and user_password=:user_password';
        $res = $connect->prepare($sql, [10 => 1]);
        $res->execute(array(
            ':user_email' => $user_email,
            ':user_password' => $user_password
        ));
        $_SESSION['user'] = $res->fetchAll(2);
        return (int)$res->rowCount();
    }
    public static  function CheckEmail($email)
    {
        global $connect;
        $sql = 'SELECT user_email from tblusers WHERE user_email = :email';
        $res = $connect->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
        $res->execute(array(':email' => $email));
        return (int)$res->rowCount();
    }

}
