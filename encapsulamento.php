<?php
class Pessoa {
    //atributos PUBLICO/PROTEGIDO/PRIVADO
    public $nome = "Sandra Ramalho";
    protected $idade = 35;
    private $senha = "123456";
    //metodos PUBLICO DENTRO DA CLASSE PESSOA
    public function verDados(){
        echo $this->nome."<br/>";
        echo $this->idade."<br/>";
        echo $this->senha."<br/>";
    }
}
$alguem = new Pessoa();
//esse metodo verDados é PUBLICO, e como ele esta DENTRO DA CLASSE Pessoa, ELE TEM ACESSO AOS ATRIBUTOS E ELE CONSEGUE MANIPULA-LOS OU MOSTRA-LOS. ENTAO AO CHAMAR ESSE METODO AS ACOES DENTRO DELE SAO EXECUTADAS, INDEPENDENTE DO TIPO DOS ATRIBUTOS
$alguem->verDados();
//o nome é um ATRIBUTO PUBLICO, entao é possivel acessa-lo fora da classe
echo $alguem->nome."<br/>";
//a idade nao mostra, pois é UM ATRIBUTO PROTEGIDO
echo $alguem->idade."<br/>";
//a senha nao mostra pois é UM ATRIBUTO PRIVADO
//ATRIBUTOS PRIVADOS nem os herdeiros conseguem acessar
echo $alguem->senha."<br/>";

// QUEM PODE TER ACESSO A ATRIBUTOS E METODOS:
// DA MESMA CLASSE
// DE CLASSES EXTENDIDAS - HERANCA
// ACESSADOS PELO OBJETO CRIADO
// PUBLICO - TODO MUNDO VÊ
// PROTEGIDO - MESMA CLASSE E CLASSE EXTENDIDA - O OBJETO (NEW) NAO VÊ
// PRIVADO - SOMENTE A MESMA CLASSE