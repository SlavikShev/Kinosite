<?php


namespace Models;


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

    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $result = $this->db->query($query);
        while($tmp = $result->fetch_assoc()) {
            $this->users[] = $tmp;
        }
        return $this->users;
    }

    public function checkLogin($login) {
        $query = "SELECT * FROM users WHERE login LIKE '$login'";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function addUser($login,$password) {
        $query = "INSERT INTO users (id, login, password) VALUES (NULL, '$login', '$password');";
        $this->db->query($query);
    }
    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = $id;";
        $this->db->query($query);
    }
}