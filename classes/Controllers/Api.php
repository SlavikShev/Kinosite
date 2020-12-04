<?php


namespace Controllers;


use Models\Film;

class Api extends AbstractController
{
    public function __construct()
    {
        $this->model = new Film();
    }
    public function index()
    {
        $films = $this->model->all();
        $json = json_encode($films);
        header('Content-type: application/json');
        echo $json;
    }

    public function delete(){
        $id = filter_input(INPUT_POST, 'id');
        if(!$this->model->delete($id)){
            header('Status: 406 Not Acceptable');
        }
    }
}