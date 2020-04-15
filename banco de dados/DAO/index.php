<?php
/////////////////////////////////////////////////////////
//    ESSE INDEX.PHP CHAMA OS METODOS DA CLASSE SQL    //
//    EXECUTANDO EM UM BANCO DE DADOS COMANDOS SQLS    //
//    NECESSARIOS PARA A EXECUCAO DE ALGUMA NECESSI-   //
//    DADE DE UM PROGRAMA ESPECIFICO                   //
/////////////////////////////////////////////////////////

//incluimos o config.php
require_once("config.php");
//vamos criar o objeto $sql chamando a classe Sql que criamos e esta sendo carregada no autoload do config.php
$sql = new Sql();
//vamos carregar a variavel usuarios com o retorno do select da tabela de usuarios do banco de dados - chamando o metodo select e passando os parametros
$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//vamso retornar as linhas de resultado do objetos $usuarios com a ajuda do json
echo json_encode($usuarios);