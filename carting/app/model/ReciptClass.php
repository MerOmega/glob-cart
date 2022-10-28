<?php

class ReciptClass{

    private static int $buyOrder=0;

    public function __construct(){

    }

    private function updateData($cart){
        $_SESSION["list"]->updateContent($cart);
        unset($_SESSION["cart"]);
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

    public function createTicket($cart){
        self::$buyOrder++;
        var_dump($cart);
        $this->updateData($cart);
    }


}