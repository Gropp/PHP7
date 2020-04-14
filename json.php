<?php
$pessoas = array();
array_push($pessoas, array(
    'nome' => 'João',
    'idade' => 20
));
array_push($pessoas, array(
    'nome' => 'Pedro',
    'idade' => 30
));
?>
<pre>
<?php
print_r ($pessoas);
print('<br/>');
print_r ($pessoas[0]['nome']);
print('<br/>');
//IMPORTANTE: JSON
//converte a matriz $pessoa em padrao Json
echo json_encode($pessoas);
print('<br/>');
//transformar um objeto Json em Matriz
$json = '[{"nome":"João","idade":20},{"nome":"Pedro","idade":30}]';
//a opçao true é para transformar todo a string em array, sem o true ele vira um objeto
$data = json_decode($json, true);
var_dump($data);
print('<br/>');
print_r($data);
print('<br/>');
print_r($data[1]['idade']);
?>
</pre>