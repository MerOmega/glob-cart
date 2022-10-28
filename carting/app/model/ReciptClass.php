<?php

class ReciptClass{

    private static int $buyOrder=0;
    private array $items=[];
    private string $date;
    private float $finalprice=0;

    public function __construct(){
        self::$buyOrder++;
        $this->date=date("D M d, Y G:i");
    }

    private function updateData($cart){
        $_SESSION["list"]->updateContent($cart);
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

    /**
     * @return int
     */
    public static function getBuyOrder(): int
    {
        return self::$buyOrder;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return float|int
     */
    public function getFinalprice(): float|int
    {
        return $this->finalprice;
    }


    public function createTicket($cart){
        $this->finalprice=$_SESSION["cart"]->getTotalValue();
        $this->updateData($cart);
    }


}