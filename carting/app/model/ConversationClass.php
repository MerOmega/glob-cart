<?php 

class ConversationClass {
    
    private static int $id;
    private static $instance;
    private array $actions=[];
    
    private function __construct(){

    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance= new static();
        }
        return self::$instance;
    }

    public function saveAction($status,$content){
        
    }
}