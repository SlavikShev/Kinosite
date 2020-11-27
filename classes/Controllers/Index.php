<?php

namespace Controllers;

use Models\Film;
use View;

class Index implements controllerable
{
    protected $view;
    protected $model;

    public function __construct()
    {
        $this->view = new View();
        $this->view->template = 'default';
        $this->model = new Film();
    }

    public function index()
    {
        $this->view->page = 'pages.main';
        $this->view->films = $this->model->all();
        $this->view->render();
    }
}