<?php
//NOME DO NAMESPACE TEM QUE SER IGUAL AO NOME DO DIRETORIO DAS CLASSES
namespace model;
//IMPORTANTE:
//CRIAR O NOME DO ARQUIVO COM O NOME DA CLASSE - KEYSENSITIVE
class ClassB {
    //DECLARA OS ATRIBUTOS (VARIAVEIS)
    private $endereco;
    //DECLARA OS METODOS GETs - ENVIA INFORMACAO
    public function getEndereco():string
    {
        return $this->endereco;
    }
    //DECLARA OS SETERs - RECEBE VALORES PARA OS ATRIBUTOS
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    //Funcao registrar String
    public function MostrarEndereco(){
        echo "Foi registrado o endereço: ".$this->getEndereco();
    }
    //METODO MAGICO TO STRING - RETORNA TUDO STRING COM JSON (ARRAY SERIALIZADO) POR ISSO STRING
    public function __toString(){
        return json_encode(array
        (
            "nome"=>$this->getEndereco()
        ));
    }
}