<?php

/**
 * Mobile api cntroller BY Helkky nurhukmat
 */

defined("BASEPATH") or exit("NOT BRUTAALL ACCESS");


class Api extends MY_Controller
{
    
    function __construct()
    {
            parent::__construct();

            $this->load->model('api_model');

    }



    public function index()
    {
            
    }
}
