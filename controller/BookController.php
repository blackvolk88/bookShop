<?php
    
	require_once (dirname(__FILE__).'/../model/CatalogBooks.php');
    
    class BookController {
	
		private $model;
		
		public function __construct()
		{
			$this->model = new CatalogBooks();
		}
        
        public function getBooks()
        {
            $res = $this->model->bookSelectAll();
            return $res;
        }
		
		public function getBookById($id)
        {
            $res = $this->model->returnBook($id);
            return $res;
        }       
		
		public function getBooksAuthor($name)
        {
            $res = $this->model->getBooksByAuthor($name);
            return $res;
        }
		
		public function getBooksGenre($name)
        {
            $res = $this->model->getBooksByGenre($name);
            return $res;
        }
		
		public function getAuthorsBook($id)
        {
            $res = $this->model->returnAuthorsFromBook($id);
            return $res;
        }
		
		
		public function getGenresBook($id)
        {
            $res = $this->model->returnGenresFromBook($id);
            return $res;
        }
		
		
    }

