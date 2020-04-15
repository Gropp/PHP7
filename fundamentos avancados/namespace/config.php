<?php
//vamos organizar onde o programa vai procurar as classes
//IMPORTANTE: filename = inclui o arquivo e TODO O CAMINHO ATÉ ELE
//CRIANDO UM AUTO LOAD
spl_autoload_register(function($nameClass){
    #var_dump($nameClass);
    #print "<br/>";
    //IMPORTANTE:
    //A VARIAVEL $nameClass MANDA A BARRA ERRADA PARA O SISTEMA LINUX, INDEPENDENTE DO QUE PUSERMOS NO NOMESPACE E NO USE, SEMPRE VEM A BARRA ERRADA, ENTAO É NECESSARIO FAZER ESSA TROCA DE STRING. \ É UM CARACTERE ESPECIAL, ENTAO TEM QUE COLOCAR DUAS VEZES PARA DAR CERTO E A FUNCAO TROCAR A \ POR / E ENTAO A CLASSE DENTRO DA PASTA CORRETA SER ACESSADA, HERDAR OS METODOS E EXECUTAR O QUE QUERIAMOS!!!!
    $nameClass = str_replace ('\\', '/', $nameClass);
    #var_dump($nameClass);
    //DEFININDO - o diretorio das classes
    $dirClass = "class";
    //DEFININDO - o caminho e o nome das classes (recursivo)
    $filename = $dirClass.DIRECTORY_SEPARATOR.$nameClass.".php";
    #print "<br/>";
    #print_r($filename);
    //TESTANDO - se o arquivo/caminho existem, existindo true, carrega
    if (file_exists($filename)){
        require_once($filename);
    }  
});
//-------------------- CARREGADA AS CLASSES ---------------------------
