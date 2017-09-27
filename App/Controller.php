<?php

namespace App;

use App\Model\User;
use App\Model\Comment;
use App\Model\Rating;

abstract class Controller
{
    protected $view;
    protected $action;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        return 'action' . $action;
    }

    public function saveOrUpdate($model)
    {
        $data = [];
        $class = 'App\\Model\\' . ucfirst($model);
        $object = new $class;
        $data[$model] = $this->validate($_POST[$model]);
        $data['product_id'] = $this->validate( $_POST['product']);
        $data['user_id'] = User::getId();

        if ($class::check($data['product_id'], User::getId())){
            $object->update($data);
        } else {
            $object->insert($data);
        }

        return header('Location: /product');
    }

    /**
     * Validate user data
     * @param $data
     * @return string
     */
    protected function validate($data)
    {
        return trim(htmlspecialchars($data));
    }
}