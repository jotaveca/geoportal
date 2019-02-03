<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Milogging
 *
 * @author eliasc
 */
class Liblogging {
    protected $CI;
     public function __construct()
     {
        $this->CI =& get_instance();
        $this->CI->load->library('logging');
     }
     
    public function info($ip,$usr,$msg)
    {
        $this->CI->load->library('logging');
        $logger = $this->CI->logging->get_logger('simple');
        $message = $ip.'|'.$usr.'|'.$msg;
        $logger->info($message);
    }
    
    public function error($ip,$usr,$msg)
    {
        $this->CI->load->library('logging');
        $logger = $this->CI->logging->get_logger('simple');
        $message = $ip.'|'.$usr.'|'.$msg;
        $logger->error($message);
    }
    
    public function warning($ip,$usr,$msg)
    {
        $this->CI->load->library('logging');
        $logger = $this->CI->logging->get_logger('simple');
        $message = $ip.'|'.$usr.'|'.$msg;
        $logger->warning($message);
    }
     
     
}
