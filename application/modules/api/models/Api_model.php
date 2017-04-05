<?php

/**
 * Api Model Create by Hekky Nurhikmat
 */
class Api_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
        $this->db_sistem = $this->load->database('shuttle',TRUE);
    }

    function find_kota()
    {
        $this->db_sistem->where('deleted_date'.NULL);
        $this->db_sistem->get('p_kota');    
    }


}
