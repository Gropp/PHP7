<?php
//pacote endereço com metodos magicos
//quando vc instancia a classe e passa os parametros ele ja sabe automaticamente que é para usar o __construct, quando voce manda imprimir os atributos ele ja sabe que é para automaticamente converter de objeto -> string, e quando voce der um unset na classe, ele da o aviso contido no __destruct
class Endereco {
    //atributos
    private $logradouro;
    private $numero;
    private $adicional;
    private $cidade;
    //metodo construtor magic __construct
    //metodos magicos eliminam os gets e sets...
    public function __construct($l, $n, $a, $c) {
        $this->logradouro = $l;
        $this->numero = $n;
        $this->adicional = $a;
        $this->cidade = $c;
    }
    //metodo magico para converter tipos
    public function __toString(){
        return $this->logradouro.", ".$this->numero.", ".$this->adicional." - ".$this->cidade;
    }
    //para destruir um objeto e liberar memoria do servidor magic __destruct
    public function __destruct(){
        //var_dump("DESTRUIR");
    }
}
//chamada do __construct
$meuEndereco = new Endereco("Rua Elpidio Alves", "72", "ap.101","Curitiba");
echo $meuEndereco;
//var_dump($meuEndereco);
//chamada do __destruct
//unset($meuEndereco);
//tem muitos metodos magicos do PHP - estudar