<?php

namespace Controllers;

use Models\Film;
use View;

class Index extends AbstractController
{
    public function __construct()
    {
        parent::__construct();
        $this->view->template = 'default';
    }

    public function index()
    {
        $this->view->page = 'pages.main';
        $this->view->films = $this->model->all();
        $this->view->render();
    }
}