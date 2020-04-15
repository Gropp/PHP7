<?php
function rotina()
{
    echo "isso é uma rotina!<br/>";
}
rotina();
function func()
{
    return "isso é uma funçao!<br/>";
}
print func();
function ola2($txt = "padrao")
{
    return "Ola $txt!<br/>";
}
echo ola2();
echo ola2("");
echo ola2("Jose");
echo ola2("Maria");
echo ola2("Joao");
//function doisp($txt1, $txt2)
//sem valores padrao, coloque a esquerda os obrigatorios
//function doisp($txt1, $txt2="pad2")
function doisp($txt1="padrao1", $txt2="padrao2")
{
    return "Texto1: $txt1, Texto2: $txt2.<br/>";
}
//se a funcao tem paramentros e vc nao passar nada e a funcao nao tiver valores padroes, o PHP vai parar, da erro. com valor padrao, aparecem os dois valores padroes
echo doisp();
//se a funcao tiver paramentros com valores padrao, a chamada abaixo só põe branco no primeiro item e mostra o valor padrao no segundo
echo doisp(" "," ");
echo doisp("um","");
echo doisp("","dois");
echo doisp("casa","carro");
echo doisp("loja","balcao");
echo doisp("trabalho","elevador");
//funcao que recebe paramentros dinamicamente como um array
function dinamica()
{
    $argumentos = func_get_args();
    return $argumentos;
}
?>
<pre>
<?php
print_r(dinamica("um arg"));
print ("<br/>");
print_r(dinamica("um arg",2));
print ("<br/>");
print_r(dinamica("um arg",2,true));
?>
</pre>
<?php
$a = 10;
$b = 20;
//acessa o endereço da variavel & assim as funçoes alteram a variavel em escopo global
function trocaValor($a,&$b)
{
    $a = 50;
    $b = 80;
    $soma = $a + $b;
    return "Valor de A = $a, Valor de B = $b, Valor de A+B = $soma.";
}
echo "A = $a";
print ("<br/>");
echo "B = $b";
print ("<br/>");
echo trocaValor($a,$b);
print ("<br/>");
echo "Apos a função: <br/>";
echo "A = $a";
print ("<br/>");
echo "B = $b";
print ("<br/>");
$pessoa = array(
    'nome'=>'João',
    'idade'=> 20
);
//alterando o valor dentro do array em todo o escopo do codigo
foreach($pessoa as &$value) {
    //verifica se o valor do campo é um inteiro... se for soma + 10 ao valor
    if(gettype($value) === 'integer') $value += 10;
    print $value.'<br/>';
}
?>
<pre>
<?php
print_r($pessoa);
?>
</pre>
<?php
//IMPORTANTE: DECLARAÇAO DE SOMA ESCALARES
//A FUNCAO SABE QUE VIRAO VARIOS VALORES DO TIPO INTEIRO, NAO SABE E NAO IMPORTA QTOS
//A FUNCAO ARRAY_SUM SOMA AUTOMATICAMENTE OS VALORES ENTRADOS NA FUNCAO - UM VETOR DE INTEIROS.
//SUBSTITUI O FUNC_GET_ARGS
//DEPOIS DOS PARENTESES DECLARA O RETORNO : STRING P.EX.
//CONVERTE O DADO AUTOMATICAMENTE NO RETORNO
// int float string...
function soma2(int ...$valores):string{
    return array_sum($valores);
}
echo soma2(2,3);
echo "<br/>";
echo soma2(4,7);
echo "<br/>";
//COMO A FUNCAO TEM TIPO INT ELE IGNORA A FRAÇAO
var_dump (soma2(2.5,3.3));
echo "<br/>";
?>