<?php

class cart extends Controller{

    public function __construct()
    {
        $this->article= $this->dinamicModel("ArticleClassDB");
        $this->cart = $this->model("CartClass");
    }


    public function index()
    {
        $_SESSION["conversation"]->saveAction("user is in the shopping cart view");
        $this->view("cart",[$this->cart->allItemsDB(),$this->article->getArticles()]);
        
    }

    public function addItem($params){
        $postAmount= filter_var($_POST["amount"],FILTER_SANITIZE_NUMBER_INT)??null;
        $existsStock=$postAmount<$this->article->getSingleArticle($params)->stock;
        if(isset($postAmount) && $existsStock){
            $_SESSION["cart"]->setConjArticle(filter_var($params,FILTER_SANITIZE_NUMBER_INT),$postAmount,$this->article->getArticles());
            header("HTTP/1.1 200 OK");
            $_SESSION["conversation"]->saveAction("Item saved Item ID:$params Amount:$postAmount");
        }else{
            $_SESSION["conversation"]->saveAction("Trying to buy Item out of stock ID:$params, buy more than its possible or forced the URL to a non-existent item ");
        }
        header("Location:".INDEXED_RUTE."/".$_POST["page"]);
        die();
    }

    public function deleteItem($params){
        $_SESSION["conversation"]->saveAction("User deleted the item ID: $params from shopping cart");
        $this->cart->deleteItemDB($params,$this->article->getArticles($params));
        $this->index();
    }

    public function removeCart(){
        unset($_SESSION["cart"]);
        $_SESSION["conversation"]->saveAction("User delete all items in shopping cart");
        header("Location:".INDEXED_RUTE);
        die();
    }
}