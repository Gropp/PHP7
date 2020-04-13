<?php
class Pessoa {
    //atributos PUBLICO/PROTEGIDO/PRIVADO
    public $nome = "Rasmus Lerdorf";
    protected $idade = 48;
    private $senha = "123456";
    //metodos PUBLICO DENTRO DA CLASSE PESSOA
    public function verDados(){
        echo "Rotina na Classe MAE, chamado por  - ".get_class($this)."<br/>";
        echo $this->nome."<br/>";
        echo $this->idade."<br/>";
        echo $this->senha."<br/>";
    }
}
// A CLASSE PROGRAMADOR HERDA/TEM ACESSO A TODOS OS ATRIBUTOS E METODOS DA CLASSE PESSOA. IMPORTANTE: MENOS O QUE FOR DECLARADO COMO PRIVATE 
class Programador extends Pessoa {
    //APOS COPIAR O METODO COM OUTRO NOME, AO CHAMA-LO A SENHA QUE É PRIVADA NAO RETORNA DO METODO PESSOA
    public function verDados1(){
        echo "Rotina na Classe FILHA, chamado por  - ".get_class($this)."<br/>";
        echo $this->nome."<br/>";
        echo $this->idade."<br/>";
        echo $this->senha."<br/>";
    }
}
//chamada da classe mae
$objeto = new Pessoa();
print "Funcao da classe MAE!<br/>";
$objeto->verDados();
//chamada da classe filha
$objeto1 = new Programador();
print "Funcao na classe MAE, chamada pela classe FILHA e herdada com atributo PRIVADO!<br/>";
$objeto1->verDados();
print "Funcao na classe FILHA, que chama ATRIBUTOS da classe MAE. o ATRIBUTO PRIVADO NAO APARECE!<br/>";
$objeto1->verDados1();
