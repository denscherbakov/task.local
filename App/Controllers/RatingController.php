<?php

namespace App\Controllers;

use App\Controller;

class RatingController extends Controller
{
    /**
     * Validate user data, if comment isset - update it else insert.
     * @return redirect
     */
    public function actionAdd()
    {
        return $this->saveOrUpdate('rating');
    }
}