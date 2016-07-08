<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendas_control extends CI_Controller {

    public function nova() {
        $usuario = autoriza();
        
        $this->load->model(array("vendas_model", "produtos_model", "usuarios_model"));
        $venda = array(
            "produto_id" => $this->input->post("produto_id"),
            "comprador_id" => $usuario["id"],
            "data_de_entrega" => dataPtBrParaMysql($this->input->post("data_de_entrega"))
        );
        $this->vendas_model->salva($venda);
        
        /* Configura o envio de email */
        $this->load->library("email");
        $config["protocol"] = "smtp";
        $config["smtp_host"] = "mail.ruianderson.com.br";
        $config["smtp_user"] = "contato@simone.ruianderson.com.br";
        $config["smtp_pass"] = "@sbvr4230@";
        $config["charset"] = "utf-8";
        $config["mailtype"] = "html";
        $config["newline"] = "\r\n";
        $config["smtp_port"] = '587';
        $this->email->initialize($config);
        
        $produto = $this->produtos_model->busca($venda["produto_id"]);
        $vendedor = $this->usuarios_model->busca($produto["usuario_id"]);
        
        $dados = array("produto" => $produto);
        $conteudo = $this->load->template("vendas/email.php", $dados, TRUE);
        
        $this->email->from("contato@simone.ruianderson.com.br", "Mercado");
        $this->email->to($vendedor["email"]);
        $this->email->subject("Seu produto {$produto['nome']} foi vendido!");
        $this->email->message($conteudo);
        $this->email->send();
        /* Fim - Configura o envio de email */
                
        $this->session->set_flashdata("success", "Pedido de compra efetuado com sucesso");
        
        redirect("/");
    }
    
    public function index() {
        $usuario = autoriza();
        $this->load->model("produtos_model");
        $produtosVendidos = $this->produtos_model->buscaVendidos($usuario);
        $dados = array("produtosVendidos" => $produtosVendidos);
        $this->load->template("vendas/index", $dados);
    }

}
