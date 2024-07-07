<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Multitude extends BaseController{

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //$this->verify_login();
    }


	public function index()
	{
		$this->data['page_title'] = "Welcome to djmh.ca";
		$this->data['page_header'] = "Home is where the heart is.";
		return $this->load_view('multitude/index');
		
	}
	
	public function stuff()
	{
		$this->data['page_title'] = "This title changes.";
		$this->data['page_header'] = "Usefull Stuff";
		return $this->load_view('multitude/stuff');
		
	}
	
}
