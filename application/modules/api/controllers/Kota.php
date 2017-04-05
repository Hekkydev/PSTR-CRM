<?php

/**
 * 
 */
class Kota extends CI_Controller
{
    
    function __construct()
    {
        $this->load->model(array('api_model'));
        $this->load->library(array('rest_api'));
    }

    function index_get()
    {
            
    }
}
