<?php


namespace Models;


class User extends AbstractModel
{
    public function checkUser($login, $password)
    {
        $query = "SELECT * FROM users WHERE login LIKE '$login';";
        $result = $this->db->query($query);
        $user = $result->fetch_assoc();
        if (isset($user)) {
            if (password_verify($password, $user['password'])) {
                return true;
            } else {
                $_SESSION['message'] = "Wrong password";
            }
        } else {
            $_SESSION['message'] = "User " . $login . " not found. Contact your system administrator";
        }
        return false;
    }
}