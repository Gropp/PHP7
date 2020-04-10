<?php
$condicao = true;
while($condicao)
{
    //numero randomico entre 1 e 10
    $numero = rand(1, 10);
    if($numero === 3)
    {
        print 'Tres!!!! ';
        $condicao = false;
    }
    echo "$numero ";
}
echo "<br/>";
//aplica o desconto pelo menos uma vez... mas somente da mais desconto se o valor for acima de R$100,00
$total = 150;
$desconto = 0.9; #10%
do
{
    $total *= $desconto;
} while ($total > 100);
print $total;