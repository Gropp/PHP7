<?php
//vamos criar um autoload das Bibliotecas padroes do PHP SPL, com uma funcao ANONIMA (SEM NOME)
spl_autoload_register(function($class_name){
    //concatena o nome da classe (que é o nome do ARQUIVO) com o .php
    //IMPORTANTE:
    //A VARIAVEL $class_name MANDA A BARRA ERRADA PARA O SISTEMA LINUX, SEMPRE VEM A BARRA ERRADA, ENTAO É NECESSARIO FAZER ESSA TROCA DE STRING. \ É UM CARACTERE ESPECIAL, ENTAO TEM QUE COLOCAR DUAS VEZES PARA DAR CERTO E A FUNCAO TROCAR A \ POR / E ENTAO A CLASSE DENTRO DA PASTA CORRETA SER ACESSADA, HERDAR OS METODOS E EXECUTAR O QUE QUERIAMOS!!!!
    $class_name = str_replace ('\\', '/', $class_name);
    //DEFININDO - o diretorio das classes
    $dirClass = "class";
    //DEFININDO - o caminho e o nome das classes (recursivo)
    $filename = $dirClass.DIRECTORY_SEPARATOR.$class_name.".php";
    //SE AS CLASSES ESTIVESSEM NO MESMO DIRETORIO DO CONFIG.PHP ERA SO DESABILITAR A LINHA ABAIXO:
    #$filename = $class_name.".php";
    //se o arquivo existir ele faz um require_once deste arquivo - inclui no codigo
    if(file_exists($filename)){
        require_once($filename);
    }
});