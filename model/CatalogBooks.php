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

    public function bookDelete($id)
    {
        $where = array('id' =>$id);
        $res = $this->mysql->delete('catalogbooks', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function bookUpdate($dataBook, $id)
    {
        $where = array('id' => $id);
        $res = $this->mysql->update('catalogbooks', $where, $dataBook);
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
	
	public function getBooksByGenre($id)
		{
            if(is_array($id))
            {
                $query = "SELECT * FROM catalogbooks
                JOIN book2genre
                ON book2genre.id_book = catalogbooks.id
                JOIN genres
                ON book2genre.id_genre = genres.id
                WHERE genres = '". implode($id) ."'";
            }
            else
            {
                $query = "SELECT * FROM catalogbooks
                JOIN book2genre
                ON book2genre.id_book = catalogbooks.id
                JOIN genres
                ON book2genre.id_genre = genres.id
                WHERE genres = '$id'";
            }
            $res = $this->mysql->select($query);
            return $res;
		}

    public function getBooksByAuthor($id)
    {
        if(is_array($id))
        {
            $query = "SELECT * FROM catalogbooks
            JOIN book2autors
            ON book2author.id_book = catalogbooks.id
            JOIN authors
            ON book2authors.id_author = authors.id
            WHERE authors = '" . implode($id) . "'";
        }
        else
        {
            $query = "SELECT * FROM catalogbooks
            JOIN book2autors
            ON book2authors.id_book = catalogbooks.id
            JOIN authors
            ON book2authors.id_author = authors.id
            WHERE authors = '$id'";
        }
        $res = $this->mysql->select($query);
        return $res;
    }

    public function getBookById($id)
    {
        $query = "SELECT * FROM catalogbooks WHERE id = '$id'";
        $res = $this->mysql->select($query);
        return $res;
    }


}