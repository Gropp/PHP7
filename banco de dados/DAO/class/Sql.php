<?php
//VAMOS CRIAR UMA CLASSE SQL.PHP ONDE IREMOS COLOCAR TODOS OS METODOS REFERENTES A MANIPULACAO DA BASE DE DADOS QUE SERAO UTILIZADOS PELOS PROGRAMA
//A GRANDE "JOGADA" É FAZER ESSA CLASSE SER FILHA DA CLASSE NATIVA DO PDO DO PHP, E ASSIM ELA VAI ACESSAR TODOS OS ATRIBUTOS E METODOS PUBLICOS DESSA CLASSE
class Sql extends PDO {
    //VAMOS CRIAR UM ATRIBUTO PRIVADO PARA QUARDAR OS DADOS DA CONEXAO
    private $conn;
    //VAMOS CRIAR UM METODO CONSTRUTOR PARA QUE SE CONECTE DIRETAMENTE NA BASE DE DADOS AO SE CONSTRUIR O OBJETO  $CONN = NEW...
    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7","user","senha");
    }
    //METODO PARA TRATAR O STATMENT E VARIOS PARAMETROS, LIGAR. CRIA OS BINDPARAM, ENTRE VARIAVEIS E IDS - É PRIVADA POIS NAO TEM PORQUE SER ACESSADA DE FORA DA CLASSE
    private function setParams($statment, $parameters = array()){
        //vamos varrer o array $params coletando os diversos parametros que podem vir como requisitos do comando sql - os valores que complementam o comando sql (nome da tabela, dados a serem inseridos, dados para where, entre outros)
        foreach ($parameters as $key => $value){
            //PARA AGILIZAR O CODIGO E NAO DUPLICAR O COMANDO BINDPARAM, O FOREACH A CADA LOOP, JA QUE É UM COMANDO POR ITERACAO, ELE CHAMA O METODO QUE CRIAMOS PARA TRATAR UM SÓ PARAMETRO METODO PRIVADO SETPARAM
            $this->setParam($key, $value);
        }
    }
    //METODO PARA TRATAR O STATMENT E UM PARAMETRO, LIGAR. CRIA OS BINDPARAM, ENTRE VARIAVEIS E IDS - É PRIVADA POIS NAO TEM PORQUE SER ACESSADA DE FORA DA CLASSE
    private function setParam($statment, $key, $value){
        //O METODO RECEBE O ID E O VALOR DELE E CHAMA O METODO DO PDO BINDPARAM QUE FAZ A LIGACAO
        $statment->bindParam($key, $value);
    }
    //METODO PARA COMANDOS SQL
    //$rawQuery - uma query bruta (comandos SELECT/DELETE/INSERT/...) do bd a ser tratada
    //$params = array() -  que ira receber os dados a serem utilizados pela query
    //ESSE METODO SÓ FAZ O COMANDO NO BD, ELE NAO TRATA O RETORNO - SO EXECUTA A QUERY
    public function query($rawQuery, $params = array()){
        //criar uma variavel local $stmt que só funciona aqui dentro
        //como a classe Sql é extendida da classe PDO os metodos do PDO funcionam aqui dentro
        //criamos a variavel statment $stmt que ira chamar o metodo prepare do PDO, recebendo os comandos do SQL
        $stmt = $this->conn->prepare($rawQuery);
        //chamamos o NOSSO METODO setParams para tratar dos ARGUMENTOS/PARAMETROS que irao junto aos COMANDOS SQL
        $this->setParams($stmt, $params);
        //RETORNAMOS A LINHA DE COMANDO GERADA PARA EXECUTAR NO BD
        $stmt->execute();
        //E RETORNAMOS O OBJETO STMT COM OS DADOS ENVIADOS COMO RESPOSTA DO BD (AS LINHAS DE UM SELECT POR EXEMPLO)
        return $stmt;
    }
    //AGORA VAMOS USAR O METODO QUERY PARA EXECUTAR OS COMANDOS E ENTAO TRATAR O RESULTADO
    //FORCAMOS O RETURN DESSE METODO SER UM ARRAY COM OS :array
    public function select($rawQuery, $params = array()):array{
        //a variavel statment $stmt vai receber o array vindo do NOSSO METODO QUERY, A LINHA PRONTA DO COMANDO SQL - O RETURN DO METODO QUERY (UM OBJETO)
        $stmt = $this->query($rawQuery, $params);
        //chamamos o metodo fatchAll do PDO que faz o trabalho do foreach para nos, retornando o conteudo do resultado contido no $stmt
        //a CONSTANTE SO TRAS OS DADOS SEM OS INDICES
        //E RETORNAMOS TUDO A QUEM CHAMOU ESSA CLASSE
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}