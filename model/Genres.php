<?php

include_once "MySql.php";
class Genres
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }

    public function genresAdd($data)
    {
        $res = $this->mysql->insert('genres', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function genresDelete($id)
    {
        $where = array('id' =>$id);
        $res = $this->mysql->delete('genres', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function genresUpdate($id, $genreName)
    {
        $data = array('genres' => $genreName);
        $where = array('id' => $id);
        $res = $this->mysql->update('genres', $where, $data);
        if($res)
            return true;
        else
            return false;
    }

    public function genresSelectAll()
    {
        $query = "SELECT * FROM genres";
        $res = $this->mysql->select($query);
        return $res;
    }


}