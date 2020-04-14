<?php
//comandos de decisao
$qualSuaIdade = 30;
$idadeCrianca = 10;
$idadeAdulta = 18;
$idadeIdoso = 65;
if ($qualSuaIdade < $idadeCrianca)
{
    print 'É Criança';
} else if ($qualSuaIdade < $idadeAdulta)
{
    print 'É Adolescente';
} else if ($qualSuaIdade < $idadeIdoso)
{
    print 'É Adulto';
} else
{
    print 'É Idoso';
}
echo "<br/>";
echo ($qualSuaIdade < $idadeAdulta)?'Menor de idade':'Maior de idade';

$diaDaSemana = date("w");
echo "<br/>";
echo $diaDaSemana."<br/>";
switch($diaDaSemana)
{
    case 0:
        print 'Domingo<br/>';
    break;
    case 1:
        print 'Segunda<br/>';
    break;
    case 2:
        print 'Terça<br/>';
    break;
    case 3:
        print 'Quarta<br/>';
    break;
    case 4:
        print 'Quinta<br/>';
    break;
    case 5:
        print 'Sexta<br/>';
    break;
    case 6:
        print 'Sabado<br/>';
    break;
    default:
        print 'Dia invalido<br/>'; 
}
//cuidar MUITO COM LOOPS INFINITOS
for ($i = 0; $i <= 10; $i++)
{
    print $i." ";
}
print "<br/>";
for ($i = 10; $i >= 0; $i--)
{
    print $i." ";
}
print "<br/>";
for ($i = 0; $i <= 100; $i+=2)
{
    if($i > 50 && $i < 60) continue;
    //o continue volta para o teste do loop, sem executar a instrucao print
    if($i === 90) break;
    //o break interrompe o loop - aplicar em algum caso bem especifico
    print $i." ";
}
print "<br/>";
echo "<select>";
for($ind = date("Y"); $ind >= date("Y") - 100; $ind--)
{
    echo '<option value="'.$ind.'">'.$ind.'</option>';
}
echo "</select>";
print "<br/>";
$meses = array("janeiro","fevereiro","marco","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");
foreach($meses as $mes)
{
    print "O mês é: $mes <br/>";
}
foreach($meses as $chave => $mes)
{
    print "O indice é $chave e o mês é: $mes <br/>";
}