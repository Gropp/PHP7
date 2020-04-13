<?php
//classe abstrata Animal - nao pode ser acessada diretamente por nenhum objeto
abstract class Animal {
    public function falar(){
        return "Som";
    }
    public function mover(){
        return "Anda";
    }
}
//Classe extendida Cachorro
class Cachorro extends Animal {
    public function falar(){
        return "Late";
    }
}
//Classe extendida Gato
class Gato extends Animal {
    public function falar(){
        return "Mia";
    }
}
//
class Passaro extends Animal {
    public function falar(){
        return "Canta";
    }
    //concatenar com a classe pai
    public function mover(){
        //concatena com o return do mover da classe principal atraves da palavra reservada parent e do conector ::
        return "Voa e ".parent::mover();
    }
}
//as classes extendidas mudam o comportamento da funcao falar, dando um sentido especifico a classe de interesse - cachorros latem, gatos miam - isso é polimorfismo.
print "<em>Pluto</em><br/>";
$pluto = new Cachorro();
echo $pluto->falar()."<br/>";
echo $pluto->mover()."<br/>";
print "<em>Garfield</em><br/>";
$garfield = new Gato();
echo $garfield->falar()."<br/>";
echo $garfield->mover()."<br/>";
print "<em>Pica-Pau</em><br/>";
$picapau = new Passaro();
echo $picapau->falar()."<br/>";
echo $picapau->mover()."<br/>";