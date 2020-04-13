<?php
//metodos magicos __NAME
//essa funcao carrega recursivamente todas os arquivos que estao referenciados nas dependencia de cada funcao
//essa funcao autoload exige que todos os arquivos das classes envolvidas tenham EXATAMENTE o nome das classes chamadas. DelRey.php / Automovel.php
//SAO KEY SENSITIVE
//ATENCAO... O AUTOLOAD SO SABE PROCURAR AS CLASSES NO MESMO DIRETORIO
function __autoload($nomeClasse){
    require_once("$nomeClasse.php");
}
$carro = new DelRey();
$carro->acelerar(80);