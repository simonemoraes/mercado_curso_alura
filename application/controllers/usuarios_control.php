<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_control extends CI_Controller {

    public function novo() {
        /*Carrega todas as informaçoes da execução */
          $this->output->enable_profiler(TRUE);
         

        $usuario = array(
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha"))
        );

        $this->load->model("usuarios_model");
        $this->usuarios_model->salva($usuario);
        $this->load->template("usuarios/novo");
    }

}
