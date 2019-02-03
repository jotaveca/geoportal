<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_model extends CI_Model
{

	function  __construct(){
	        parent::__construct();
	        $this->load->database();
               $this->load->helper('text');

	    }
	
	// LISTADO DE LAS IMAGENES
	/*public function get_pdf($inicio = FALSE, $limite = FALSE)
	{
		if($inicio !== FALSE && $limite !== FALSE){
			$this->db->limit($limite, $inicio);
		}

		$query = $this->db->get('t014_pdf');
		return $query->result();
	}*/

        // LISTADO DE LAS IMAGENES
	public function get_pdf_usuario_proyecto($id_usuario, $id_proyecto)
	{
		$where = array('id_usuario' => $id_usuario, 'id_proyecto' => $id_proyecto);
                $this->db->where($where);
		$query = $this->db->get('t014_pdf');
		return $query->result();
	}
	
	 
	public function get_pdf_proyecto($id_proyecto)
	{
		$where = array('id_proyecto' => $id_proyecto);
                $this->db->where($where);
		$query = $this->db->get('t014_pdf');
		return $query->result_array();
	}
	

       // LISTADO DE LAS IMAGENES
	public function get_pdf_usuario($id_usuario)
	{
		$this->db->where('id_usuario', $id_usuario);
		$query = $this->db->get('t010_shapefile');
		return $query->result();
	}

	// GUARDAR IMAGENES
	public function save($imagen, $id_usuario)
	{
		$slug = url_title(convert_accented_characters($this->input->post('titulo')), 'dash', TRUE);
		
               $id_proyecto = $this->input->post('val_id_proyecto_adj');

		
		
		$data = array(
			'titulo' => $this->input->post('titulo'),
			'slug' => $slug,
			'imagen' => $imagen,
                        'id_usuario' => $id_usuario,
                        'id_proyecto' => $id_proyecto
                       
			);
			

		$this->db->insert('t014_pdf', $data);
                $lastid = $this->db->insert_id();
                return $lastid;



	}

	// lISTAR IMAGENES POR ID
	public function getPdf($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('t014_pdf');
		return $query->row();
	}

	// lISTAR IMAGENES POR RUTA
	public function get_pdf($slug)
	{
		$this->db->where('slug', $slug);
		$query = $this->db->get('t014_pdf');
		return $query->row();
	}

	


	// ACTUALIZAR IMAGENES
	public function update()
	{
		$slug = url_title(convert_accented_characters($this->input->post('titulo')), 'dash', TRUE);

		$data = array(
			'titulo' => $this->input->post('titulo'),
			'slug' => $slug,
			'idcategoria' => $this->input->post('categoria')
			);
		$this->db->where('id', $this->input->post('id'));

		$this->db->update('t014_pdf', $data);
	}

	// ELIMINA IMAGENES
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('t014_pdf');
	}
}