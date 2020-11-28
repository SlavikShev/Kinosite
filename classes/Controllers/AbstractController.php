<?php


namespace Controllers;

use View;

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
    }
}