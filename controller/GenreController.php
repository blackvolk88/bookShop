<?php

    require_once (dirname(__FILE__).'/../models/Genres.php');
	
    class AuthorController  {
        
		private $model;
		
		public function __construct()
		{
			$this->model = new Genres();
		}
        public function getAuthors()
        {
            $res = $this->model->genresSelectAll();
            return $res;
        }
		
	}