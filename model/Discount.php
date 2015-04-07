<?php

include_once "MySql.php";
class Discount
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }

    public function discountAdd($data)
    {
        $res = $this->mysql->insert('discounts', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function discountDelete($id)
    {
        $where = array('id' =>$id);
        $res = $this->mysql->delete('discounts', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function discountUpdate($id, $discSize)
    {
        $data = array('Percent' => $discSize);
        $where = array('id' => $id);
        $res = $this->mysql->update('discounts', $where, $data);
        if($res)
            return true;
        else
            return false;
    }

    public function discountSelectAll()
    {
        $query = "SELECT * FROM discounts";
        $res = $this->mysql->select($query);
        return $res;
    }

    public function discountAddUser($idDiscount, $idUser)
    {
        $data = array('DiscountID' => $idDiscount);
        $where = array('id' => $idUser);
        $res = $this->mysql->update('users', $where, $data);
        return $res;
    }

}