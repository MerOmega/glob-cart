<?php

class ReciptClass{

    private float $finalprice=0;
    private string $date;
    private ArticleClassDB $article;

    public function __construct(){
        $this->db=new DB();
        $this->article = new ArticleClassDB();
        $this->date=date("D M d, Y");
    }

    private function updateData($cart){
        $this->setStock($cart);
        unset($_SESSION["cart"]);
        $_SESSION["cart"]=CartClass::getInstance();
    }

    public function setOrder(){
        if($this->finalprice!=0){
            $sql="INSERT INTO `order` (`datebuy`,`total`) VALUES (\"$this->date\",\"$this->finalprice\")";
            $this->db->query($sql);
            $this->db->execute();
            $_SESSION["conversation"]->saveAction("User finished buying");
            $_SESSION["conversation"]->persistActions();
        }
    }

    public function getOrder($id){
        $this->db->query("SELECT * FROM articles WHERE idarticles=$id");
        return $this->db->singleRecord();
    }

    private function setStock($cart){
        if($this->finalprice!=0){
            foreach($cart as $key=>$value){
                //Doble chequeo que hayan cantidades suficientes para la compra
                // if($this->article->getSingleArticle($key)->stock - $value >= 0){
                    $this->article->setStock($value,$key);
                // }else{
                //     $this->finalprice-=$this->article->getSingleArticle($key)->price*$value;
                // }
            }
        }
    }

    public function getLastOrder(){
        $this->db->query("SELECT * FROM `order` ORDER BY idorder DESC LIMIT 1");
        return $this->db->singleRecord();
    }


    public function createTicket($cart){
        $this->finalprice=$_SESSION["cart"]->getTotalValue();
        $this->updateData($cart);
        $this->setOrder();
    }


}