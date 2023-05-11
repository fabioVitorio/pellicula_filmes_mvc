<?php 







class AvaliacaoDao {

    public function criar(Avaliacao $avaliacao) {

        try {

            $sql = "INSERT INTO avaliacao (id_usuario, id_filme, nota, data_avaliacao, comentario, nome_usuario) VALUES (:id_usuario, :id_filme, :nota, :data_avaliacao, :comentario, :nome_usuario)";

            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id_usuario", $avaliacao->getID_Usuario(), PDO::PARAM_INT);
            $stmt->bindValue(":id_filme", $avaliacao->getID_Filme(), PDO::PARAM_INT);
            $stmt->bindValue(":nota", $avaliacao->getNota(), PDO::PARAM_INT);
            $stmt->bindValue(":data_avaliacao", $avaliacao->getData_Avaliacao(), PDO::PARAM_STR);
            $stmt->bindValue(":comentario", $avaliacao->getComentario(), PDO::PARAM_STR);
            $stmt->bindValue(":nome_usuario", $avaliacao->getNome_Usuario(), PDO::PARAM_STR);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Erro ao Inserir Avaliação! <br>" . $e->getMessage() . '<br>';

        }

    }

    public function listar() {

      
        try {
            $sql = "SELECT * FROM avaliacao ORDER BY data_avaliacao DESC";
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listaAvaliacoes($linha);
            }

            return $list;

        } catch (PDOException $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
        
        }

    }


    private function listaAvaliacoes($linhas) {


        $avaliacao = new Avaliacao();
        $avaliacao->setID_Usuario($linhas['id_usuario']);
        $avaliacao->setID_Filme($linhas['id_filme']);
        $avaliacao->setID($linhas['id_avaliacao']);
        $avaliacao->setNota($linhas['nota']);
        $avaliacao->setData_Avaliacao($linhas['data_avaliacao']);
        $avaliacao->setComentario($linhas['comentario']);
        $avaliacao->setNome_Usuario($linhas['nome_usuario']);
       
    return $avaliacao;

    }

}

?>