<?php
//FUNCOES SPL BIBLIOTECA PADRAO DO PHP
//RESOLVE O PROBLEMA DE ARQUIVOS DE CLASSES EM DIRETORIOS DIFERENTES
//funcao para incluir as classes
function incluirClasses($nomeClasse){
    //testa se o arquivo existe no diretorio
    if(file_exists($nomeClasse.".php") === true) {
        //se o arquivo existir no diretorio atual ele é incluido no codigo
        require_once($nomeClasse.".php");
    }
}
//chama o autoload da biblioteca do php chamando a funcao criada acima, que testa se existe o arquivo no diretorio
spl_autoload_register("incluirClasses");
//tambem podemos chamar o spl loader chamando uma funcao anonima, declarada dentro do argumento (funcao sem nome)
//no windows que nao é keysensitive, nomes nao tem problema, mas se o servidor for Linux, LEMBRE-SE DE COLOCAR OS NOMES DE PASTAS E DIRETORIOS IGUAIS AOS CRIADOS
//ESSA AUTOLOAD SERVE PARA BUSCAR ARQUIVOS EM OUTROS DIRETORIOS QUE NAO O RAIZ DO PROGRAMA, CORRIGE UMA DEFICIENCIA DO METODO MAGICO __AUTOLOAD E VC PODE ORGANIZAR MELHOR SEU CODIGO
spl_autoload_register(function($nomeClasse){
    //file_exists(nomedodiretorio concatenado com a barra \ ou / (a CONSTANTE traz a barra conforme o S.O. do servidor) mais o nome do arquivo concatenado com .php)
    if(file_exists("NomedaPasta".DIRECTORY_SEPARATOR.$nomeClasse.".php")=== true) {
        require_once("NomedaPasta".DIRECTORY_SEPARATOR.$nomeClasse.".php");
    }
});
$carro = new DelRey();
$carro->acelerar(80);