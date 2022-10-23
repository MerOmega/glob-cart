<?php

class Controller{

    public function model(string $model):object{
        require_once "../app/model".$model.".php";
        return new $model();
    }

    public function view(string $view,array $data=[]):void
    {
        require_once "../app/view/".$view.".php";
    }
}