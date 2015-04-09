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
        $res = $this->mysql->insert('books', $data);
        if($res)
            return true;
        else
            return false;
    }

    public function bookDelete($id)
    {
        $where = array('id' =>$id);
        $res = $this->mysql->delete('books', $where);
        if($res)
            return true;
        else
            return false;
    }

    public function bookUpdate($dataBook, $id)
    {
        $where = array('id' => $id);
        $res = $this->mysql->update('books', $where, $dataBook);
        if($res)
            return true;
        else
            return false;
    }

    public function bookSelectAll()
    {
        $query = "SELECT * FROM books";
        $res = $this->mysql->select($query);
        return $res;
    }
	
	public function getBooksByGenre($id)
		{
            if(is_array($id))
            {
                $query = "SELECT * FROM books
                JOIN bookToGenre
                ON bookToGenre.BookID = books.id
                JOIN genres
                ON bookToGenre.GenreID = genres.id
                WHERE genres.id = '" . implode($id) . "'";
            }
            else
            {
                $query = "SELECT * FROM books
                JOIN bookToGenre
                ON bookToGenre.BookID = books.id
                JOIN genres
                ON bookToGenre.GenreID = genres.id
                WHERE genres.id = '$id'";
            }
            $res = $this->mysql->select($query);
            return $res;
		}

    public function getBooksByAuthor($id)
    {
        if(is_array($id))
        {
            $query = "SELECT * FROM books
            JOIN bookToAuthor
            ON bookToAuthor.BookID = books.id
            JOIN authors
            ON bookToAuthor.AuthorID = authors.id
            WHERE authors.id = '" . implode($id) . "'";
        }
        else
        {
            $query = "SELECT * FROM books
            JOIN bookToAuthor
            ON bookToAuthor.BookID = books.id
            JOIN authors
            ON bookToAuthor.AuthorID = authors.id
            WHERE authors.id = '$id'";
        }
        $res = $this->mysql->select($query);
        return $res;
    }

    public function getBookById($id)
    {
        $query = "SELECT b.*, GROUP_CONCAT(a.FullName) as Authors, GROUP_CONCAT(g.Name) as Genres
                    FROM books as b, authors as a, genres as g, bookToGenre as bg, bookToAuthor as ba
                    WHERE
                    a.ID = ba.AuthorID AND ba.BookID = b.ID
                    AND
                    g.ID = bg.GenreID AND bg.BookID = b.ID
                    AND
                    b.ID = $id;";
        $result = $this->mysql->select($query);
        return $result;
    }


}