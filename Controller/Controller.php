<?php
require_once('../Model/Data/Connexion.class.php');
require_once('../Model/Entity/Article.class.php');
require_once('../Model/Manager/ArticleManager.class.php');
require_once('../Model/Entity/Categorie.class.php');
require_once('../Model/Manager/CategorieManager.class.php');
require_once('../Model/Entity/User.class.php');
require_once('../Model/Manager/UserDAO.class.php');

/**
 * 
 * @author med - electron - rango cheikh
 * @since 08/07/19
 * @version 1.0
 *  
 * Classe représentant le controller  et comportant des méthodes implementés 
 * en fonction de la requête d'un utilisateur.
 * 
 */
class Controller
{
    private $connexion;
    private $articleManager;
    private $categorieManager;
    public  $allArticles;
    public  $allCategories;
    public  $article;

    public function __construct()
    {
        $this->connexion = \Connexion::getConnexion();
        $this->articleManager = new \ArticleManager($this->connexion);
        $this->categorieManager = new \CategorieManager($this->connexion);
        $this->allArticles = $this->articleManager->getAll();
        $this->allCategories = $this->categorieManager->getAll();
     
    }

    
    
    public function articleByCategory($id)
    {
        $itemArticles = $this->articleManager->getByCategory($id);
        return $itemArticles;
    }

    public function article($id)
    {
        $article = $this->articleManager->get($id);
        return $article;
    }

    public function home(){
        header('Location:accueil');
        exit();
    }
}
