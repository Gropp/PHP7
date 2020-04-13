<?php
//EXEMPLO DE AUTOLOAD
//A ARQUIVO TEM QUE TER O MESMO NOME DA CLASSE QUE VAI INVOCAR
//FOI TRAZIDO JUNTO A INTERFACE POIS FAZ PARTE DO CODIGO
//ESSE CODIGO VAI FUNCIONAR JUNTO COM O DELREY.PHP
//ESSES CODIGOS FORAM DESMEMBRADOS DO ARQUIVO CLASSEABSTRATA.PHP
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