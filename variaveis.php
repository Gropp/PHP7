<?php

// comentarios //
// codigos inativos #

//linguagem fracamente tipada
//VARIAVEIS
//tipos basicos
$nome = "variavel string";
$sobrenome = "ainda é string";
$site = 'www.string.com.br';
$vazia = ' ';
$inteiro = 90;
$flutuante = 89.4;
$boolean = true;
//concatenacao .
$nomeCompleto = $nome." ".$sobrenome;
//para o codigo
#exit; 

//tipos compostos arrays e objetos
$vetor = [1,2,3,4,5];
$frutas = array("abacaxi","laranja","manga");
$misto = ["aula",4,60.1,true];
$matriz = [[2,4],[4,2],[9,5]];
$nascimento = new DateTime();

//tipos especiais resource null
#$arquivo = fopen("exemplo-03.php", "r");
//nulo nao existe. atribui o valor null ou da unset na variavel!
//vazio ela existe e tem espaco reservado.
$nulo = null; 

//mostrar os valores das variaveis
echo $nome;
echo "<br/>";
echo $inteiro;
echo "<br/>";
var_dump($flutuante);
echo "<br/>";
echo $frutas[2];
echo "<br/>";
var_dump($nascimento);
echo "<br/>";
#var_dump($arquivo);
//limpar as variaveis
unset($inteiro);
//testa se a variavel existe antes de exibi-la
if(isset($inteiro)){
    echo $inteiro;
}
