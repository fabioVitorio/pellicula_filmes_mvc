<?php

class FilmeDao {

public function criar(Filme $filme) {
    try {

        $sql = "INSERT INTO filme (nome_filme, genero, img, ano_lancamento, duracao, sinopse, media) VALUES (:nome_filme,:genero,:img,:ano_lancamento,:duracao,:sinopse, :media)";

        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":nome_filme", $filme->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(":genero", $filme->getGenero(), PDO::PARAM_STR);
        $stmt->bindValue(":ano_lancamento", $filme->getLancamento(), PDO::PARAM_STR);
        $stmt->bindValue(":duracao", $filme->getDuracao(), PDO::PARAM_STR);
        $stmt->bindValue(":sinopse", $filme->getSinopse(), PDO::PARAM_STR);
        $stmt->bindValue(":media", $filme->getMedia(), PDO::PARAM_STR);

        $nomef = $filme->getNome();
        $imagem = $filme->getImg();
        include '../includes/upload_img.php';
        $stmt->bindValue(":img", $nome_imagem, PDO::PARAM_STR);
        
        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Erro ao Inserir Filme <br>" . $e->getMessage() . '<br>';
    }
}


public function listar() {

    try {
        $sql = "SELECT * FROM filme order by id_filme desc";
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listaFilmes($linha);
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    
}


public function listaranking() {

    try {
        $sql = "SELECT * FROM filme order by media desc LIMIT 5";
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listaFilmes($linha);
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        }
    
}


public function individual() {
    try {
        $sql = "SELECT * FROM filme WHERE id_filme = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $_POST['id_pag'], PDO::PARAM_INT);
        $stmt->execute();
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $list = array();

        foreach ($lista as $linha) {
            $list[] = $this->listaFilmes($linha);
        }

        return $list;

    } catch (PDOException $e) {
        echo "Ocorreu um erro ao tentar buscar Usuário." . $e->getMessage();
    }
    
}

public function alterar( Filme $filme){
    try {
        $sql = "UPDATE filme SET nome_filme = :nome_filme, genero = :genero, img = :img, ano_lancamento = :ano_lancamento, duracao = :duracao, sinopse = :sinopse WHERE id_filme = :id";

        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $filme->getID(),PDO::PARAM_INT);
        $stmt->bindValue(":nome_filme", $filme->getNome(),PDO::PARAM_STR);
        $stmt->bindValue(":genero", $filme->getGenero(),PDO::PARAM_STR);
        $stmt->bindValue(":ano_lancamento", $filme->getLancamento(),PDO::PARAM_INT);
        $stmt->bindValue(":duracao", $filme->getDuracao(),PDO::PARAM_STR);
        $stmt->bindValue(":sinopse", $filme->getSinopse(),PDO::PARAM_STR);

        $nomep = $filme->getNome();
        $imagem = $filme->getImg();
        include '../includes/upload_img.php';
        $stmt->bindValue(":img",$nome_imagem, PDO::PARAM_STR);

        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Ocorreu um erro ao alterar um filme!!".$e->getMessage();
    }
}

public function editar() {
    try {
        $sql = "SELECT * FROM filme WHERE id_filme = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $_POST['id_edit'], PDO::PARAM_INT);
        $stmt->execute();
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $list = array();

        foreach ($lista as $linha) {
            $list[] = $this->listaFilmes($linha);
        }

        return $list;

    } catch (PDOException $e) {
        echo "Ocorreu um erro ao tentar buscar Usuário." . $e->getMessage();
    }

}

public function excluir(Filme $filme) {
    try {

        $sql = "DELETE FROM filme WHERE id_filme= :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $filme->getID(), PDO::PARAM_INT);
        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Erro ao Excluir Filme" . $e->getMessage();
    }
}


private function listaFilmes($linhas) {
    $filme = new Filme();
    $filme->setID($linhas['id_filme']);
    $filme->setNome($linhas['nome_filme']);
    $filme->setGenero($linhas['genero']);
    $filme->setDuracao($linhas['duracao']);
    $filme->setLancamento($linhas['ano_lancamento']);
    $filme->setImg($linhas['img']);
    $filme->setSinopse($linhas['sinopse']);
    $filme->setMedia($linhas['media']);


    return $filme;


}





}
?>