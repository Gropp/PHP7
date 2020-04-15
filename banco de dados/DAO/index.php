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

/* ESSES COMANDOS FUNCIONAN, MAS AGORA VAMOS USAR A CLASSE USUARIO PARA FAZER AS OPERACOES NO BANCO
$sql = new Sql();
//vamos carregar a variavel usuarios com o retorno do select da tabela de usuarios do banco de dados - chamando o metodo select e passando os parametros
$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//vamso retornar as linhas de resultado do objetos $usuarios com a ajuda do json
echo json_encode($usuarios); */

//IMPORTANTE:

//USANDO A CLASSE USUARIOS
//INSTANCIAMOS A CLASSE DBSELECT NA VARIAVEL $SELECT
$select = new DBSelect();
//O SELECT ESTA PROGRAMADO NO METODO LOADBYID DA CLASSE, UM SELECT * FROM TB_USUARIOS WHERE IDUSUARIO = :ID ** ONDE O PARAMETRO A SER PASSADO É O :ID OU SEJA, O VALOR PARA O WHERE, QUE SERA O FILTRO DO SELECT
//VOU PROCURAR O USUARIO CUJO O IDUSUARIO = 3
$select->loadById(3);
//COMO VOLTA COMO JSON PODEMOS USAR O ECHO AO INVES DO PRINT_R OU VAR_DUMP
echo $select;