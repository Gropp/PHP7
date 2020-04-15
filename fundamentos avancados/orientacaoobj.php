<?php
//criando uma classe
//Primeira Letra Maiuscula
class Pessoa {
    //encapsulamento
    //atributos publico
    public $nome;

    //metodo publico
    //$this instancia da propria class estaclasse -> nome...o dolar $this faz o papel do $, so funciona detro dos metodos e referencia outros metodos dentro de metodos...
    public function falar(){
        return "O meu nome é ".$this->nome; 
    }
}
//instanciando a classe e criando um objeto com os atributos e metodos da classe
//IMPORTANTE: metodo construtor o parenteses do () ao chamar a class $alguem = new Pessoa tambem funciona!!!
$alguem = new Pessoa();
$alguem->nome = "Pedro da Silva";//carrega o atributo nome
echo $alguem->falar();//chama o metodo falar e mostra o valor - nao da para dar echo só em $alguem, pois é um objeto, da erro!!!