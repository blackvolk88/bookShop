<?php

include_once "MySql.php";

class ShoppingCart
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }

    public function addToCart($data)
    {
        $res = $this->mysql->insert('shoppingCart', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function DeleteFromCart($id)
    {
        $where = array('id' =>$id);
        $res = $this->mysql->delete('shoppingCart', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function updateCart($count, $id, $userId)
    {
        $data = array('Count' => $count);
        $where = '`id` = ' . $id . ' AND `UserID` = ' . $userId;
        $res = $this->mysql->update('shoppingCart', $data, $where);
        if($res)
            return true;
        else
            return false;
    }

    public function basketSelectAll()
    {
        $query = "SELECT * FROM shoppingCart";
        $res = $this->mysql->select($query);
        return $res;
    }


    public function getBasketById($id)
    {
        $query = "SELECT * FROM shoppingCart WHERE id = '$id'";
        $res = $this->mysql->select($query);
        return $res;
    }

    public function getBasketByUserId($id)
    {
        $query = "SELECT * FROM shoppingCart WHERE UserID='$id'";
        $res = $this->mysql->select($query);
        return $res;
    }

}