<?php
class CartClass{

    private array $conjArticle;
    private float $totalValue;
    private int $totalItems;

    public function __construct(){

    }

    public function getConjArticle(): array
    {
        return $this->conjArticle;
    }

    public function setConjArticle(array $conjArticle): void
    {
        $this->conjArticle = $conjArticle;
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