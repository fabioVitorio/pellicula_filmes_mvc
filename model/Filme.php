<?php

class Filme{
    private $id;
    private $nome_filme;
    private $genero;
    private $duracao;
    private $ano_lancamento;
    private $img;
    private $sinopse;
    private $media;

    //Functions GET

    function getID() {
        return $this->id;
    }

    function getNome() {
        return $this->nome_filme;
    }
    function getGenero() {
        return $this->genero;
    }

    function getDuracao() {
        return $this->duracao;
    }
    function getLancamento() {
        return $this->ano_lancamento;
    }
    function getImg() {
        return $this->img;
    }
    function getSinopse() {
        return $this->sinopse;
    }
    function getMedia() {
        return $this->media;
    }

    //Functions SET
    function setID($id) {
        $this->id = $id;
    }

    function setNome($nome_filme) {
        $this->nome_filme = $nome_filme;
    }
    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setDuracao($duracao) {
        $this->duracao = $duracao;
    }
    function setLancamento($ano_lancamento) {
        $this-> ano_lancamento= $ano_lancamento;
    }
    function setImg($img) {
        $this->img = $img;
    }
    function setSinopse($sinopse) {
        $this->sinopse = $sinopse;
    }
    function setMedia($media) {
        $this->media = $media;
    }
}

?>