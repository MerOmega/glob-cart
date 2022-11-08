<?php
    class DB{
        private $host=HOST;
        private $user=DB_USER;
        private $pass=DB_PASS;
        private $dbName=DB_NAME;
        //database handler
        private static PDOStatement $stmt;
        private $error;
        //https://github.com/krakjoe/pthreads/issues/120 Using PDO with Static avoid Serialization
        public static $pdo;

        public function __construct()
        {
            $dsn="mysql:dbname=".$this->dbName.";host=".$this->host;
            $options=array(PDO::ATTR_PERSISTENT=>true,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);

            try {
                self::$pdo=new PDO($dsn,$this->user,$this->pass,$options);
                self::$pdo->exec("set names utf8");
            }catch (PDOException $e){
                $this->error = $e->getMessage();
                echo($this->error);
            }
        }
        //https://www.php.net/manual/es/pdo.prepare.php
        public function query($sql)
        {
            self::$stmt=self::$pdo->prepare($sql);
        }

        //https://www.php.net/manual/en/pdostatement.bindparam.php
        public function bind($params,$value,$type=null)
        {
            if(is_null($type)){
                $type =match (true){
                    is_int($value)=>PDO::PARAM_INT,
                    is_bool($value)=>PDO::PARAM_BOOL,
                    is_null($value)=>PDO::PARAM_NULL,
                    default=>PDO::PARAM_STR
                };
            }
            $this->stmt->bindValue($params,$value,$type);
        }

        public function execute()
        {
            return self::$stmt->execute();
        }

        public function records()
        {
            $this->execute();
            return self::$stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function singleRecord()
        {
            $this->execute();
            return self::$stmt->fetch(PDO::FETCH_OBJ);
        }

        public function rowCount()
        {
            $this->execute();
            return self::$stmt->rowCount();
        }
    }
