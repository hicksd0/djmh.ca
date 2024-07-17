<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehicleModel;
use App\Models\AssetModel;

class Dashboard extends BaseController
{
	
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

    }
	
    public function index(): string
    {
	    
		$this->data['page_header'] = "Dashboard";
		
		
		$this->AssetModel = new AssetModel();
		$this->data["assets"] = $this->AssetModel->get_assets($this->user["id"]);
		
		return $this->load_view('dashboard/index', $this->data);
		
	}
	
	public function cars(): string
    {
	    
		$this->data['page_title'] = "Cars Cars Cars";
		$this->data['page_header'] = "Vehicles";
		
		$this->VehicleModel = new VehicleModel();
		$this->data["cars"] = $this->VehicleModel->get_cars();
		
		return $this->load_view('dashboard/cars', $this->data);
		
	}
}
