<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
	public $user;
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
		
        $this->data = Array();
        $this->data['page_title'] = "Maintain It Pro";
        $this->data['page_header'] = 'Default Header';
		$this->data["user_error_message"] = "";
		
		$this->user  = (array) session()->get('user');
		$this->data["user"] = $this->user;
		
		if(count($this->data["user"]) == 0){
			$this->data["user"]["is_logged_in"] = false;
		}
    }
	
	public function log_in_user($user){
		$session = session();
		$session->set('user', $user);
	}

	public function load_view($view_name){
        return view('templates/header', $this->data)
        . view($view_name, $this->data)
        . view('templates/footer', $this->data);
    }
}
