<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController{

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //$this->verify_login();
    }


	public function login()
	{
	    
		$this->data['page_title'] = "Login";
		$this->data['page_header'] = "Home is where the heart is";
		
		return $this->load_view('auth/login');
		
	}
	
	public function logout(){
		$session = session();
		$session->destroy();
		return redirect()->to("multitude/index");
	}
}
