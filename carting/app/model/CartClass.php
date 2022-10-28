<?php
class CartClass{

    private static $instance;
    private array $conjArticle=[];
    private float $totalValue=0;
    private int $totalItems=0;

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
                $idItem = $value->getId();
                if(array_key_exists($idItem,$this->conjArticle)){
                    $total+=($this->conjArticle[$value->getId()]*$value->getPrice());
                } 
            }
            return $total;
    }

    public function setConjArticle(int $articleId,int $amount): void
    {
        
        if(!array_key_exists($articleId,$this->conjArticle)){
            $this->conjArticle[$articleId]=$amount;
        }else{
            $this->conjArticle[$articleId]+=$amount;
        }
        $this->updateValues();
    }

    public function updateValues(){
        $lista=$_SESSION["list"];
        $this->totalItems=array_sum($this->conjArticle);
        $this->totalValue=$this->calculate($lista->getColecction());
    }

    public function getTotalValue(): float
    {
        return $this->totalValue;
    }

    public function getTotalItems(): int
    {
        return $this->totalItems;
    }


    //emulo que consulte la bd
    public function allItemsDB(){
        return $_SESSION["cart"];
    }

    public function deleteItemDB($params){
        unset($_SESSION["cart"]->conjArticle[$params]);
        $_SESSION["cart"]->updateValues();
    }
    

}

?>