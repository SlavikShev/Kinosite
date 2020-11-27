<?php


namespace Controllers;

use View;
use Models\Film;

abstract class AbstractController implements controllerable
{
    /**
     * @var View
     */
    protected $view;
    protected $model;
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Film();
    }
}