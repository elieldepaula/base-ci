<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2015 Wiredesignz
 * @version 	5.5
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	
	public $autoload = array();
	
	/**
    * Enable or disable CodeIgniter profiler.
    * 
    * $var $wpn_profiler
    */
	var $wpn_profiler = FALSE;

    /**
    * Default template folder.
    * 
    * $var $wpn_template
    */
	var $wpn_template = 'default';

    /**
    * Default posts view list.
    * 
    * $var $wpn_posts_view
    */
	var $wpn_posts_view = 'list';

    /**
    * Default column number.
    * 
    * $var $wpn_cols_mosaic
    */
    var $wpn_cols_mosaic = 3;

    /**
    * Common data to header view.
    * 
    * $var $data_header
    */
    var $data_header = array();

    /**
    * Common data to content view.
    * 
    * $var $data_content
    */
    var $data_content = array();

    /**
    * Common data to footer.
    * 
    * $var $data_footer
    */
    var $data_footer = array();
	
	public function __construct() 
	{
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);
		$this->output->enable_profiler($this->wpn_profiler);
	}
	
	public function __get($class) 
	{
		return CI::$APP->$class;
	}
	
	/**
    * The render () method encapsulates the common code of views. It was 
    * thought that you will carry the views header, content and footer 
    * on each method in the controller.
    *
    * If you need to, you can change this method depending on your project.
    *
    * @param $view string Name of the view.
    * @return void
    */
	public function render($view) 
    {
        $this->load->view($this->wpn_template.'/header', $this->data_header);
        $this->load->view($this->wpn_template.'/'.$view, $this->data_content);
        $this->load->view($this->wpn_template.'/footer', $this->data_footer);
    }
}