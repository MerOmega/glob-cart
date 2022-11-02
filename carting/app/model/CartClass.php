<?php
class CartClass{

    private static $instance;
    private array $conjArticle=[];
    private float $totalValue=0;
    private int $totalItems=0;
    private object $db;

    private final function __construct(){
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance= new static();
        }
        return self::$instance;
    }

    public function getConjArticle(): array
    {
        return $this->conjArticle;
    }

    private function calculate($lista):float{
            $total=0;
            foreach($lista as $key=>$value){ 
                $idItem = $value->idarticles;
                if(array_key_exists($idItem,$this->conjArticle)){
                    $total+=($this->conjArticle[$idItem]*$value->price);
                } 
            }
            return $total;
    }

    public function setConjArticle(int $articleId,int $amount,array $list): void
    {
        
        if(!array_key_exists($articleId,$this->conjArticle)){
            $this->conjArticle[$articleId]=$amount;
        }else{
            $this->conjArticle[$articleId]+=$amount;
        }
        $this->updateValues($list);
    }

    public function updateValues(array $list){
        $this->totalItems=array_sum($this->conjArticle);
        $this->totalValue=$this->calculate($list);
    }

    
    //emulo que consulte la bd
    public function allItemsDB(){
        return $_SESSION["cart"];
    }

    public function deleteItemDB($params,$list){
        unset($_SESSION["cart"]->conjArticle[$params]);
        $_SESSION["cart"]->updateValues($list);
    }
    


    public function getTotalValue(): float
    {
        return $this->totalValue;
    }

    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    public function getStockItem($id){
        return $this->conjArticle[$id];
    }

}

?>