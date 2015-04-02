<?php
	require_once (dirname(__FILE__).'/../model/Users.php');
    require_once (dirname(__FILE__).'/../model/Discount.php');
	
    class userController  {
        
		private $model;
        private $discount;
		
		public function __construct()
		{
			$this->model = new Users();
		}

        public function addUser($data)
        {
            $res = $this->model->usersAdd($data);
            return $res;
        }

        public function updateUser($id, $dataUser)
        {
            $res = $this->model->usersUpdate($id, $dataUser);
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

        public function addDiscount($idUser, $idDiscount)
        {
            $res = $this->discount->discountAddUser($idDiscount, $idUser);
            return $res;
        }
		
	}