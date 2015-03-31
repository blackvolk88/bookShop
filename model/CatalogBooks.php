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
	
	public function getBooksByGenre($name)
		{
            if(is_array($name))
            {
                $query = "SELECT * FROM catalogbooks
                JOIN book2genre
                ON book2genre.id_book = catalogbooks.id
                JOIN genres
                ON book2genre.id_genre = genres.id
                WHERE genres = '". implode($name) ."'";
            }
            else
            {
                $query = "SELECT * FROM catalogbooks
                JOIN book2genre
                ON book2genre.id_book = catalogbooks.id
                JOIN genres
                ON book2genre.id_genre = genres.id
                WHERE genres = '$name'";
            }
            $res = $this->mysql->select($query);
            return $res;
		}

    public function getBooksByAuthor($name)
    {
        if(is_array($name))
        {
            $query = "SELECT * FROM catalogbooks
            JOIN book2autors
            ON book2author.id_book = catalogbooks.id
            JOIN authors
            ON book2authors.id_author = authors.id
            WHERE authors = '" . implode($name) . "'";
        }
        else
        {
            $query = "SELECT * FROM catalogbooks
            JOIN book2autors
            ON book2authors.id_book = catalogbooks.id
            JOIN authors
            ON book2authors.id_author = authors.id
            WHERE authors = '$name'";
        }
        $res = $this->mysql->select($query);
        return $res;
    }




}