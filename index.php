<?php

session_start();

require_once('./config/Conexao.php');
require_once('./dao/UserDao.php');
require_once('./model/Usuario.php');

//instacia as classes
$usuario = new Usuario();
$userdao = new UserDao();

$login = new UserDao();

if (!$login->checkLogin()) {
    header ("Location: views/users/usuarios/usuarios.php");
}

foreach($userdao->user() as $usuario) {
    if($usuario->getID() == 1 && $usuario->getNome() == "Admin") {
       
        header ("Location: views/users/admin/admin.php");
    } else {
        header ("Location: views/users/usuarios/usuarios2.php");
  
    }
}

?>