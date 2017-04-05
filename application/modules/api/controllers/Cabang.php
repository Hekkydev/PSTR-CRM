<?php

/**
 * Author :Hekky Nurhikmat
 */
class Cabang extends CI_Controller
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
                $data['cabang']  = $this->api_model->find_cabang();
                 echo json_encode($data);
            }else{
                 $data['error'] = "true"; 
                 $data['cabang']  = array();
                 echo json_encode($data);
            }

             
    }


    // Cek api menggunakan uuid cabang
    function get_id($uuid = null)
    {
            if($this->check > 0)
            {
                $cek_rows = $this->api_model->find_cabang_by_uuid($uuid)->num_rows();
                if($cek_rows > 0)
                {
                    $data['error'] = "false"; 
                    $data['cabang']  =  $this->api_model->find_cabang_by_uuid($uuid)->first_row();
                    echo json_encode($data);
                }else{

                    $data['error'] = "true"; 
                    $data['cabang']  = array();
                    echo json_encode($data);
                }
            }else{

                    $data['error'] = "true"; 
                    $data['cabang']  = array();
                    echo json_encode($data);
            }

            
    }
}
