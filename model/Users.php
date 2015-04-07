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
        $res = $this->mysql->insert('users', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function usersDelete($id)
    {
        $where = array('id' =>$id);
        $res = $this->mysql->delete('users', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function usersUpdate($id, $dataUser)
    {
        $where = array('id' => $id);
        $res = $this->mysql->update('users', $where, $dataUser);
        if($res)
            return true;
        else
            return false;
    }

    public function usersSelectAll()
    {
        $query = "SELECT * FROM users";
        $res = $this->mysql->select($query);
        return $res;
    }

    public function userSelectById($id)
    {
        $query = "SELECT * FROM users WHERE users.id= '$id'";
        $res = $this->mysql->select($query);
        return $res;
    }

}