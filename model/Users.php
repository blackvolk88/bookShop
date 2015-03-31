<?php

include_once "MySql.php";
class Users
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }

    public function usersAdd($data)
    {
        $res = $this->mysql->insert('user', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function usersDelete($where)
    {
        $res = $this->mysql->delete('user', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function usersUpdate($where, $data)
    {
        $res = $this->mysql->update('user', $where, $data);
        if($res)
            return true;
        else
            return false;
    }

    public function usersSelectAll()
    {
        $query = "SELECT * FROM user";
        $res = $this->mysql->select($query);
        return $res;
    }


}