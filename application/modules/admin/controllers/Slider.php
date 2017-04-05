<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Slider COntrolller HEkky Nurhikmat
 */
class Slider extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->allow_group_access(array('admin'));
        $this->load->model('slider_model');
        $this->slider_index = "admin/slider";
        
    }

    function index()
    {
        $config['base_url'] = site_url('admin/slider/index/');
		$config['total_rows'] = count($this->slider_model->find());
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;

        $user_id = null;

        if(!in_array('admin', $this->current_groups)){
            $user_id = $this->session->userdata('user_id');
        }


        if ($this->input->get('q')):
            $q = $this->input->get('q');
            $this->data['slider'] = $this->slider_model->find($config['per_page'], $this->uri->segment(4),$user_id, $q);
            if (empty($this->data['posts'])) {
                $this->session->set_flashdata('message', message_box('Data tidak ditemukan','danger'));
                redirect('admin/posts/index');
            }
            $config['total_rows'] = count($this->data['slider']);
        else:
            $this->data['slider'] = $this->slider_model->find($config['per_page'], $this->uri->segment(4),$user_id);
        endif;
        $this->data['pagination'] = $this->bootstrap_pagination($config);
        $this->load_admin('slider/index');
    }

    function add()
    {
        
        $this->load_admin('slider/add');
    }
    function entri()
    {
        $post = (object) $_POST;
        if($post->published_at == TRUE){
        $time = $post->published_at.date('H:i:s');
        }else{
         $time = date("Y-m-d H:i:s");   
        }
        $data_post = array(
            'description' =>$post->body,
            'path'=>$post->featured_image,
            'slug'=>$post->link_url,
            'slug_button'=>$post->link_button,
            'title_small'=>$post->title_small,
            'title_large'=>$post->title_large,
            'status'=>$post->status,
            'created'=>$time, 
            );

        $insert = $this->slider_model->insert($data_post);
        if($insert == TRUE)
        {
             $this->session->set_flashdata('message', message_box('New slide has been saved','success'));
             redirect($this->slider_index);
        } 
    }
    

    function edit($id = null)
    {
        
        $cek = $this->slider_model->get_id_num($id);
        if($cek > 0){
            $this->data['slider'] = $this->slider_model->get_id($id);
            
            $this->load_admin('slider/edit');
        }else{
            redirect($this->slider_index);
        }
    }

    function update()
    {
        $post = (object) $_POST;

        $id = $post->id;

      
        if($post->published_at == TRUE){
        $time = $post->published_at;
        }else{
         $time = date("Y-m-d H:i:s");   
        }
        $data_post = array(
            'description' =>$post->description,
            'path'=>$post->featured_image,
            'slug'=>$post->link_url,
            'slug_button'=>$post->link_button,
            'title_small'=>$post->title_small,
            'title_large'=>$post->title_large,
            'status'=>$post->status,
            'modified'=>$time, 
            ); 

        $update = $this->slider_model->update($id,$data_post);
        if($update == TRUE)
        {
             $this->session->set_flashdata('message', message_box('New slide has been update','success'));
             redirect($this->slider_index);
        }     
            
    }

    function remove()
    {
        $id = $this->input->get('sid');
        $hapus = $this->slider_model->remove($id);
        if($hapus == TRUE ){
            $this->session->set_flashdata('message', message_box('slide has been deleted','danger'));
             redirect($this->slider_index);
        }
    }
}


/* End of file filename.php */
