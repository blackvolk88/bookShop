<?php

    require_once (dirname(__FILE__).'/../model/Genres.php');
	
    class AuthorController  {
        
		private $model;
		
		public function __construct()
		{
			$this->model = new Genres();
		}
        public function getGenres()
        {
            $res = $this->model->genresSelectAll();
            return $res;
        }

        public function addGenres($data)
        {
            $res = $this->model->genresAdd($data);
            return $res;
        }

        public function updateAuthors($id, $genreName)
        {
            $res = $this->model->genresUpdate($id, $genreName);
            return $res;
        }

        public function deleteAuthors($where)
        {
            $res = $this->model->genresDelete($where);
            return $res;
        }
	}