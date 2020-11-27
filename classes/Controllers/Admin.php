<?php


namespace Controllers;

use bootstrap;

class Admin extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
        $this->view->template = "admin";
    }

    public function index()
    {
        $film = new Film();
        $this->view->films = $this->model->all();
        $this->view->page = "admin.index";
        $this->view->render();
    }

    public function create(){
        $this->view->page = "admin.create";
        $this->view->render();
    }

    public function save() {
        $name = filter_input(INPUT_POST,'name');
        $year = filter_input(INPUT_POST,'year');
        $description = filter_input(INPUT_POST,'description');

        $this->model->add($name,$year,$description);
        bootstrap::redirect("/admin/index");
    }

    public function delete(){
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
}