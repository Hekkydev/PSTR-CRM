<?php

/**
 * Author :Hekky Nurhikmat
 */
class Kota extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('api_model'));
        $this->load->library(array('rest_api'));
        $this->check = $this->rest_api->checking();
       
    }

    function get_list()
    {
            if($this->check > 0)
            {
                $data['error'] = "false"; 
                $data['kota']  = $this->api_model->find_kota();
                 echo json_encode($data);
            }else{
                 $data['error'] = "true"; 
                 $data['kota']  = array();
                 echo json_encode($data);
            }

             
    }


    // Cek api menggunakan uuid kota
    function get_id($uuid = null)
    {
            if($this->check > 0)
            {
                $cek_rows = $this->api_model->find_kota_by_uuid($uuid)->num_rows();
                if($cek_rows > 0)
                {
                    $data['error'] = "false"; 
                    $data['kota']  =  $this->api_model->find_kota_by_uuid($uuid)->first_row();
                    echo json_encode($data);
                }else{

                    $data['error'] = "true"; 
                    $data['kota']  = array();
                    echo json_encode($data);
                }
            }else{

                    $data['error'] = "true"; 
                    $data['kota']  = array();
                    echo json_encode($data);
            }

            
    }
}
