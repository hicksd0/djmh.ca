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
		
		$builder = $db->table('notification_schedule');
		
		$builder->select('user.first_name, user.phone_number, notification_schedule.*');
		$builder->join('user', 'user.id = notification_schedule.user_id');
		$builder->where('notification_type_id', '1');
            
        $query = $builder->get();
		$result = $query->getResult();
		
		return $result;
	}
	
}
?>