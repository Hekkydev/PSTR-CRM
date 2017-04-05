<?php

/**
 * Booking Model By Hekky Nurhikmat
 */


class Booking_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
        
          $this->db_sistem = $this->load->database('shuttle', TRUE);
    }


    public function cabang_find_active()
    {
       
        $this->db_sistem->where('deleted_date',NULL);
        $query = $this->db_sistem->get('p_cabang');
        return $query->result();
    }

    public function get_find_cabang($uuid)
    {
        $this->db_sistem->where('uuid_kota',$uuid);
        $this->db_sistem->where('deleted_date',NULL);
        $query = $this->db_sistem->get('p_cabang');
        return $query->result();
    }

    public function kota_find_active()
    {
        $this->db_sistem->where('deleted_date',NULL);
        $query = $this->db_sistem->get('p_kota');
        return $query->result();
    }

    
}
