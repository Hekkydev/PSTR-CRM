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

    // GET DATA KOTA //
    function find_kota()
    {
               $this->db_sistem->where('deleted_date',NULL);
        return $this->db_sistem->get('p_kota')->result_object();    
    }

     function find_kota_by_uuid($uuid)
    {
                $where = array('uuid_kota'=>$uuid);
        return $this->db_sistem->get_where('p_kota',$where);
    }


    
    


    


}
