<?php
    
	require_once (dirname(__FILE__).'/../model/CatalogBooks.php');
    
    class BookController {
	
		private $model;
		
		public function __construct()
		{
			$this->model = new CatalogBooks();
		}

        public function addBook($data)
        {
            $res = $this->model->bookAdd($data);
            return $res;
        }

        public function updateBook($id, $dataBook)
        {
            $res = $this->model->bookUpdate($id, $dataBook);
            return $res;
        }

        public function deleteBook($where)
        {
            $res = $this->model->bookDelete($where);
            return $res;
        }

        public function getBooks()
        {
            $res = $this->model->bookSelectAll();
            return $res;
        }
		
		public function getBookById($id)
        {
            $res = $this->model->getBookById($id);
            return $res;
        }       
		
		public function getBooksAuthor($id)
        {
            $res = $this->model->getBooksByAuthor($id);
            return $res;
        }
		
		public function getBooksGenre($id)
        {
            $res = $this->model->getBooksByGenre($id);
            return $res;
        }

		
		
    }

