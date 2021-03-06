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
        $data = array('Name' => $genreName);
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

    public function getGenreByBook($id)
    {
        if (is_array($id)) {
            $query = "SELECT * FROM genres
            JOIN bookToGenre
            ON bookToGenre.GenreID = genres.id
            JOIN books
            ON bookToGenre.BookID = books.id
            WHERE books.id = '" . implode($id) . "'";
        } else {
            $query = "SELECT * FROM genres
            JOIN bookToGenre
            ON bookToGenre.GenreID = genres.id
            JOIN books
            ON bookToGenre.BookID = books.id
            WHERE books.id = '" . implode($id) . "'";
        }
        $res = $this->mysql->select($query);
        return $res;
    }
}