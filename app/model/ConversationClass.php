<?php 

class ConversationClass {
    
    private static int $id;
    private static $instance;
    private array $actions=[];
    
    private function __construct(){
        $this->db=new DB();
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance= new static();
        }
        return self::$instance;
    }


    public function persistActions(){
        $data =json_encode($this->getAction());
        $this->db->query("INSERT INTO `conversation` (`content`) VALUES ('$data')");
        $this->db->execute();
        unset($_SESSION["conversation"]);
    }

    public function saveAction($string){
        array_push($this->actions,$string);
    }


    public function getActions(){
        $this->db->query("SELECT * FROM `conversation`");
        return $this->db->records();
    }


    public function getAction(){
        return $this->actions;
    }
}