<?php

namespace Model\Manager;

require_once __DIR__ . '/../../Model/Exceptions/ArticleNotFoundException.php';
require_once __DIR__ . '/../../Model/Manager/DbManager.php';
require_once __DIR__ . '/../../Model/Interfaces/ItemInterface.php';
require_once __DIR__ . '/../../Model/Article/Article.php';

use Model\Article\Article;
use Model\Interfaces\ItemInterface;
use Model\Exceptions\ArticleNotFoundException;

/**
 * Manage article from database
 * 
 * Class ArticleManager
 * @package Manager
 */
abstract class CategorieManager extends DbManager implements ItemInterface
{
    /**
     * @param int $id
     * @return mixed|Article
     * @throws ArticleNotFoundException
     * @throws \Exception
     */
    public static function getByName($name)
    {
        // Select article into database
        $stmt = self::getDb()->prepare("
          SELECT categorie
          FROM articles
          WHERE categorie = :id;
        ");
        $stmt->bindValue(":id", $name);
        $stmt->execute();

        // Throw an exception if the article hasn't been found
        if ($stmt->rowCount() === 0) {
            throw new ArticleNotFoundException($name);
        }

       
        $categorie=$stmt->fetch(\PDO::FETCH_ASSOC);
        return $categorie;
    }

    /**
     * @param null $offset
     * @param null $limit
     * @return array|mixed
     * @throws \Exception
     */
    public static function getAll($offset=null, $limit=null)
    {   
        //requete SQL
     
        $request="SELECT distinct categorie 
        FROM articles"; 
                              
        // Select list of article in database
        $stmt = self::getDb()->prepare($request);       
        $stmt->execute();

        // Instantiates a collection of article
        $categories = array();
        while ($categorieData = $stmt->fetch(\PDO::FETCH_ASSOC)) {            
            $categories[] = $categorieData['categorie'];
        }
        

        return $categories;
    }
}