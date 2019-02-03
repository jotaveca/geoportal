<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plantillagraficos
 *
 * @author eliasc
 */   


class Libseguridad {
   protected $CI;   
   
    public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
                $this->CI->load->library('encryption');
        }
    /*
     * Retorna el JavaScript de un solo dataset
     */    
    public function generar_clave(){
        //$this->CI->load->library('encryption');
        $this->CI->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ofb8'
            )
        );
        $key = bin2hex($this->CI->encryption->create_key(16));        
        return $key;
    }
    
    public function cifrar($text){
        $this->CI->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ofb8'
            )
        );
        
        $ciphertext = $this->CI->encryption->encrypt($text);
        return $ciphertext;
    }
    
    public function descifrar($ciphertext){
        $this->CI->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ofb8'
            )
        );
        $text = $this->CI->encryption->decrypt($ciphertext);
        return $text;
    }
    /*
     * Genera todos los tokens de los centro para el día de hoy
     */
    public function generartokencentros(){
        $this->CI->load->model('Centrosaludtoken_model');
        $this->CI->Centrosaludtoken_model->generartokencentros();
    }
    /*
     * Validar si el token se correponde con el centro
     */
    public function validartokencentro($param){
        $this->CI->load->model('Centrosaludtoken_model');
        $result =$this->CI->Centrosaludtoken_model->validartokencentro($param);        
        return $result;
    }
    /*
     * Genera un hash
     */
    public function generarhash($param){
        $this->CI->load->model('Centrosaludtoken_model');
        $result =$this->CI->Centrosaludtoken_model->generarhash($param);        
        return $result;
    }
    /*
     * Vaciar todos los tokens 
     */
    public function eliminartokencentros(){
        $this->CI->load->model('Centrosaludtoken_model');
        $result =$this->CI->Centrosaludtoken_model->eliminartokencentros();        
        return $result;
    }
    /*
     * Buscar el token actual de un centro
     */
    public function buscartokencentro($param){
        $this->CI->load->model('Centrosaludtoken_model');        
        $result =$this->CI->Centrosaludtoken_model->buscar($param);    
        if(!empty($result)){
            return $result->token;
        }
        else{
            return NULL;
        }
        
    }
        
}
