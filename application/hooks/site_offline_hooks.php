<?php

/**
 * Site_offline_hooks
 * Author : Hekky Nurhikmat
 */
 class site_offline_hooks {

     public function __construct()
     {
        log_message('debug','Accessing site_offline hook!');
     }

     public function is_offline()
     {
       if(file_exists(APPPATH.'config/config.php'))
       {
           include(APPPATH.'config/config.php');

           if(isset($config['is_offline']) && $config['is_offline']===TRUE)
           {
             $ip_maintenance = $config['ip_maintenance'];
             if(in_array($_SERVER['REMOTE_ADDR'],$ip_maintenance,TRUE)){
               
             }else{
               $this->show_site_offline();
               exit;
             }


           }
       }
     }

     private function show_site_offline()
     {
          include('others/maintenance.php');
     }

 }
