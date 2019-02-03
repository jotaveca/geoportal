<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categorias_model');
		$this->load->model('galerias_model');
		
		$this->config->set_item('language', 'spanish');

                $this->load->library('session');                      
             	// Load form validation library
        	$this->load->library('form_validation');
        	$this->load->helper(array('form', 'url', 'html'));
        	
        	
	}
	
	public function index()
	{
		$inicio = 0;
		$limite = 10; // Numero de registros por listado		

		$data['galerias'] = $this->galerias_model->get_galerias($inicio, $limite);

		

            $menu['admin']='active';
            $menu['adm_galeria']='active'; 

		 $this->load->view('templates/header');
                 $this->load->view('templates/menu', $menu);
		 $this->load->view('galeria/index', $data);
		$this->load->view('templates/footer');
	}

        // ELIMINA IMAGEN
	public function delete()
	{
		$id_imagen = $this->input->post('id_imagen');
		$this->galerias_model->delete($id_imagen);
		redirect('galeria/index');
	}

        
	

     
	// SUBIR IMAGEN
	public function do_upload()
	{
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'jpg|jpeg|png|gif';  
		$config['max_size']             = 2000;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;
		$id_usuario = $this->session->userdata("id");

            $menu['admin']='active';
            $menu['adm_galeria']='active'; 

		$this->load->library('upload', $config);
                 


		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                       

			redirect('galeria/index');
		}
		else
		{
			$file_info = $this->upload->data();
			$imagen = $file_info['file_name'];

			$this->galerias_model->save($imagen, $id_usuario);

			$config['image_library'] = 'gd2';
			$config['source_image'] = './upload/'.$imagen;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['thumb_marker'] = FALSE;
			$config['new_image'] = './upload/tumb_'.$imagen;
			$config['width']         = 300;
			$config['height']       = 300;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			redirect('galeria/index');
		}
	}

	
}
