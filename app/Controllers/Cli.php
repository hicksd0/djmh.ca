<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotificationModel;

class Cli extends BaseController {
	
	public function garbage_collection()
	{
	    
		date_default_timezone_set('EST5EDT');
	    
	    echo date("H:i:s", time());
	    
		require_once '/home3/hicksdo/public_html/app/Libraries/Twilio/autoload.php';

		// Find your Account Sid and Auth Token at twilio.com/console
		// and set the environment variables. See http://twil.io/secure
		$sid = "ACe2be71ab268b7a972687f74871fd6320";
		$token = "464a29536c072b6a450395bd563da7be";
		$twilio = new \Twilio\Rest\Client($sid, $token);
		
		$this->NotificationModel = new NotificationModel();
		$notifications = $this->NotificationModel->get_notifications();
		
		
		foreach($notifications as $a_notification){
			
			$start_date = $a_notification->since_date;
			$current_sunday = date("Y-m-d", strtotime('sunday this week'));
			$current_date = date("Y-m-d");

			$cursor = $start_date;

			while ($cursor < $current_sunday){
				$cursor = date("Y-m-d", strtotime($cursor . ' +'. $a_notification->every_number_of_weeks .' Week'));
			}
			
			//If it is a notification week
			if($cursor == $current_sunday){
				
				$c_hour = date("H", time());
				$c_minute = date("i", time());
				$dayofweek = date('w', strtotime(date("Y-m-d")));
				
				if($c_hour == $a_notification->hour_of_day && $c_minute == $a_notification->minute_of_hour && $dayofweek == $a_notification->day_of_week){

					$tomorrow = date("Y-m-d", strtotime($current_date . ' +1 Day'));
					
					$t_sms = "Hi " . $a_notification->first_name . "! Tomorrow, " . $tomorrow . ", is garbage collection day!";
	
					$message = $twilio->messages->create(
						$a_notification->phone_number,
						["body" => $t_sms, 
						"from" => "+16052777352"]
					);
				}
				
			}
			
		}
		
		return "";
	}
}
