<?php
namespace App\Models;

use App\Models\BaseModel;

class UserModel extends BaseModel
{
	
	public function initModel(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
		 parent::initModel($request, $response, $logger);
		 
	}
	
	public function get_user($email, $sha256_password){
	    
		$db = \Config\Database::connect();
		
		$builder = $db->table('user');
		
		$builder->select('user.*');
		$builder->where('email', $email);
		$builder->where('password', $sha256_password);
            
        $query = $builder->get();
		$result = $query->getRow();
		
		return $result;
	}
	
	public function get_asset_group(){
		
		$db = \Config\Database::connect();
		
		$builder = $db->table('user');
		
		$builder->select('user.*');
		$builder->where('email', $email);
		$builder->where('password', $sha256_password);
            
        $query = $builder->get();
		$result = $query->getRow();
		
		return $result;
	}
}
?>