<?php

namespace App\Controllers;

use App\Controller;

class IndexController extends Controller
{
    /**
     * Show index page.
     */
    public function actionIndex()
    {
        //If isset session redirect user to products page
        if (!empty($_SESSION['auth'])) return header('Location: /product');

        $this->view->title = 'Index page';
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }

    /**
     * Page not found
     */
    public function actionPage404()
    {
        $this->view->title = '404';
        $this->view->display(__DIR__ . '/../../templates/404.php');
    }
}