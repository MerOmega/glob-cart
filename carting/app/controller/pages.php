<?php

class pages extends Controller {


    public function __construct(){
        $this->articleModel = $this->dinamicModel("ArticleClassDB");
    }

    public function index(){
        $lista=$this->articleModel->getArticles();
        $this->view("main",$lista);

    }
    

}