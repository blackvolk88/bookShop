<?php

include_once "MySql.php";
class Basket
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }

    public function basketAdd($data)
    {
        $res = $this->mysql->insert('shoppingCart', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function basketDelete($id)
    {
        $where = array('id' =>$id);
        $res = $this->mysql->delete('shoppingCart', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function basketUpdate($count, $id)
    {
        $data = array('count' => $count);
        $where = array('id' => $id);
        $res = $this->mysql->update('shoppingCart', $where, $data);
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