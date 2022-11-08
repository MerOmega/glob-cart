<?php

class pages extends Controller {


    public function __construct(){
        $this->articleModel = $this->dinamicModel("ArticleClassDB");
    }

    public function index(int $params=null):void{
        $cant=$this->articleModel->getTotalArticles();   
        $limit=ceil($cant/LIMIT_ITEM_PER_PAGE);  
        if(is_null($params)){             
            $params=1;          
        }
        elseif($params> ceil($cant/LIMIT_ITEM_PER_PAGE)){
            $_SESSION["conversation"]->saveAction("User tried to navigate to a page that doesnt exists");  
            header("Location:".INDEXED_RUTE."/$limit");
            die();
        }
        $params=filter_var($params,FILTER_SANITIZE_NUMBER_INT); 
        if($params!="sources"){
            $_SESSION["conversation"]->saveAction("User is in page $params");  
        }     
        $lista=$this->articleModel->getArticlesPage($params);
        
        $this->view("main",[$lista,$cant]);

    }
    

}