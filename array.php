<?php
//declaracao de arrays
//vetor
$frutas = array("maca","pera","banana","uva");
//matrizes
$carros = [["GM","COBALT","ONIX","CAMARO"],["FORD","FIESTA","FUSION","ECO SPORT"]];
$carros[2][0] = "FIAT";
$carros[2][1] = "UNO";
$carros[2][2] = "PALIO";
$carros[2][3] = "IDEIA";
$carros[3][0] = "VW";
$carros[3][1] = "UP";
$carros[3][2] = "GOL";
$carros[3][3] = "JETTA";
?>
<pre>
<?php
//print_r imprime um array
print_r($frutas);
print_r($carros);
//a funcao end da o ultimo elemento do vetor, ou se vc colocar o indice da matriz, da o ultimo elemento da matriz para aquele indice escolhido.
print end($frutas);
print '<br/>';
print end($carros[3]);
?>
</pre>
<?php
$pessoas = array();
array_push($pessoas, array(
    'nome' => 'Joao',
    'idade' => 20
));
array_push($pessoas, array(
    'nome' => 'Fernando',
    'idade' => 30
));
?>
<pre>
<?php
print_r ($pessoas);
print_r ($pessoas[0]['nome']);
?>
</pre>