<?php
/**
 * Slider Class 
 * By Hekky Nurhikmat
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider_model extends CI_Model
{
    
    var $table = "slider_posts";
    var $id    = "id_slider_posts";

    function find($limit = null, $offset = 0, $user_id = null, $q = null){
            $this->db->select('slider_posts.*');
            if ($q != null) {
                $this->db->like('title_small', $q);
            }
            if($user_id != null){
                $this->db->where('user_id',$user_id);
            }
            $this->db->limit($limit, $offset);
            $this->db->order_by('created', 'desc');
            $query = $this->db->get($this->table);

            return $query->result_object();
    }

    function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }

    function update($id,$data)
    {
        $this->db->where($this->id,$id);
        return $this->db->update($this->table,$data);
    }

    function get_id($id)
    {
        return $this->db->get_where($this->table,$where = array($this->id,$id))->row_array();
    }
    function get_id_num($id)
    {
        return $this->db->get_where($this->table,$where = array($this->id,$id))->num_rows();
    }

    function remove($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->delete($this->table);
    }

    function find_active()
    {
        $query = $this->db->get_where($this->table,$ar_kriteria=array('status'=>1));
        return $query->result_object();
    }
}
