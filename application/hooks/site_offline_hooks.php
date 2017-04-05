<?php

/**
 * Site_offline_hooks
 * Author : Hekky Nurhikmat
 */
class site_offline_hooks 
{
    var $CI;
    function __construct()
    {
      $this->CI =& get_instance();  
    }

    function is_offline()
    {
        if (file_exists(APPPATH.'config/config.php')) {
          
        }
    }
}
