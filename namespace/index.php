<?php
//INCLUI O ARQUIVO DE CONFIGURACAO QUE FAZ AUTOLOAD DAS CLASSES QUE SERAO UTILIZADAS NESTE PROGRAMA
require_once("config.php");
//AGORA PRECISAMOS CARREGAR OS NAMESPACES CRIADOS PARA UTILIZARMOS CLASSES COM MESMOS NOMES EM DIRETORIOS DIFERENTES - PALAVRA CHAVE USE
//IMPORTANTE:
//VAMOS USAR O NAMESPACE CLIENTE QUE ESTA DENTRO DA CLASSE CADASTRO DO DIRETORIO CADASTRO
//IMPORTANTE:
//!!!!!!!!!!!!!!!!!!!!! USE INDEPENDENTE DO S.O. USA CONTRABARRA!!!!!!!!!!!!!!!!!!
//A STRING $nameClass POR ALGUN MOTIVO MANDA A BARRA ERRADA - DA PAU NO LINUX
use Cliente\Cadastro;
//cria o OBJETO CAD COM OS ATRIBUTOS E METODOS DA CLASSE CADASTRO
//Essa classe cadastro esta vindo de dentro da pasta class
//Mas poderia ter um cadastro do cliente/cadastro de pecas/cadastro de funcionarios...
//COM O NAMESPACE CLIENTE O CADASTRO.PHP DENTRO DA PASTA CADASTRO, ESTA REFERENCIADA A CLASSE CADASTRO DO DIRETORIO ACIMA (POLIMORFISMO) QUE É A CLASSE MAE, ENTAO PODEMOS CRIAR UM OBJETO QUE IRA UTILIZAR OS METODOS DAS DUAS CLASSES CADASTROS (MAE E FILHA)
$cad = new Cadastro();
//Chama o METODO SET PARA ATRIBUIR AS VARIAVEIS (ATRIBUTOS) DA CLASSE MAE
$cad->setNome("Paul Mcartney");
$cad->setEmail("pm@dominio.com.br");
$cad->setSenha("123456");
//echo so mostra STRING - como a classe Cadastro tem o Metodo Magico __toString(), o comando echo consegue mostrar o valor das variaveis, se nao tivesse esse metodo, somente com var_dump ou print_r, por ser vetor ou objeto
#print "<br/>";
echo $cad;
//Chama o METODO REGISTRARVENDAS DA CLASSE FILHA DO NAMESPACE CLIENTE
print "<br/>";
$cad->registrarVenda();
