<?php


namespace Models;

use bootstrap;

class User extends AbstractModel
{
    public $users;

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

    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $result = $this->db->query($query);
        while ($tmp = $result->fetch_assoc()) {
            $this->users[] = $tmp;
        }
        return $this->users;
    }

    public function checkLogin($login)
    {
        $query = "SELECT * FROM users WHERE login LIKE '$login'";
        $result = $this->db->query($query);
        $tmp = $result->fetch_assoc();
        if (empty($tmp)) {
            return true;
        } else {
            return false;
        }
    }

    public function saveUser($login, $password)
    {
        $query = "INSERT INTO users (id, login, password) VALUES (NULL, '$login', '$password');";
        $this->db->query($query);
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = $id;";
        $this->db->query($query);
        if ($this->db->query($query)) {
            $_SESSION['message'] = "User was deleted";
        } else {
            $_SESSION['message'] = "There was an error deleting a user";
        }
    }

    public function addUser($login, $password, $confirmPassword)
    {
        if (($password === $confirmPassword) && strlen($password) >= 4 && (strlen($login) >= 4)) {
            if ($this->checkLogin($login)) {   //если данный логин не занят
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $this->saveUser($login, $pass);
                $_SESSION['message'] = "User is added";
                bootstrap::redirect('/admin/users');
                return $_SESSION['message'];
            } else {
                $_SESSION['message'] = "This login already exists";
            }
        } else {
            $_SESSION['message'] = "Passwords are not similar";
        }
        bootstrap::redirect('/admin/createaccount');   //todo ask about redirects in this part. Are they allowed here?
    }
}