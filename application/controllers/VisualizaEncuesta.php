<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VisualizaEncuesta
 *
 * @author lenovo
 */
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class VisualizaEncuesta extends CI_Controller{
    
            function visualiza_encuesta(){
                $this->load->view('../views/include/header');
                $this->load->view('encuesta', $data);
                $this->load->view('../views/include/footer');
            }


    //put your code here
    }
