<?php

final class Emulator{

    private static $instance;
    private array $colecction=[];

    private final function __construct(){
       $this->createDB();
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance= new static();
        }
        return self::$instance;
    }
    function getRandomWord($len = 10) {
        $word = array_merge(range('a', 'z'), range('A', 'Z'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }

    private function createDB(){
        for($i=0;$i<20;$i++){
            $this->colecction[$i]= new ArticleClass($this->getRandomWord(),rand(10,4000),10);
        }
    }

    public function updateContent($array){
             
    }

    public function getColecction(): array
    {
        return $this->colecction;
    }



}