<?php

include_once "MySql.php";
class CatalogBooks
{
    private $mysql = null;

    public function __construct()
    {
        $this->mysql = MySql::getInstance();
    }

    public function bookAdd($data)
    {
        $res = $this->mysql->insert('catalogbooks', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function bookDelete($where)
    {
        $res = $this->mysql->delete('catalogbooks', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function bookUpdate($where, $data)
    {
        $res = $this->mysql->update('catalogbooks', $where, $data);
        if($res)
            return true;
        else
            return false;
    }

    public function bookSelectAll()
    {
        $query = "SELECT * FROM catalogbooks";
        $res = $this->mysql->select($query);
        return $res;
    }
	
	public function selectBooksByGenre($name)
		{
			$query = "SELECT * FROM books
			JOIN book2genre
			ON books2genre.id_book = books.id
			JOIN genres
			ON genres.genre_id = genre.id
			WHERE genres = '$name'";
			$res = $this->mysql->query($query);
			return $res;
		}

}