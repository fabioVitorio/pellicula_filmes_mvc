
<?php

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/FilmeDao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Usuario.php');
require_once('../../model/Filme.php');
require_once('../../dao/AvaliacaoDao.php');
require_once('../../model/Avaliacao.php');


//instancia as classes
$usuario = new Usuario();
$userdao = new UserDao();
$filme = new Filme();
$filmedao = new FilmeDao();
$avaliacao = new Avaliacao();
$avaliacaodao = new AvaliacaoDao();

$login = new UserDao();

$id = $_SESSION['user_session'];


if(!$login->checkLogin()) {
  header("Location: ../Login/login.php");
}

?>



<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <title> Filme Individual </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="filme_individual.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
  </head>

  <body>

    <!-- HEADER -->
    <nav id="menu">

    
      <a href="../../"><section id="logo"></section></a>
      <!-- menu lateral -->
      <a href="#menu" id="toggle"><span></span></a>
      <div id="menuu">
          <ul id="ulMenu">
              <li class="liMenu"><a class="a" href="../../">HOME</a></li>
              <li class="liMenu"><a class="a" href="../Ranking_Filmes/index.php">RANK</a></li>
              <li class="liMenu"><a class="a" href="">CONTATO</a></li>
          </ul>
      </div>
      <ul id="ul">
          <li><a href="../../">Home</a></li>
          <li><a href="../Ranking_Filmes/index.php">Ranking</a></li>
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
                        <a href="../../controller/UsuarioController.php?logout=true">Sair</a>
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
    <?php foreach ($filmedao->individual() as $filme) : ?>
    <!-- MAIN -->
    <main class="container" id="filme">
      <article class="row">

        <aside id="foto_filme" ><img src="../../img/<?= $filme->getImg()?>" style="width:100%; height:100%; "/></aside>
        <article id="info_filme">
          <section id="titulo">
            <p><?= $filme->getNome() ?></p>
          </section>
          <section id="sinopse">
            <p class="texto" style="word-break: break-word; text-align:justify"><strong> SINOPSE: </strong><br /><?= $filme->getSinopse() ?></p>
            <p class="texto"><strong>DURAÇÃO: </strong><br /> <?= $filme->getDuracao() ?></p>
            <p class="texto"><strong>ANO DE LANÇAMENTO: </strong><br /> <?= $filme->getLancamento() ?></p>
            <p class="texto"><strong>GÊNERO: </strong><br /> <?= $filme->getGenero() ?></p>
            <p class="texto"><strong>PONTUAÇÃO: </strong><br /> <?= $filme->getMedia() ?></p>
          </section>
          <section id="secBtn"><a href="#secBtn"><button id="btnAvaliar">AVALIAR</button></a></section>
        </article>
      </article>
    </main>
    <?php endforeach ?>

    <!-- COMENTÁRIO part 1-->
    <main class="container" id="avaliacoes">
        <article class="row">
        <form action="../../controller/AvaliacaoController.php" method="post" name="cad_avaliacao">
            <section id="comentarios">
            <section id="nota">
            
              <select id="comentario" name="nota" required>
                <option value="" selected="selected">NOTA</option>
                <option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
              </select>
            </section>
            
            <?php foreach ($userdao->user() as $usuario) : ?>
              <p>Adicione um comentário:</p>
              <textarea placeholder="Digite um comentário (máx 200 caracteres)" maxlength="200" name="comentario" required></textarea>
            </section>
            <section id="secBtnComent"> 
              <input type="hidden" name="id_filme" value="<?= $filme->getID()?>" style="height: 100%; width: 100%;"/> 
              <input type="hidden" name="id_usuario" value="<?= $id?>" style="height: 100%; width: 100%;" /> 
              <input type="hidden" name="data_avaliacao" value="<?= date("Y/m/d") ?>" style="height: 100%; width: 100%;" /> 
              <input type="hidden" name="nome_usuario" value="<?= $usuario->getNome(); ?>" style="height: 100%; width: 100%;" /> 
              <input type="hidden" name="enviar_avaliacao" id="enviar_avaliacao" style="width: 100%; height: 100%;"/>
              <button id="btnEnviar">Enviar</button> 
            </section>
            <?php endforeach ?>

          </form>
        </article>
    </main>

    <!-- COMENTÁRIO part 2-->
    
    <main class="container" id="avaliacoes2">
    
    <?php foreach ($avaliacaodao->listar() as $avaliacao) : 
       if($avaliacao->getID_Filme() == $filme->getID()) :
      ?>
      
        <article id="comentario1">
            <section id="foto_comentario"></section>
            <section id="texto_comentario">
           <p><strong> <?=  $avaliacao->getNome_Usuario(); ?></strong> <span style="margin-left: 15px;"> <?=  $avaliacao->getData_Avaliacao(); ?></span><span style="margin-left: 20px;"> Nota: <?=  $avaliacao->getNota(); ?></span></p> 
             
              <p>
               <?=  $avaliacao->getComentario();?>
              </p>
            </section>
           
        </article>
            
        
       

    
    <?php   endif; 
    endforeach ?>
        
    </main>
   
   
    <!-- SCRIPT JS -->
    <script src="script.js"></script>

  </body>

</html>