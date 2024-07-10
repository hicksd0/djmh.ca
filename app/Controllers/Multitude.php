<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Multitude extends BaseController{

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

    }


	public function index()
	{
		if($this->data["user"]["is_logged_in"]){
			return redirect()->to('dashboard/index');
		}
		$this->data['page_header'] = "Maintain It Pro";
		return $this->load_view('multitude/index');	
	}
	
	public function your_schedules()
	{
		$this->data['page_header'] = "Your Schedules";
		return $this->load_view('multitude/your_schedules');
	}
	
	public function your_notifications()
	{
		$this->data['page_header'] = "Your Notifications";
		return $this->load_view('multitude/your_notifications');
	}
	
	public function your_assets()
	{
		$this->data['page_header'] = "Your Assets";
		return $this->load_view('multitude/your_assets');
	}
	
}
