<?php


namespace Controllers;

use bootstrap;
use Models\Film;
use Models\User;

class Admin extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
        $this->view->template = "admin";
        $this->model = new Film();
        if (!isset($_SESSION['login'])) {
            bootstrap::redirect("/auth/index");
        }
    }

    public function index()
    {
        $this->view->films = $this->model->all();
        $this->view->users = $this->model = new User(); //TODO
        $this->view->users = $this->model->getAllUsers();
        $this->view->page = "admin.index";
        $this->view->render();
    }

    public function create()
    {
        $this->view->page = "admin.create";
        $this->view->render();
    }

    public function save()
    {
        $name = filter_input(INPUT_POST, 'name');
        $year = filter_input(INPUT_POST, 'year');
        $description = filter_input(INPUT_POST, 'description');

        $this->model->add($name, $year, $description);
        bootstrap::redirect("/admin/index");
    }

    public function delete()
    {
        $id = filter_input(INPUT_POST, 'id');
        $this->model->delete($id);
        bootstrap::redirect("/admin/index");
    }

    public function edit()
    {
        $this->view->page = 'admin.edit';
        $id = filter_input(INPUT_POST, 'id');
        $this->view->film = $this->model->getFilm($id);
        $this->view->render();
    }

    public function update()
    {
        $name = filter_input(INPUT_POST, 'name');
        $year = filter_input(INPUT_POST, 'year');
        $description = filter_input(INPUT_POST, 'description');
        $id = filter_input(INPUT_POST, 'id');
        $this->model->update($id, trim($name), $year, $description);
        bootstrap::redirect('/admin/index');
    }

###################
###    USERS    ###
###################

    public function createAccount() {
        $this->view->page = "admin.createaccount";
        $this->view->render();
    }

    public function addUser() {
        $user = new User();
        $login = trim(filter_input(INPUT_POST,'login'));
        $password= filter_input(INPUT_POST,'password');
        $confirmPassword= filter_input(INPUT_POST,'confirm_password');
        if(($password === $confirmPassword) && strlen($password) >= 4 && (strlen($login) >= 4)) {
            var_dump($login,$password,$confirmPassword);
            if($user->checkLogin($login )) {   //если данный логин не занят
                password_hash($password, PASSWORD_DEFAULT);
                $user->saveUser($login,$password);

            }
        }
        bootstrap::redirect('/admin/index');
    }
    public function deleteUser() {
        $user = new User();
        $id = filter_input(INPUT_POST, 'userid');
        $user->deleteUser($id);
        bootstrap::redirect('/admin/index');
    }
}