<?php
	require_once (dirname(__FILE__).'/../model/Users.php');
	
    class userController  {
        
		private $model;
		
		public function __construct()
		{
			$this->model = new Users();
		}

        public function addUser($data)
        {
            $res = $this->model->usersAdd($data);
            return $res;
        }

        public function updateUser($where, $data)
        {
            $res = $this->model->usersUpdate($where, $data);
            return $res;
        }

        public function deleteUser($where)
        {
            $res = $this->model->usersDelete($where);
            return $res;
        }

        public function getUsers()
        {
            $res = $this->model->usersSelectAll();
            return $res;
        }

        public function getUserById($id)
        {
            $res = $this->model->userSelectById($id);
            return $res;
        }

        public function checkEmail($email)
        {
            $res = $this->model->returnEmail($email);
            return $res;
        }

		
	}