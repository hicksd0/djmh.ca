<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssetModel;

class Assets extends BaseController{

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

    }


	public function add()
	{
		if ($this->request->is('post')) {
			//process login attempt
			$request = \Config\Services::request();
			
			$asset["name"] = $request->getPost('asset_name');
			$asset["description"] = $request->getPost('asset_description');
			$asset["manufacture_date"] = $request->getPost('asset_manufacture_date');
			$asset["manufacturer"] = $request->getPost('asset_manufacturer');
			$asset["model"] = $request->getPost('asset_model');
			$asset["serial"] = $request->getPost('asset_serial');
			$asset["parent_asset_id"] = $request->getPost('asset_parent_id');
			$asset_group_id = $request->getPost('asset_group_id');
			
			$this->AssetModel = new AssetModel();
			$this->AssetModel->add_asset($asset, $asset_group_id);
			
			return redirect()->to("dashboard/index");
		}
		
		$this->data['page_header'] = "Add an Asset";
		
		$this->AssetModel = new AssetModel();
		$this->data["asset_groups"] = $this->AssetModel->get_asset_groups($this->user["id"]);
		
		return $this->load_view('assets/add', $this->data);
	}

}
