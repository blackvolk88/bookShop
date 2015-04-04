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

        public function addAuthors($data)
        {
            $res = $this->model->authorsAdd($data);
            return $res;
        }

        public function updateAuthors($id, $authorName)
        {
            $res = $this->model->authorsUpdate($id, $authorName);
            return $res;
        }

        public function deleteAuthors($where)
        {
            $res = $this->model->authorsDelete($where);
            return $res;
        }

	}