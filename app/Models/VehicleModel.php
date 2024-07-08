<?php
namespace App\Models;

use App\Models\BaseModel;

class VehicleModel extends BaseModel
{
	
	public function initModel(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
		 parent::initModel($request, $response, $logger);
		 
	}
	
	public function get_cars(){
	    
		$db = \Config\Database::connect();
		
		$builder = $db->table('vehicle');
		
		$builder->select('vehicle.*');
		$builder->orderby('year');
            
        $query = $builder->get();
		$result = $query->getResult('array');
		
		return $result;
	}
	
}
?>