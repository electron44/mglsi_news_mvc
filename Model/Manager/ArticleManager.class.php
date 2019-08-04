<?php

/**
 * 
 * @author med - electron - rango cheikh
 * @since 08/07/19
 * @version 1.0
 * 
 */
class ArticleManager 
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function getDb()
    {
        return $this->db;
    }

    private function setDb($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $articles = array();

        $request = $this->db->query('SELECT * FROM Article');

        while($data = $request->fetch(PDO::FETCH_ASSOC))
        {
            $articles [] = new Article($data);
        }
        
        return $articles;
    }

    public function get($id)
    {
        $id = (int) $id;

        $request = $this->db->query('SELECT * FROM Article WHERE id = '.$id);
        $data = $request->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    public function getByCategory($category)
    {
        $articles = array();
        $category = (int) $category;

        $request = $this->db->prepare('SELECT * FROM Article WHERE categorie = :categorie');
        $request->execute(array(
            'categorie' => $category
        ));
        return $articles = $request->fetchAll(PDO::FETCH_OBJ);
    }
    
}