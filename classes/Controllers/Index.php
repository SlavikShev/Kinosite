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
        //$this->model = new Film();
    }

    public function index()
    {
        $this->view->page = 'pages.main';
        $this->view->render();
    }
}