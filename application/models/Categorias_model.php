<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model
{
	
	// LISTADO DE LAS CATEGORIAS
	public function get_categorias()
	{
		$query = $this->db->get('categorias');
		return $query->result();
	}

	// GUARDAR CATEGORIAS
	public function save()
	{
		$slug = url_title(convert_accented_characters($this->input->post('categoria')), 'dash', TRUE);

		$data = array(
			'categoria' => $this->input->post('categoria'),
			'slug' => $slug
			);

		return $this->db->insert('categorias', $data);
	}

	// lISTAR CATEGORIA POR ID
	public function getCategoria($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('categorias');
		return $query->row();
	}

	// lISTAR CATEGORIA POR SLUG
	public function get_CategoriaNombre($slug)
	{
		$this->db->where('slug', $slug);
		$query = $this->db->get('categorias');
		return $query->row();
	}


	// ACTUALIZAR CATEGORIA
	public function update()
	{
		$slug = url_title(convert_accented_characters($this->input->post('categoria')), 'dash', TRUE);

		$data = array(
			'categoria' => $this->input->post('categoria'),
			'slug' => $slug
			);
		$this->db->where('id', $this->input->post('id'));

		$this->db->update('categorias', $data);
	}

	// ELIMINA CATEGORIA
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('categorias');
	}
}