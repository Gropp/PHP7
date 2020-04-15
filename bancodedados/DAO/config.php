<?php
//vamos criar um autoload das Bibliotecas padroes do PHP SPL, com uma funcao ANONIMA (SEM NOME)
spl_autoload_register(function($class_name){
    //concatena o nome da classe (que é o nome do ARQUIVO) com o .php
    $filename = $class_name.".php";
    //se o arquivo existir ele faz um require_once deste arquivo - inclui no codigo
    if(file_exists($filename)){
        require_once($filename);
    }
});