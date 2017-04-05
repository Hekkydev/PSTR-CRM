<?php

/**
 * Tags Controller BY HEKKY NURHIKMAT
 */
defined("BASEPATH") or exit("NOT ACCESS BRUTAL");

class Tags extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->allow_group_access(array('admin'));
        $this->load->model(array('tag'));
    }
    

    function index()
    {
        
		$config['base_url'] = site_url('admin/tags/index/');
		$config['total_rows'] = count($this->tag->find());
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;		
		$this->data['tags'] = $this->tag->find($config['per_page'], $this->uri->segment(4));
		$this->data['pagination'] = $this->bootstrap_pagination($config);
        
        // echo "<pre>";
        // print_r($this->data); die();
		$this->load_admin('tags/index');
    }

    function add()
    {
        $this->form_validation->set_rules('name', 'name', 'required|is_unique[tags.name]');
		$this->form_validation->set_rules('status', 'status', 'required');

		    if($this->form_validation->run() == true){
			$tag = array(
				'name' => $this->input->post('name'),
				'status' => $this->input->post('status')
			);

        $this->tag->create($tag);
        $this->session->set_flashdata('message',message_box('Category has been saved','success'));
        redirect('admin/tags/index');
		}

		$this->load_admin('tags/add');
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
			$this->tag->update($category, $id);
			$this->session->set_flashdata('message',message_box('Category has been saved','success'));
			redirect('admin/tags/index');
		}

		$this->data['category'] = $this->tag->find_by_id($id);

		$this->load_admin('tags/edit');
	}

    function delete($number = null)
    {
        $id = $number;
        if($id != NULL){
            $remove = $this->tag->delete($id);
            $this->session->set_flashdata('message',message_box('Tags has been removed','danger'));
			redirect('admin/tags');
        }else{
            redirect('admin/tags');
        }

    }

}
