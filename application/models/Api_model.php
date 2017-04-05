<?php


/**
 * Api model by hekky nurhikmat
 */
class Api_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();

        $this->db_siste = $this->load->database('shuttle',TRUE);
    }

    public function  find_access_kota()
    {

    }
}
