<?php  

class ArticleClass{
    
    private static int $sId=0;
    private int $id;
    
    public function __construct(private string $name,private float $price,private int $stock,private float $discount=1){
        $this->id=self::incrementID();
    }


    public function __get(string $name){
        return $this->$name;
    }

    public function __set(string $name,mixed $data):void{
            $this->name=$data;
    }

    private static function incrementID():int{
        self::$sId++;
        return self::$sId;
    }
 
    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return float|int
     */
    public function getDiscount(): float|int
    {
        return $this->discount;
    }

    /**
     * @param float|int $discount
     */
    public function setDiscount(float|int $discount): void
    {
        $this->discount = $discount;
    }





}


?>