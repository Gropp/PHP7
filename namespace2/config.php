<?php
///////////////////////////////////////////////////////////////////
#                ARQUIVO DE CONFIGURAÇOES GERAIS                  #
#                     AUTOLOAD DAS CLASSES                        #
#                  FERNANDO GROPP - 2020                          #
///////////////////////////////////////////////////////////////////
//vamos organizar onde o programa vai procurar as classes
//IMPORTANTE: filename = inclui o arquivo e TODO O CAMINHO ATÉ ELE
//CRIANDO UM AUTO LOAD
spl_autoload_register(function($nameClass){
    var_dump($nameClass);
    //CONVERSAO DA BARRA S.O TEM QUE FAZER SEMPRE ISSO
    $nameClass = str_replace ('\\', '/', $nameClass);
    print "<br/>";
    var_dump($nameClass);
    print "<br/>";
    //COMO AS CLASSES ESTAO NA MESMA PASTA NAO PRECISA DE DEFINIR O CAMINHO
    //DEFININDO - o diretorio das classes
    #$dirClass = "model";
    //DEFININDO - o caminho e o nome das classes (recursivo)
    #$filename = $dirClass.DIRECTORY_SEPARATOR.$nameClass.".php";
    $filename = $nameClass.".php";
    //TESTANDO - se o arquivo/caminho existem, existindo true, carrega
    if (file_exists($filename)){
        require_once($filename);
    }  
});