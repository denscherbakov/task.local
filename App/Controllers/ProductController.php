<?php

namespace App\Controllers;

use App\Controller;
use App\Model\Comment;
use App\Model\Product;
use App\Model\Rating;
use App\Model\User;

class ProductController extends Controller
{
    /**
     * Products page, all products.
     */
    public function actionIndex()
    {
        //If session not isset redirect user to login page
        if (empty($_SESSION['auth'])) return header('Location: /');

        $products = Product::findAll();

        //Add to one array all user activities
        $userActivities = [];
        $userActivities['comments'] = Comment::byCurrentUser(User::getId());;
        $userActivities['ratings'] = Rating::byCurrentUser(User::getId());;

        $this->view->title = 'Products page';
        $this->view->products = $products;
        $this->view->userActivities = $userActivities;
        $this->view->display(__DIR__ . '/../../templates/products.php');
    }

    /**
     * View one product.
     * @param $id
     */
    public function actionOne($id)
    {
        //If session not isset redirect user to login page
        if (empty($_SESSION['auth'])) return header('Location: /');

        //Find product
        $product = Product::findById($id);
        //Find all product ratings
        $ratings = Product::getRates($id);
        //Find all product comments
        $comments = Product::getComments($id);

        //Get authors of comments and consider ratings sum
        $ratesSum = 0;
        foreach ($ratings as $rating){
            $rating->user = User::findById($rating->user_id)->login;
            $ratesSum += $rating->rate;
        }

        //Add to one array all user activities for current product
        $userActivities = [];
        $userActivities['comments'] = $comments;
        $userActivities['ratings'] = $ratings;
        $userActivities['ratesSum'] = $ratesSum;
        $userActivities['ratesAvg'] = $ratesSum / count($ratings);

        $this->view->title = $product->name;
        $this->view->product = $product;
        $this->view->userActivities = $userActivities;
        $this->view->display(__DIR__ . '/../../templates/product.php');
    }
}