<?php
//escrevendo a classe Carro
class Carro {
    //ATRIBUTOS (VARIAVEIS)
    private $modelo;
    private $motor;
    private $ano;
    //METODOS (GETRS(pegar o valor do atributo)/SETERS(altera o atributo))
    //nome das funcoes minusculaMaiuscula
    public function getModelo(){
        //dentro dos metodos o $ do atributo vira $this->
        return $this->modelo;
    }
    public function setModelo($modelo){
        //IMPORTANTE: Esse metodo SET vai alterar o valor do ATRIBUTO modelo, com uma VARIAVEL $modelo vindo de fora ao chamar esse metodo. um argumento do metodo $this->modelo e $modelo dentro do metodo SAO COISAS DIFERENTES! só atributos criados dentro da classe sao atributos o restante é variavel
        $this->modelo = $modelo;
    }
    //o float define que o return vai retornar um ponto flutuante
    public function getMotor():float{
        return $this->motor;
    }
    public function setMotor($motor){
        $this->motor = $motor;
    }
    //o int define que o return vai retornar um inteiro
    public function getAno():int{
        return $this->ano;
    }
    public function setAno($ano){
        $this->ano = $ano;
    }
    public function exibir(){
        //nao confundir array => com metodos ->
        return array(
            "modelo"=>$this->getModelo(),
            "motor"=>$this->getMotor(),
            "ano"=>$this->getAno()
        );
    }
}
$gol = new Carro();
//IMPORTANTE:
//como os atributos sao privados (PRIVATE), nao é possivel acessar DIRETAMENTE os ATRIBUTOS $gol->modelo = "Gol GT";
//para altera ou acessar os ATRIBUTOS, SOMENTE COM OS METODOS QUE SAO PUBLICOS (PUBLIC)
//os metodos SET "carregam" os atributos da classe
$gol->setModelo("Gol GT");
$gol->setMotor("1.8");
$gol->setAno("2000");
print_r($gol->exibir());
print "<br/>";
var_dump($gol->exibir());