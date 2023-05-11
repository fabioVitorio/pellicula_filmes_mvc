<?php 


require_once('../config/Conexao.php');
require_once('../dao/FilmeDao.php');
require_once('../model/Filme.php');

//instancia as classes
$filme = new Filme();
$filmedao = new FilmeDao(); 

//pega todos os dados passado por POST

$dados = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar_filme'])){

    $filme->setNome($dados['nome_filme']);
    $filme->setGenero($dados['genero']);
    $filme->setLancamento($dados['ano_lancamento']);
    $filme->setDuracao($dados['duracao']);
    $filme->setSinopse($dados['sinopse']);
    $filme->setMedia($dados['media']);
    $filme->setImg($_FILES['img']);

    if($filmedao->criar($filme)){
        echo "<script>
        alert('Filme Cadastrado com Sucesso!!');
        location.href = '../';
      </script>";
    }
} else if(isset($_POST['alterar'])){
  $filme->setID($dados['id_alter']);
  $filme->setNome($dados['nome_filme']);
  $filme->setGenero($dados['genero']);
  $filme->setLancamento($dados['ano_lancamento']);
  $filme->setDuracao($dados['duracao']);
  $filme->setSinopse($dados['sinopse']);
  $filme->setImg($_FILES['img']);

  $img = $_POST['del_img'];

    if($filmedao->alterar($filme)) {

      $del_img = "../img/$img";
      unlink($del_img);

        if(!is_file($del_img)){  
            echo "<script>
                    alert('Filme Atualizado com Sucesso!!');
                    location.href = '../';
                </script>";
        }
    }

}else if(isset($_POST['excluir'])) {

    $filme->setID($_POST['id_del']);
    $img = $_POST['del_img'];

    if($filmedao->excluir($filme)) {
      
      $del_img = "../img/$img";
      unlink($del_img);

    echo "<script>
            alert('Filme Deletado com Sucesso!!');
            location.href = '../';
        </script>";
    }
}

?>