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

    public function discountUpdate($where, $data)
    {
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


}