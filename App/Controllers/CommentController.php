<?php

namespace App\Controllers;

use App\Controller;

class CommentController extends Controller
{
    /**
     * Validate user data, if comment isset - update it else insert.
     * @return redirect
     */
    public function actionAdd()
    {
        return $this->saveOrUpdate('comment');
    }
}