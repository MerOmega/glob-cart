<?php

class pages extends Controller {


    public function __construct(){
        $this->articleModel = $this->dinamicModel("ArticleClassDB");
    }

    public function index($params=null){
        if(is_null($params)){
            $params=1;
        }
        $lista=$this->articleModel->getArticlesPage($params);
        $cant=$this->articleModel->getTotalArticles();
        $this->view("main",[$lista,$cant]);

    }
    

}