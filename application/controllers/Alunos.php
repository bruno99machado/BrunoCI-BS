<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Alunos_model', 'alunos');
    }
    
    public function index () {
        $this->load->view('template/header');
        $lista['alunos']=$this->alunos->listar();
        $this->load->view('AlunosCadastro', $lista);
        $this->load->view('template/footer');
    }
    
    public function inserir() {
        //nome do campo do vetor ser o mesmo da tabela do BD
        $dados['nome'] = mb_convert_case($this->input_>post('nome'), MB_CASE_UPPER);
        $dados['rg'] = $this->input->post('rg');
        $dados['endereco'] = mb_convert_case($this->input->post('turma'),MB_CASE_UPPER);
        $dados['idade'] = $this->input->post('idade');
        $this->alunos->inserir($dados);
        
        redirect('alunos');
    }
}