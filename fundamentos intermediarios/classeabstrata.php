<?php
//CLASSE ABSTRATA
//INTERFACE
interface Veiculo {
    //definir padroes
    //O codigo tem que OBRIGATORIAMENTE ter essas funcoes
    //Ajuda na integracao de APIs
    public function acelerar($velocidade);
    public function frenar ($velocidade);
    public function trocarMarcha($marcha);
}
//implementar a interface com uma classe ABSTRATA
abstract class Automovel implements Veiculo{
    public function acelerar($vel){
        echo "O veiculo acelerou até ".$vel."Km/h";
    }
    public function frenar($vel){
        echo "O veiculo frenou até ".$vel."Km/h";
    }
    public function trocarMarcha($mar){
        echo "O veiculo engatou a marcha ".$mar;
    }
}
//classe extended para usar a classe ABSTRACT AUTOMOVEL
class DelRey extends Automovel {
    public function empurrar(){

    }
}

//instanciando a classe extendida para acessar a classe abstrata
$carro = new DelRey();
$carro->acelerar(200);
//teste - ao instanciar uma classe abstract o php da erro - ignora!!!
//$carro1 = new Automovel();