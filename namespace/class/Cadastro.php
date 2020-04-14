<?php
//IMPORTANTE:
//CRIAR O NOME DO ARQUIVO COM O NOME DA CLASSE - KEYSENSITIVE
class Cadastro {
    //DECLARA OS ATRIBUTOS (VARIAVEIS)
    private $nome;
    private $email;
    private $senha;
    //DECLARA OS METODOS GETs - ENVIA INFORMACAO
    public function getNome():string
    {
        return $this->nome;
    }
    public function getEmail():string
    {
        return $this->email;
    }
    public function getSenha():string
    {
        return $this->senha;
    }
    //DECLARA OS SETERs - RECEBE VALORES PARA OS ATRIBUTOS
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    //METODO MAGICO TO STRING - RETORNA TUDO STRING COM JSON (ARRAY SERIALIZADO) POR ISSO STRING
    public function __toString(){
        return json_encode(array
        (
            "nome"=>$this->getNome(),
            "email"=>$this->getEmail(),
            "senha"=>$this->getSenha()
        ));
    }
}