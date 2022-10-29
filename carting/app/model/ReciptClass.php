<?php

class ReciptClass{

    private float $finalprice=0;
    private string $date;
    private ArticleClassDB $article;

    public function __construct(){
        $this->db=new DB();
        $this->article = new ArticleClassDB();
        $this->date=date("D M d, Y G:i");
    }

    private function updateData($cart){
        $this->setStock($cart);
        unset($_SESSION["cart"]);
        $_SESSION["cart"]=CartClass::getInstance();
    }

    private  function generateTxt($cart){
        $file = "test.txt";
        $txt = fopen($file, "w") or die("Unable to open file!");
        fwrite($txt, "lorem ipsum");
        fclose($txt);
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        header("Content-Type: text/plain");
        readfile($file);
    }

    public function getRecipt(){
        
    }

    private function setStock($cart){
        foreach($cart as $key=>$value){
            $this->article->setStock($value,$key);
        }
    }

    public function createTicket($cart){
        $this->finalprice=$_SESSION["cart"]->getTotalValue();
        $this->updateData($cart);
    }


}