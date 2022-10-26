<?php
class CartClass{

    private static $instance;
    private array  $conjArticle=[];
    private float $totalValue;
    private int $totalItems;

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

    public function setConjArticle(int $articleId,int $amount): void
    {
        $array = $this->conjArticle;
        if(!array_key_exists($articleId,$array)){
            $this->conjArticle[$articleId]=$amount;
            echo("foo");
        }else{
            $this->conjArticle[$articleId]+=$amount;
            echo("bar");
        }
    }


    public function getTotalValue(): float
    {
        return $this->totalValue;
    }

    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    

    

}

?>