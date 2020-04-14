<?php
//A SESSION NAO VEM ABERTA POR DEFAULT
//abrindo a sessao
//cria 
//php.ini session.autostart (no servidor nao vem habilitado)
//IMPORTANTE: esse arquivo cria e inicia a sessao criando uma variavel global nessa sessao.
//arquivos .inc nao sao seguros - includes
//session_start();
require_once("config.php");
$_SESSION["nome"] = "datarde";