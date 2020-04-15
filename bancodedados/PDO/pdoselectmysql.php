<?php
//////////////////////////////////////////////////////////////////////
//       UTILIZANDO O PDO PARA CONECTAR COM A BASE DE DADOS         //
//              COM O PADRAO DSN DATA SEARCH NAME                   //
//                           PDO OU POO                             //
//////////////////////////////////////////////////////////////////////
//UTILIZANDO O PADRAO DSN NOS ENVIAMOS OS DADOS DE CONEXAO
//COMO O PDO PARA TODAS AS TRANSACOES PRECISAMOS DO PREPARE
//TIPO DE BANCO, NOME DO BANCO, LOCAL DO HOST, USUARIO, SENHA
//COM O PDO PODEMOS TRATAR TRANSACOES
//PARA ATUAR COM OUTROS BANCOS MUDA O DBTYPE = SQLSERVER
//DBTYPE = MYSQL
$conn = new PDO("mysql:dbname=dbphp7;host=localhost","user","senha");
//PREPARE DO COMANDO SELECT
$stmt = $conn->prepare("SELECT * FROM tb_usuarios ORDER BY deslogin");
//CHAMA O METODO EXECUTE PARA EXECUTAR O COMANDO PREPARADO
$stmt->execute();
//DIFERENTE DA CLASSE MYSQLI, O OBJETO PDO JA TEM METODOS PARA CORRER O ARRAY DO SELECT, NAO É PRECISO CRIAR UM LOOP COM WHILE, O METODO FETCHALL JA FAZ ISSO - TA PRONTO
//$results = $stmt->fetchAll();
//PARA TRAZER SOMENTE O CONTEUDO, SEM OS INDICES, COMO FIZEMOS NO MYSQLI, TEM QUE PASSAR A CONSTANTE DO OBJETO/CLASSE PDO - BEM PARECIDO COM O OUTRO EXEMPLO DO MYSQLI
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//PODERIAMOS GERAR UM JSON, COMO NO OUTRO EXEMPLO
//OU PODEMOS CORRER O ARRAY $results COM UM FOREACH ARRAY DE ARRAY
foreach($results as $row) { #ENTRAMOS NA PRIMEIRA LINHA NO PRIMEIRO ARRAY QUE TEM UM ARRAY COMO ELEMENTO [[AA,BB,DD],[GG,CC,EE],...]
    foreach ($row as $key => $value){ #AQUI ESTAMOS DENTRO DO SEGUNDO ARRAY [AA,BB,DD], ROW E O INDICE DO PRIMEIRO ARRAY, KEY É O INDICE DO SEGUNDO ARRAY E VALUE É O VALOR AA
        echo "<strong>".$key.":</strong>".$value."<br/>"; #PARA CADA LINHA DO SEGUNDO ARRAY ELE VAI MOSTRAR O INDICE: EM NEGRITO E O VALOR DO MESMO
    }
    //LINHA PARA SEPARAR
    echo "==============================================================<br/>";
}