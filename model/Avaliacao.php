<?php 

class Avaliacao{

    private $id_usuario;
    private $id_filme;
    private $id;
    private $nota;
    private $data_avaliacao;
    private $comentario;
    private $media;
    private $nome_usuario;

    function getID_Usuario() {
        return $this->id_usuario;
    }

    function getID_Filme() {
        return $this->id_filme;
    }

    function getID() {
        return $this->id;
    }

    function getNota() {
        return $this->nota;
    }

    function getData_Avaliacao() {
        return $this->data_avaliacao;

    }

    function getComentario() {
        return $this->comentario;
    }


    function getNome_Usuario() {
        return $this->nome_usuario;
    }


    function setID_Usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setID_Filme($id_filme) {
        $this->id_filme = $id_filme;
    }

    function setID($id) {
        $this->id = $id;
    }

    function setNota($nota) {
        $this->nota = $nota;
    }

    function setData_Avaliacao($data_avaliacao) {
        $this->data_avaliacao = $data_avaliacao;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }


    function setNome_Usuario($nome_usuario) {
        $this->nome_usuario = $nome_usuario;
    }
}