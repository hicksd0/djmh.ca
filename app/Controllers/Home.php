<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
	
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //$this->verify_login();
    }
	
    public function index(): string
    {
	    
		$this->data['page_title'] = "Welcome to djmh.ca";

		$this->data['page_header'] = "Home is where the heart is";
		return $this->load_view('multitude/index');
		
	}
}
