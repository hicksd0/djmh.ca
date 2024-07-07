<?php
namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model {

	public function initModel(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
		 parent::initModel($request, $response, $logger);
		 
	}
}
?>