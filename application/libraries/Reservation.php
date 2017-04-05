<?php

/**
 * LIBRARY BOOKING AS BOOKING
 */
class Reservation 
{

    var $CI;
    
    function __construct()
    {
        $this->CI =&get_instance();
    }

    function get_find_cabang($uuid_kota)
    {
            $this->CI->load->model('booking_model');
            return $this->CI->booking_model->get_find_cabang($uuid_kota);
    }
}
