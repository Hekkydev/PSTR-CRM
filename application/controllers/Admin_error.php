<?php
/*
*
* Admin Error BY Hekky Nurhikmat
*
*/

defined('BASEPATH') or exit(" Not Access Brutal");


class Admin_error extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
		
	}
	
	public function index()
	{
		$this->load_admin_error();
	}
	
}
