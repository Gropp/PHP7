<!-- sem declaracao de action, o padrao é a propria pagina
    sem declaracao de method o padrao é GET -->
<form>
    <input type="text" name="nome">
    <input type="date" name="nascimento">
    <input type="submit" value="OK">
</form>
<?php
    //no inicio do codigo ainda nao tera nada digitado, para garantir que nao de erro, somente com a digitaçao de algo o foreach é acionado
    if(isset($_GET))
    {
        //$_GET array super global
        //$key sao os nomes de todos os inputs do formulario
        //$value é o valor digitado pelo usuario
        //a cada entrada essas variaveis capturam os valores que voce pode jogar em um array, gravar em um BD...
        foreach($_GET as $key => $value)
        {
            print "Nome do campo: $key e o valor: $value";
            print "<hr>";
        }
    }
?>
