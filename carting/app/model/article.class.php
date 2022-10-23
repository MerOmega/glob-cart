<?php  

class article{
    
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




}


?>