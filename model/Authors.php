<?php

include_once "MySql.php";
class Authors
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }

    public function authorsAdd($data)
    {
        $res = $this->mysql->insert('authors', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function authorsDelete($where)
    {
        $res = $this->mysql->delete('authors', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function authorsUpdate($where, $data)
    {
        $res = $this->mysql->update('authors', $where, $data);
        if($res)
            return true;
        else
            return false;
    }

    public function authorsSelectAll()
    {
        $query = "SELECT * FROM authors";
        $res = $this->mysql->select($query);
        return $res;
    }


}