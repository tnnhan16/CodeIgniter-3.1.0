<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Breadcrumbs Class
 *
 */
class Breadcrumbs {
	
	/**
	 * Breadcrumbs stack
	 *
     */
	private $breadcrumbs = array();
	 	
	 /**
	  * Constructor
	  *
	  * @access	public
	  *
	  */
	public function __construct()
	{	
		$this->ci =& get_instance();
		// Load config file
		$this->ci->load->config('breadcrumbs');
		// Get breadcrumbs display options
		$this->breadcrumbs = $this->ci->config->item('breadcrumbs');
	}

	/**
	 * Generate breadcrumb
	 *
	 * @access public
     * @param $uri
	 * @return string
	 */		
	function create($uri)
	{
        $router_list = $this->breadcrumbs['router'];
        $list = [];
		if(!empty($uri->segments)){
            $urlCurrents = $uri->segments;
            $keyRouterStr = "";
            foreach($urlCurrents as $name){
                $keyRouterStr = !empty($keyRouterStr) ? $keyRouterStr . "/" . $name : $name;
                if(isset($router_list[$keyRouterStr])){                
                    $list[] = array("key" => $keyRouterStr,"value" => $router_list[$keyRouterStr]);
                }
            }
        }
        return $list;
	}

}