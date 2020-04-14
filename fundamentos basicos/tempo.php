<?php
//a funcao precisa de parametros para definir o que voce quer saber
//d dia m mes Y ano H hora i minutos (m é mes - m"i"nuto) s segundos
//usando o timestamp - posix - no parametro do date, ele trava o horario
//funcao setlocale - o padrao altera entre linux e windows
//LC_ALL constante global, vai receber esses dados com locale a usar
setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");
//horarios ante de 01011970 o timestamp é negativo.
//echo date("d/m/Y H:i:s", 1586642723);
echo date("d/m/Y H:i:s");
echo "<br/>";
echo time();
echo "<br/>";
//funcao que retorna o timestamp de uma data em especifico
echo strtotime("2001-09-11");
echo "<br/>";
//a funcao strtotime aceita expressoes, now, week, day, yesterday, tomorow, +1 day, +1 week, month, 2 seconds, +15 day...
$ts = strtotime("yesterday");
//vamos retornar o timestamp escolhido como data
//l retorna o dia da semana
echo date("l, d/m/Y H:i:s", $ts);
//ver no manual as opcoes do strftime %A Dia %B mes
$strft = strftime("%A %B");
echo "<br/>";
print ucwords($strft);
//acessando o METODO new DateTime
$dt = new DateTime();
echo "<br/>";
print $dt->format("d/m/Y H:i:s");
//metodo para calculos com datas documentacao da classe DateInterval PHP.NET
//classe date time - ver no manual DateInterval::format
//https://www.php.net/manual/pt_BR/dateinterval.format.php
//O método DateInterval::format() não recalcula os pontos de transferência em strings de tempo que não estejam no segmento da data. Isso é esperado por que não é possível extrapolar valores como em "32 dias" que pode ser interpretado como "1 mês e 4 dias" e até "1 mês e 1 dia".
//D	Dias, em presentação numérica, com dois dígitos e zero à esquerda
//M	Meses, em presentação numérica, com dois dígitos e zero à esquerda
//Y	Anos, em representação numérica, com dois dígitos e zero à esquerda
$periodo = new DateInterval("P15D");
echo "<br/>";
print $periodo->format('%d dias');
//soma o periodo na DateTime
//o bom de usar os metodos é que o sistema ja resolve problemas como meses com 30 ou 31 dias. nao precisa reinventar a roda
$dt->add($periodo);
echo "<br/>";
//para acessar as opçoes do METODO SE USA ->
//format() é igual a funcao date
print $dt->format("d/m/Y H:i:s")."\n";
echo "<br/>";
var_dump ($dt->format("d/m/Y H:i:s"))."\n";
echo "<br/>";
$janeiro = new DateTime('2010-01-01');
$fevereiro = new DateTime('2010-02-01');
$intervalo = $fevereiro->diff($janeiro);
echo $intervalo->format('A diferença entre janeiro e fevereiro são %a dias')."\n";
echo "<br/>";
echo $intervalo->format('%m mês, %d dias');                 