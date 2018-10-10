<?php

namespace Controller;

use Model\Manager\ArticleManager;

require_once __DIR__ . '/../Controller/LayoutController.php';
require_once __DIR__ . '/../Model/Manager/ArticleManager.php';

/**
 * Class HomeController
 * @package Controller
 */
class HomeController extends LayoutController
{
    /**
     * Homepage View action
     *
     * @return mixed|void
     * @throws \Exception
     * @throws \View\Exceptions\ViewException
     */
    public function viewAction()
    {
        $limit=3;
        if(isset($_POST['num'])){
           $limit=$_POST['num']; 
        }
        if(isset($_GET['p'])&&$_GET['p']>1){
            $offset=($_GET['p']-1)*$limit; 
        }
        else{
            $offset=0;
        }       
        $params = [ 'articles' => ArticleManager::getAll($offset,$limit),
        'number'=> ceil(sizeof(ArticleManager::getAll())/$limit)];

        $this->render('home', $params);
    }
}