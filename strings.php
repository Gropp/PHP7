<?php
$nome = "hcode";
$nome2 = 'treinamentos';
$frase = "E na bunada nao vai dinha?";
$frase2 = 'Cada "macaco" no seu "Galho"';
$palavra = "vai";
//O PHP FAZ A INTERPOLACAO DE STRINGS
//aspas DUPLAS o PHP identifica variaveis
//aspas SIMPLES o PHP interpreta tudo como STRING
echo "$nome";
echo "<br/>";
echo '$nome';
echo "<br/>";
echo $nome2;
echo "<br/>";
echo '$nome2';
echo "<br/>";
print $nome." ".$nome2;
echo "<br/>";
echo strtoupper($nome);
echo "<br/>";
echo strtolower($nome2);
echo "<br/>";
echo ucfirst($nome);
echo "<br/>";
$conc = $nome." ".$nome2;
echo ucwords($conc);
echo "<br/>";
echo str_replace("o","0",$nome);
echo "<br/>";
echo str_replace("e","3",$nome2);
echo "<br/>";
//busca em strings
//localiza onde comeca a $palavra procurada na string $frase
$index = strpos($frase, $palavra);
var_dump($index);
//joga o inicio da string na variavel subpre
$subpre = substr($frase,0,$index);
echo "<br/>";
echo $subpre;
//joga o fim da string na variavel subpro - incluindo a palavra procurada
$subposcom = substr($frase, $index);
echo "<br/>";
echo $subposcom;
//se voce quiser mostrar somente o antes e o apos, sem a palavra procurada
//indice + tamanho da palavra, até o tamanho da frase FIM DA FRASE
$subpossem = substr($frase, $index + strlen($palavra), strlen($frase));
echo "<br/>";
echo $subpossem;
echo "<br/>";
echo addslashes($frase2);
$cpf = "858.695.389-04";
echo "<br/>";
echo $cpf;
$cpf = preg_replace('/[^0-9]/', '', $cpf);
echo "<br/>";
echo $cpf;