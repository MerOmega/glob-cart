<?php

class Controller{

    public function view(string $view,array $data=[]):void
    {
        require_once "../app/view/".$view.".php";
    }
}