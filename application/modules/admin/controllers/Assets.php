<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assets extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('asset','setting','category'));
	}



	public function filemanager()
	{
		if($this->session->userdata('user_id')){
				$this->load_admin('assets/index', true);
		}
	}

	public function filemanager_list()
	{
		if($this->session->userdata('user_id')){
					$page = 1;
					if(!empty($_GET['page'])){
							$page = (int) $_GET['page'];
					}

					$limit = 10;

			$this->data['asset'] = $this->db->order_by('created','desc')->get('assets',$limit,$page-1)->result_object();
			$this->data['total_pages'] = ceil($this->db->get('assets')->num_rows() / $limit);
			$this->data['current_page'] = $page;

			$this->load_admin('assets/browse_upload', false);
		}
	}
	
	public function filemanager_remove()
	{
			$id = $this->input->get('file_id');
			$remove = $this->db->where('id',$id);
			$remove = $this->db->delete('assets');
	}
	
	public function filemanager_get_link()
	{
			$id = $this->input->get('file_id');
			$file = $this->db->get_where('assets',$where = array('id'=>$id))->first_row();
			echo $link = "".base_url().$file->path."";
	}

	public function browse(){
		if($this->session->userdata('user_id')){
	        $page = 1;
	        if(!empty($_GET['page'])){
	            $page = (int) $_GET['page'];
	        }

	        $limit = 8;

			$this->data['assets'] = $this->db->order_by('created','desc')->get('assets',$limit,$page-1)->result_array();
			$this->data['total_pages'] = ceil($this->db->get('assets')->num_rows() / $limit);
			$this->data['current_page'] = $page;

			$this->load_admin('assets/browse', false);
		}
	}

	public function browse_assets(){
		if($this->session->userdata('user_id')){
	        $page = 1;
	        if(!empty($_GET['page'])){
	            $page = (int) $_GET['page'];
	        }

	        $limit = 8;

			$this->data['assets'] = $this->db->order_by('created','desc')->get('assets',$limit,$page-1)->result_array();
			$this->data['total_pages'] = ceil($this->db->get('assets')->num_rows() / $limit);
			$this->data['current_page'] = $page;

			$this->load_admin('assets/browse_assets',false);
		}
	}

	public function upload(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}else{
			if ($_FILES['file']['error'] != 4) {
                if ($this->general->isExistFile($this->assets_path . $_FILES['file']['name'])) {
                    unlink($this->assets_path . $_FILES['file']['name']);
                }
                $config['upload_path'] = $this->assets_path;
                $config['allowed_types'] = $this->setting->findByKey('image_type');
                $config['max_size'] = $this->setting->findByKey('image_max_size');


                $this->load->library('upload', $config);


                if ($this->upload->do_upload("file")) {
                    $image = $this->upload->data();
                    // print_data($image);exit;

                    $url = $this->assets_path . $image['orig_name'];
                    // if (($image['image_width'] > $this->Image->maxWidth) || ($image['image_height'] > $this->Image->maxHeight)) {
                    //     $this->load->library('SimpleImage');
                    //     $this->simpleimage->load($url);
                    //     $this->simpleimage->resizeToWidth($this->Image->maxWidth);
                    //     $this->simpleimage->resizeToHeight($this->Image->maxHeight);
                    //     $this->simpleimage->save($url);
                    // }

                    $asset = array(
                    	'type' => 'post',
                    	'mime' => $image['file_type'],
                    	'extension' => $image['file_ext'],
                    	'size' => $image['file_size'],
                    	'description' => $image['raw_name'],
                    	'path' => $url,
                    	'user_id' => $this->session->userdata('user_id'),
                    	'created' => date("Y-m-d H:i:s"),
                    	'modified' => date("Y-m-d H:i:s")
                    );

                    $this->asset->create($asset);

                    $data = array(
                        'link' => $url,
                        'name' => $image["raw_name"]
                    );
                    die(json_encode($data));
                }else{
                	$errors = $this->upload->display_errors();
                	die($errors);
                }
            }
		}
		exit;
	}

	public function index(){

		$config['base_url'] = site_url('admin/categories/index/');
		$config['total_rows'] = count($this->category->find());
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;

		$this->data['categories'] = $this->category->find($config['per_page'], $this->uri->segment(4));

		$this->data['pagination'] = $this->bootstrap_pagination($config);
		$this->render('admin/categories/index');
	}

	public function add(){
		$this->form_validation->set_rules('name', 'name', 'required|is_unique[categories.name]');
		$this->form_validation->set_rules('status', 'status', 'required');

		if($this->form_validation->run() == true){
			$category = array(
				'name' => $this->input->post('name'),
				'status' => $this->input->post('status')
			);
			$this->category->create($category);
			$this->session->set_flashdata('message',message_box('Category has been saved','success'));
			redirect('admin/categories/index');
		}

		$this->render('admin/categories/add');
	}

	public function edit($id = null){
		if($id == null){
			$id = $this->input->post('id');
		}

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');

		if($this->form_validation->run() == true){
			$category = array(
				'name' => $this->input->post('name'),
				'status' => $this->input->post('status')
			);
			$this->Category->update($category, $id);
			$this->session->set_flashdata('message',message_box('Category has been saved','success'));
			redirect('admin/categories/index');
		}

		$this->data['category'] = $this->Category->find_by_id($id);

		$this->render('admin/categories/edit');
	}

	public function delete($id = null){
		if(!empty($id)){
			$this->Category->delete($id);
			$this->session->set_flashdata('message',message_box('Category has been deleted','success'));
			redirect('admin/categories/index');
		}else{
			$this->session->set_flashdata('message',message_box('Invalid id','danger'));
			redirect('admin/categories/index');
		}
	}
}
