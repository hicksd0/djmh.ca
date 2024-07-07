<?php
namespace App\Models;

use App\Models\BaseModel;

class NotificationModel extends BaseModel
{
	
	public function initModel(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
		 parent::initModel($request, $response, $logger);
		 
	}
	
	public function get_notifications(){
	    
		$db = \Config\Database::connect();
		
		$builder = $db->table('garbage_notifications');
		
		$builder->select('user.first_name, user.phone_number, garbage_notifications.*');
		$builder->join('user', 'user.id = garbage_notifications.user_id');
            
        $query = $builder->get();
		$result = $query->getResult();
		
		return $result;
	}
	
}
?>