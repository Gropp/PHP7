<?php
//voce pode abrir uma pagina utilizando o id de uma sessao ja exitente, e assim utilizar as variaveis ativas naquela sessao!!! em uma guia anonima por exemplo...
session_id('b637b01805e010167b0403fbeb854020');
require_once("config.php");
//mostra o numero da sessao que voce esta utilizando
echo session_id();
echo "<br/>";
//forca o servidor a criar um novo ID de sessao por a
//session_regenerate_id();
//echo session_id();
//echo "<br/>";
var_dump($_SESSION);
//esse id de sessao cria um session hijacking - pode assumir o lugar de um usuario validado em qualquer tipo de site... bancos, lojas virtuais