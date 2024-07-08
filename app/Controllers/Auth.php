<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController{

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

    }


	public function login()
	{
		if ($this->request->is('post')) {
			//process login attempt
			$request = \Config\Services::request();
			
			$email = $request->getPost('email');
			$sha256_password = hash("sha256",$request->getPost('password'));
			
			$this->UserModel = new UserModel();
			$user = $this->UserModel->get_user($email, $sha256_password);
			
			if(isset($user) && isset($user->id)){
				$user->is_logged_in = true;
				$this->log_in_user($user);
				return redirect()->to("dashboard/index");
			} else {
				//error
				$this->data["user_error_message"] = "Invalid login.";
			}
		}
		
		$this->data['page_title'] = "Login";
		$this->data['page_header'] = "Login";
		
		return $this->load_view('auth/login');
	}
	
	public function logout(){
		$session = session();
		$session->destroy();
		return redirect()->to("multitude/index");
	}
}
