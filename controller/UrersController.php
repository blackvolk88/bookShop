<?php
	require_once (dirname(__FILE__).'/../model/Users.php');
	
    class userController  {
        
		private $model;
		
		public function __construct()
		{
			$this->model = new Users();
		}
		
        public function checkEmail($email)
        {
            $res = $this->model->returnEmail($email);
            return $res;
        }
		
		public function checkAuth($data)
        {
            $res = $this->model->returnAuth($data);
            return $res;
        }
		
		public function dataUser($data)
        {
            $res = $this->model->returnDataUser($data);
            return $res;
        }
		
		public function insertDb($data)
        {
            $res = $this->model->insertDb($data);
            return $res;
        }
		
	}