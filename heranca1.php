<?php
//classe Documento Primaria
class Documento {
    //ATRIBUTOS
    private $numero;
    //METODOS
    //Get - pega o ATRIBUTO NUMERO
    public function getNumero()
    {
        return $this->numero;
    }
    //Set - carrega o ATRIBUTO NUMERO
    public function setNumero($n)
    {
        $this->numero = $n;
    }
}
//classe CPF filha da Documento - tera acesso ao numero do documento, seja qual for para trabalhar com ele.
class CPF extends Documento {
    //no caso a classe so tem o metodo para validar o numero para ver se é um CPF e se é valido.
    public function validar():bool
    {
       $numeroCPF = $this->getNumero();
       //funcao de validar cpf usando a variavel $numeroCPF
       //só copiar o codigo que fizemos
       return true;
    }
}
//criamos o objeto $doc que esta vinculado a classe CPF
$doc = new CPF();
//colocamos no Atributo Numero da classe Herdada Documento um numero que deve ser de um CPF
$doc->setNumero("13332643932");
//Chamamos o Metodo da classe filha CPF que ira testar se o numero informado é um CPF valido; 
var_dump($doc->validar());
echo "<br/>";
echo $doc->getNumero();