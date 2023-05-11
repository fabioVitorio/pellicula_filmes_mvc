<?php 

require_once('../config/Conexao.php');
require_once('../dao/UserDao.php');
require_once('../model/Usuario.php');

//instancia as classes
$usuario = new Usuario();
$userdao = new UserDao();

//pega todos os dados passado por POST

$dados = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $usuario->setNome($dados['nome']);
    $usuario->setEmail($dados['email']);
    $usuario->setSenha(password_hash($dados['senha'], PASSWORD_DEFAULT)); 

    if ($userdao->verif_email($usuario) == 1) {

    if($userdao->criar($usuario)) {

        echo "<script>
        location.href = '../views/Login/login.php';
      </script>";
      }

    } else {
      echo "<script> location.href = '../views/Cadastro/index.html'; </script>";
    }
   
}else if(isset($_POST['login'])) {

	$usuario->setEmail(strip_tags($dados['email']));
	$usuario->setSenha(strip_tags($dados['senha'])); 

    $userdao->login($usuario);

	if($userdao->login($usuario)) {

     echo "<script>
            location.href = '../index.php';
           </script>";

	} else {
        echo "<script>
                alert('Acesso inválido! login ou senha incorretos!');
                location.href = '../views/Login/login.php';
            </script>";
	}  
  

} else if(isset($_GET['logout'])) {

  $userdao->logout();

  header("Location: ../");


} else {

  header("Location: ../");
}


?>
