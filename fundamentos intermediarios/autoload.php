<?php
//metodos magicos __NAME
//essa funcao carrega recursivamente todas os arquivos que estao referenciados nas dependencia de cada funcao
//essa funcao autoload exige que todos os arquivos das classes envolvidas tenham EXATAMENTE o nome das classes chamadas. DelRey.php / Automovel.php
//SAO KEY SENSITIVE
//IMPORTANTE:
//ATENCAO... O AUTOLOAD SO SABE PROCURAR AS CLASSES NO MESMO DIRETORIO
//NESTE CASO TAVA TODO MUNDO NO / PRINCIPAL AO CRIAR O OBJETO O NEW DISPARA O AUTOLOAD A CLASSE DelRey ESTA NO ARQUIVO DelRey.php
function __autoload($nomeClasse){
    require_once("$nomeClasse.php");
}
$carro = new DelRey();
$carro->acelerar(80);