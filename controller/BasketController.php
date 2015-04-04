<?php

require_once (dirname(__FILE__).'/../model/Basket.php');

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

    public function updateOrder($id, $statusName)
    {
        $res = $this->model->orderUpdate($id, $statusName);
        return $res;
    }

    public function deleteBook($orderId)
    {
        $res = $this->model->orderDelete($orderId);
        return $res;
    }

    public function getOrders()
    {
        $res = $this->model->ordersSelectAll();
        return $res;
    }

    public function getOrderById($id)
    {
        $res = $this->model->getOrderById($id);
        return $res;
    }

    public function getOrderByUserId($id)
    {
        $res = $this->model->getOrderByUserId($id);
        return $res;
    }

}

