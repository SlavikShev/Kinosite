<?php


namespace Controllers;

use View;
use Models\Film;
use bootstrap;

class Admin implements controllerable
{
    /**
     * @var View
     */
    protected $view;
    protected $model;

    public function __construct()
    {
        $this->view = new View();
        $this->view->template = "admin";
        $this->model = new Film();
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