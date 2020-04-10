<?php
//esse arquivo tem por objetivo utilizar a sessao aberta no session.php
//esse arquivo só deve ser chamado apos a execucao do sessao.php, pois la que é atribuida a variavel de sessao nome um <valor>
//executando esse antes, a variavel é indefinida...
//session_start();
require_once("config.php");
//APAGAR VARIAVEIS DE SESSAO 
//session_unset($_SESSION['nome']);
//se nao especificar a variavel [], apaga todos os comandos da sessao
//session destroy destroi a variavel e destroi o usuario - da refresh
//session_destroy($_SESSION[]);
echo $_SESSION['nome'];
