<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MX_Controller {

	function __construct() 
    {
        /*
        * Here are some options provided by the MY_Controller class, you
        * can adjust as you need to your project.
        */
        // Enable the CodeIgniter Profile.
        // $this->wpn_profiler = FALSE;
        // Chose the template folder.
        // $this->wpn_template = 'default';
        // Setup the 'col' number of the mosaic views.
        // $this->wpn_cols_mosaic = 3;
        parent::__construct();
    }
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->render('welcome');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */