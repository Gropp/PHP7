<?php
//INTERFACE
interface Veiculo {
    //definir padroes
    //O codigo tem que OBRIGATORIAMENTE ter essas funcoes
    //Ajuda na integracao de APIs
    public function acelerar($velocidade);
    public function frenar ($velocidade);
    public function trocarMarcha($marcha);
}
//implementar a interface
class Civic implements Veiculo{
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
$carro = new Civic();
$carro->trocarMarcha("1");