<?php 

require_once('../config/Conexao.php');
require_once('../dao/AvaliacaoDao.php');
require_once('../model/Avaliacao.php');

//instancia as classes
$avaliacao = new Avaliacao();
$avaliacaodao = new AvaliacaoDao(); 

//pega todos os dados passado por POST

$dados = filter_input_array(INPUT_POST);

if(isset($_POST['enviar_avaliacao'])){

    $avaliacao->setID_Usuario($dados['id_usuario']);
    $avaliacao->setID_Filme($dados['id_filme']);
    $avaliacao->setNota($dados['nota']);
    $avaliacao->setData_Avaliacao($dados['data_avaliacao']);
    $avaliacao->setComentario($dados['comentario']);
    $avaliacao->setNome_Usuario($dados['nome_usuario']);

    if($avaliacaodao->criar($avaliacao)){
        echo "<script>
        alert('Avaliação Cadastrada com Sucesso!!');
        location.href = '../';
      </script>";
    }
    echo "<script> alert('Erro ao cadastrar avaliação'); </script>";
}


?>