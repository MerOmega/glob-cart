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

    public function addItem($idItem){
        $postAmount= filter_var($_POST["amount"],FILTER_SANITIZE_NUMBER_INT)??null;
        $existsStock=$postAmount<=$this->article->getSingleArticle($idItem)->stock;
        if(isset($postAmount) && $existsStock){
            $_SESSION["cart"]->setConjArticle(filter_var($idItem,FILTER_SANITIZE_NUMBER_INT),$postAmount,$this->article->getArticles());
            $_SESSION["conversation"]->saveAction("Item saved Item ID:$idItem Amount:$postAmount");
        }else{
            $_SESSION["conversation"]->saveAction("Trying to buy Item out of stock ID:$idItem, buy more than its possible or forced the URL to a non-existent item ");
        }
        header("Location:".INDEXED_RUTE."/".$_POST["page"]);
        die();
    }

    public function deleteItem($idItem){
        $_SESSION["conversation"]->saveAction("User deleted the item ID: $idItem from shopping cart");
        $this->cart->deleteItemDB($idItem,$this->article->getArticles($idItem));
        $this->index();
    }

    public function removeCart(){
        unset($_SESSION["cart"]);
        $_SESSION["conversation"]->saveAction("User delete all items in shopping cart");
        header("Location:".INDEXED_RUTE);
        die();
    }

    private function validateStock($idItem,$amount){
        $isLimit=false;
        $stock = $this->cart->getStockItem($idItem);
        $amount-$stock<1?$isLimit=true:$isLimit=false;
    }
}