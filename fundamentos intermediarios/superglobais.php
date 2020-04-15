<?php
//SUPERGLOBAIS
$data = $_GET["a"]; // recebe uma string da url/uri ?a=1900&b=2020
$dataint = (int)$_GET["b"]; //converte b para inteiro
var_dump($data); //mostar a variavel como string
print "<br/>";
var_dump($dataint); //mostra a variavel como inteiro
print "<br/>";
$ip = $_SERVER["REMOTE_ADDR"]; //ip do ususario
$nscript = $_SERVER["SCRIPT_NAME"]; //nome do script
var_dump($ip);
print "<br/>";
var_dump($nscript);
print "<br/>";
//ESCOPO DE VARIAVEIS
$nome = "Jose";
function test(){
    global $nome; //traz a variavel fora do escopo para dentro da funcao
    print($nome); //vai imprimir na tela o nome Jose
}
function test2(){
    $nome = "Maria"; //variavel de escopo local, só existe neste bloco{}
    print($nome); //imprime na tela Maria, sem prejuizo a variavel externa ao bloco
}
test(); // chamada da funcao 1
print "<br/>";
test2(); // chamada da funcao 2

$a = NULL;
$b = NULL;
$c = 10;
//o echo so vai mostrar a variavel que nao for nula! e para na primeira que encontrar
// neste caso vai mostrar 10
print "<br/>";
echo $a ?? $b ?? $c;
