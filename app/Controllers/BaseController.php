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
        $this->data['page_title'] = 'djmh.ca a site for things.';
        $this->data['page_header'] = 'Default Header';
    }
	
	public function verify_login(){
		$controller = $this->router->fetch_class();
		$method = $this->router->fetch_method();
		
		$session_data = $this->session->userdata;
		
		$user_data["is_logged_in"] = false;
		if(isset($session_data) && isset($session_data["user"])){
			$user_data = $session_data["user"];
		}
		
		//access logic here to kick the user to the home page if they don't have access or are not logged in.
		if ($user_data["is_logged_in"] == false){
			redirect('/multitude/', 'refresh');
		}
	}

	public function load_view($view_name){
        return view('templates/header', $this->data)
        . view($view_name, $this->data)
        . view('templates/footer', $this->data);
    }
}
