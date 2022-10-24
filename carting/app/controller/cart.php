<?php

class cart extends Controller{

    public function __construct()
    {

    }


    public function index()
    {
        $this->view("cart");
    }
}