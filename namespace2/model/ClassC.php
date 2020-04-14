<?php
//NOME DO NAMESPACE TEM QUE SER IGUAL AO NOME DO DIRETORIO DAS CLASSES
namespace model;
//IMPORTANTE:
//CRIAR O NOME DO ARQUIVO COM O NOME DA CLASSE - KEYSENSITIVE
class ClassC {
    //DECLARA OS ATRIBUTOS (VARIAVEIS)
    private $cidade;
    //DECLARA OS METODOS GETs - ENVIA INFORMACAO
    public function getCidade():string
    {
        return $this->cidade;
    }
    //DECLARA OS SETERs - RECEBE VALORES PARA OS ATRIBUTOS
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    //Funcao registrar String
    public function MostrarCidade(){
        echo "Foi registrada a cidade: ".$this->getCidade();
    }
    //METODO MAGICO TO STRING - RETORNA TUDO STRING COM JSON (ARRAY SERIALIZADO) POR ISSO STRING
    public function __toString(){
        return json_encode(array
        (
            "nome"=>$this->getCidade()
        ));
    }
}