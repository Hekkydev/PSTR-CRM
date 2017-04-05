<?php

/**
 * Simple Rest Api Library by : Hekky Nurhikmat
 * Method :GET
 */

class Rest_api
{
    var $CI;
    function __construct()
    {
        $this->CI =& get_instance();
        
        $this->CI->load->config('rest_api',TRUE);
        $config_api           = $this->CI->config->item('rest_api');
        $this->URL            = $config_api['ci_api_url'];
        $this->API_KEY        = $config_api['ci_api_key'];
        $this->API_REQUEST    = isset($_SERVER['HTTP_APIKEY']) ? $_SERVER['HTTP_APIKEY'] : '';      
        $this->METHOD         = $_SERVER['REQUEST_METHOD'];
       
    }

    function checking()
    {
        if($this->METHOD == "GET"){
            if($this->API_KEY == $this->API_REQUEST)
            {
                return 1;
            }else{
                return 0;
            }
        }else{
                return 0;
        }  
    }
}
