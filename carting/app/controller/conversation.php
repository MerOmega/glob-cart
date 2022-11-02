<?php 

class conversation extends Controller{

    public function __construct(){
        $this->articleModel = $this->dinamicModel("ArticleClassDB");
    }

    public function index(){
        $this->view("conversation",[$_SESSION["conversation"]->getActions()]);
    }

}