<?php
defined('BASEPATH') or exit("Not Access Brutal");
/**
 *  Booking CLass by Hekky Nurikmat
 */
class Booking extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('booking_model');
        $this->load->library('reservation');
    }


    function index()
    {

        $this->data['kota'] = $this->booking_model->kota_find_active();
        $this->load_theme_booking('booking/index');

    }
}
