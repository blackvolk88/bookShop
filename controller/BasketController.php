<?php

require_once(dirname(__FILE__) . '/../model/ShoppingCart.php');

class BasketController {

    private $model;

    public function __construct()
    {
        $this->model = new BasketController();
    }

    public function addBasket($data)
    {
        $res = $this->model->basketAdd($data);
        return $res;
    }

    public function updateBasket($id, $count)
    {
        $res = $this->model->basketUpdate($id, $count);
        return $res;
    }

    public function deleteBasket($id)
    {
        $res = $this->model->basketDelete($id);
        return $res;
    }

    public function getBasket()
    {
        $res = $this->model->basketSelectAll();
        return $res;
    }

    public function getBasketById($id)
    {
        $res = $this->model->getBasketById($id);
        return $res;
    }

    public function getBasketByUserId($id)
    {
        $res = $this->model->getBasketByUserId($id);
        return $res;
    }

}

