<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->allow_group_access(array('admin'));
		$this->load->model(array('post','category','page','asset'));
	}

	public function index(){
		$this->data['dashboard_count'] = $this->dashboard_count();
		
		
		$this->data['welcome'] = 'Ini adalah halaman admin';
		$this->load_admin('dashboard/index');
	}

	public function dashboard_count()
	{
		$dashboard = array(
			'post' =>count($this->post->find()), 
			'category'=>count($this->category->find()),
			'pages'=>count($this->page->find()),
			'uploaded'=>count($this->asset->find())
		);


		return (object) $dashboard;
	}
}