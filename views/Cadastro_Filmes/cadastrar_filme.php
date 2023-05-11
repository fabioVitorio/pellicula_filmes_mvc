<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Usuario.php');

//instancia as classes
$usuario = new Usuario();
$userdao = new UserDao();

$login = new UserDao();

$id = $_SESSION['user_session'];

if($id != 1) {
    header("Location: ../../");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <title> Cadastrar - Administrador </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="cadastrar_adm.css">
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
			<div class="menuUser">
                <h3>
                    Fábio Augusto Vitorios dos Santos
                    <div>
                        Administrador
                    </div>
                </h3>
                <ul>
                    <li>
                        <span class="icons-size"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                          </svg></span>
                        <a href="#">Sair</a>
                    </li>
                </ul>
            </div>
		</div>
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
    <main class="container" id="filme">

    <form action="../../controller/FilmeController.php" method="post" enctype="multipart/form-data" name="cad">
      <article class="row">
        <aside id="foto_filme"><p>Adicione uma imagem</p><input type="file" name="img" id="file_filme" required></aside>
        <article id="info_filme">
          
          <section id="titulo">
            <p>ADICIONAR TÍTULO</p>
            <input type="text" name="nome_filme" id="edit_titulo" placeholder="Informe o título (máx 60 caracteres)" maxlength="60" required>
          </section>
          <section id="sinopse">
            <p class="texto"><strong>ADICIONAR SINOPSE: </strong></p>
            <textarea name="sinopse" id="edit_sinopse" placeholder="Informe a Sinopse (máx 300 caracteres)" maxlength="420" required></textarea>
            <p class="texto"><strong>ADICIONAR  DURAÇÃO: </strong></p>
            <input type="text" class="inputs" name="duracao" id="edit_duracao" placeholder="Ex.: 2h35" maxlength="8" required>
            <p class="texto"><strong>ADICIONAR  ANO DE LANÇAMENTO: </strong></p>
            <input type="text" class="inputs" name="ano_lancamento" id="edit_ano" placeholder="Ex.: 2022" maxlength="4" required>
            <p class="texto"><strong>ADICIONAR  GÊNERO: </strong></p>
            <input type="text" class="inputs" name="genero" id="edit_genero" placeholder="Ex.: Ação" maxlength="40" required>
          </section>
          <section id="secBtn">
            <input type="hidden" name="media" value="<?php echo rand(1,5) ?>">
            
              <input type="submit" name="cadastrar_filme" value="CRIAR" id="btnEdit" />
            
          </section>


        </article>
        
      </article>
    </form>
      
    </main>

    

    <!-- SCRIPT JS -->
    <script src="script.js"></script>

  </body>

</html>