<?php
//INCLUI O ARQUIVO DE CONFIGURACAO QUE FAZ AUTOLOAD DAS CLASSES QUE SERAO UTILIZADAS NESTE PROGRAMA
require_once("config.php");
//AGORA PRECISAMOS CARREGAR OS NAMESPACES CRIADOS PARA UTILIZARMOS CLASSES COM MESMOS NOMES EM DIRETORIOS DIFERENTES - PALAVRA CHAVE USE
//IMPORTANTE:
//VAMOS USAR O NAMESPACE CLIENTE QUE ESTA DENTRO DA CLASSE CADASTRO DO DIRETORIO CADASTRO
//IMPORTANTE:
//!!!!!!!!!!!!!!!!!!!!! USE INDEPENDENTE DO S.O. USA CONTRABARRA!!!!!!!!!!!!!!!!!!
//A STRING $nameClass POR ALGUN MOTIVO MANDA A BARRA ERRADA - DA PAU NO LINUX
//VAMOS USAR O NAMESPACE model - E AS CLASSES(ARQUIVOS...) ALGUNS COM ALIASES
use model\{ClassA as A, ClassB as B, ClassC};
//criar os OBJETOS COM OS ATRIBUTOS E METODOS DA CLASSES A PALAVRA RESERVADA NEW AO CARREGAR O OBJETO STARTA O CARREGAMENTO __AUTOLOAD NO CONFIG.PHP
$sA = new A();
$sB = new B();
$sC = new ClassC();
//atribui valor aos Atributos
$sA->setNome("NameSpace");
$sB->setEndereco("Rua dos Bobos n.0");
$sC->setCidade("Haven");
//AO DAR ECHO NO OBJETO O METODO MAGICO __toString com o json transforma o objeto em string
echo $sA;
print "<br/>";
echo $sB;
print "<br/>";
echo $sC;
print "<br/>";
//Chamando os METODOS Mostrar... eles retornam os proprios echos lá inseridos
$sA->MostrarNome();
print "<br/>";
$sB->MostrarEndereco();
print "<br/>";
$sC->MostrarCidade();
print "<br/>";