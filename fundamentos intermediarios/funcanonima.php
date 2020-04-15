<?php
//usado na chamda de um processo que pode demorar para terminar - converter um video
function teste($callback){
    $callback();
}
//chama a funcao teste, chamando uma funcao anonima, e quando acabar retorna TERMINOU
teste(function(){
    echo "TERMINOU";
    echo "<br/>";
});
//atribui uma funcao a uma variavel
//nao tem return
$fn = function($a){
    var_dump($a);
};
//chama a variavel passando o argumento da funcao
$fn("oi");