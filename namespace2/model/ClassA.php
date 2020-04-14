<?php
//NOME DO NAMESPACE TEM QUE SER IGUAL AO NOME DO DIRETORIO DAS CLASSES
namespace model;
//IMPORTANTE:
//CRIAR O NOME DO ARQUIVO COM O NOME DA CLASSE - KEYSENSITIVE
class ClassA {
    //DECLARA OS ATRIBUTOS (VARIAVEIS)
    private $nome;
    //DECLARA OS METODOS GETs - ENVIA INFORMACAO
    public function getNome():string
    {
        return $this->nome;
    }
    //DECLARA OS SETERs - RECEBE VALORES PARA OS ATRIBUTOS
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    //Funcao mostrar o nome registrado com uma frase
    public function MostrarNome(){
        echo "Foi registrado o cliente: ".$this->getNome();
    }
    //METODO MAGICO TO STRING - RETORNA TUDO STRING COM JSON (ARRAY SERIALIZADO) POR ISSO STRING
    public function __toString(){
        return json_encode(array
        (
            "nome"=>$this->getNome()
        ));
    }
}