<?php 

session_start();

require_once('../../../config/Conexao.php');
require_once('../../../dao/FilmeDao.php');
require_once('../../../dao/UserDao.php');
require_once('../../../model/Filme.php');
require_once('../../../model/Usuario.php');


//instancia as classes
$filme = new Filme();
$filmedao = new FilmeDao();

$usuario = new Usuario();
$userdao = new UserDao();

$login = new UserDao();

$id = $_SESSION['user_session'];

if($id != 1) {
    header("Location: ../../../");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title> Home - Administrador </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSS -->
		<link rel="stylesheet" href="style_admin.css">
		<!-- BOOTSTRAP -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  	</head>

	<script>

		function deletar() {
			ok = confirm("Tem certeza que deseja deletar estes dados??");
			if(ok){
				return true;
			} else {
				return false;
			}
			
		}

	</script>

	

	<body id="body">
		<!-- HEADER -->
		<nav id="menu">
			<a href="#"><section id="logo"></section></a>
			<!-- menu lateral -->
			<a href="#menu" id="toggle"><span></span></a>
			<div id="menuu">
				<ul id="ulMenu">
					<li class="liMenu"><a class="a" href="#">HOME</a></li>
					<li class="liMenu"><a class="a" href="../../Ranking_Filmes/index.html">RANK</a></li>
					<li class="liMenu"><a class="a" href="">CONTATO</a></li>
				</ul>
			</div>
			<ul id="ul">
				<li><a href="#">Home</a></li>
				<li><a href="../../Ranking_Filmes/index.php">Ranking</a></li>
				<li><a href="">Contato</a></li>
			</ul>
			<a href="#">
				<div class="action">
				<section id="icon_user" class="profile" onclick="menuToggle();">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle"
						viewBox="0 0 16 16" id="user">
						<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
						<path fill-rule="evenodd"
							d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
					</svg>
				</section>
			</a>
			<?php foreach ($userdao->user() as $usuario) : ?>
			<div class="menuUser">
                <h3>
					<?= $usuario->getNome() ?>
                    <div style="margin-top: 5px;">

					<?php
					if($usuario->getID() != 1) {
    				echo 'Usuário';
					} else {
						echo 'Administrador';
					}
					?>

                    </div>
                </h3>
                <ul>
                    <li>
                        <span class="icons-size"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                          </svg></span>
                        <a href="../../../controller/UsuarioController.php?logout=true">Sair</a>
                    </li>
                </ul>
            </div>
			<?php endforeach ?>
			<section id="pesquisa">
				<form action="#" method="post">
					<input type="text" id="barra_pesquisa" placeholder="Pesquise pelo nome" />
				</form>
				<button>
					<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-search"
						viewBox="0 0 16 16" id="lupa">
						<path
							d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
					</svg>
				</button>
			</section>
		</nav>
		
		<!-- MAIN -->
		<main>
			<aside id="carousel"></aside>
			<article id="article1">				
				<article id="article2">					
					<?php foreach ($filmedao->listar() as $filme) : ?>
						<section>		
							<img  class="logofilme" src="../../../img/<?= $filme->getImg()?>" />
							<form action="../../Pag_Individual/index.php" method="post" name="armazena">
								<input type="hidden" id="id_pag" name="id_pag" value="<?= $filme->getID() ?>" style="width: 100%; height: 100%;"/>
								<section style="margin: 0 auto;">
									<input type="submit" value="" class="btnSubmit"/>
								</section>
							</form>	
							<section class="nomefilme"><h4><?= $filme->getNome() ?>
								</h4>
							</section>

							<section class="secBtns">
								<form name="edit" action="../../Editar_Filmes/index.php" method="post">
								
									<input type="hidden" id="id_edit" name="id_edit" value="<?= $filme->getID()?>" style="width: 100%; height: 100%;"/>
									<input type="submit" id="alterar" name="editar" value="EDITAR" class="btEditar" />
								
								</form>						
								<form action="../../../controller/FilmeController.php" method="post" name="del" >
									<input type="hidden" id="id_del" name="id_del" value="<?= $filme->getID() ?>"/>
									<input type="hidden" id="del_img" name="del_img" value="<?= $filme->getImg() ?>"/>
									<input type="submit" id="excluir" name="excluir" value="EXCLUIR" class="btExcluir" onclick="return deletar()"/>
								</form>
							</section>
						</section>
					<?php endforeach ?>
				</article>			
			</article> 
		</main>
		
		<section id="add"><a id="aAdd" href="../../Cadastro_Filmes/cadastrar_filme.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
				<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
			  </svg> Add</a>
		</section>

		<!-- FOOTER -->
        <footer>
            <section id="logoFooter"></section>
            <label id="copy"> &copy; Copyrigth reserved By: PELLICULA</label>
            <label id="contactFooter">pellicula@email.com</label>
        </footer>

		<!-- SCRIPT JS -->
		<script src="script.js"></script>
		<!-- SCRIPT BOOTSTRAP -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  

	</body>

</html>