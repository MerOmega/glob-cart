<?php  

class ArticleClassDB{
    

    private object $db;

    public function __construct(){
        $this->db=new DB();
    }


    public function getArticles()
    {
        $this->db->query("SELECT * FROM articles");
        return $this->db->records();
    }

    public function getSingleArticle($id)
    {
        $this->db->query("SELECT * FROM articles WHERE idarticles=$id");
        return $this->db->singleRecord();
    }

    public function getArticleNumber()
    {
        $this->db->query("SELECT * FROM articles");
        return $this->db->rowCount();
    }

    public function setStock($newStock,$idItem)
    {
        $object=$this->getSingleArticle($idItem);
        var_dump($object);
        $this->db->query("UPDATE articles SET stock=".($object->stock-$newStock)." WHERE idarticles=$idItem");
        $this->db->execute();
    }

    public function existsId(int $idArticle){
        $this->db->query("SELECT DISTINCT(idarticles) FROM articles WHERE idarticles='$idArticle'");
        return $this->db->rowCount();
    }
}


?>