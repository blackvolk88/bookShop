<?php

    require_once (dirname(__FILE__).'/../model/Authors.php');
	
    class AuthorController  {
        
		private $model;
		
		public function __construct()
		{
			$this->model = new Authors();
		}
        public function getAuthors()
        {
            $res = $this->model->authorsSelectAll();
            return $res;
        }
		
	}