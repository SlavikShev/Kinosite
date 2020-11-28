<?php


namespace Controllers;

use bootstrap;
use Models\User;

class Auth extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
        $this->view->template = "admin";
        $this->model = new User();
    }

    public function index()
    {
        $this->view->page = "login.index";
        $this->view->render();
    }

    public function checkUser()
    {
        $login = filter_input(INPUT_POST, 'login');
        $password = filter_input(INPUT_POST, 'password');
        $login = trim(mb_strtolower($login));
        $password = trim(mb_strtolower($password));
        if ($this->model->checkUser($login, $password)) {
            $_SESSION['login'] = $login;
            bootstrap::redirect("/admin/index");
        } else {
            bootstrap::redirect("/auth/index");
        }
    }

    public function logout()
    {
        unset($_SESSION['login']);
        bootstrap::redirect("/admin/index");
    }
}