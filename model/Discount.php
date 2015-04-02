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
        $res = $this->mysql->insert('discount', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function discountDelete($where)
    {
        $res = $this->mysql->delete('discount', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function discountUpdate($id, $discSize)
    {
        $data = array('discount_size' => $discSize);
        $where = array('id' => $id);
        $res = $this->mysql->update('discount', $where, $data);
        if($res)
            return true;
        else
            return false;
    }

    public function discountSelectAll()
    {
        $query = "SELECT * FROM discount";
        $res = $this->mysql->select($query);
        return $res;
    }

    public function discountAddUser($idDiscount, $idUser)
    {
        $data = array('discount_id' => $idDiscount);
        $where = array('id' => $idUser);
        $res = $this->mysql->update('user', $where, $data);
        return $res;
    }

}