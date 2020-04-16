<?php
//VAI ACESSAR A TABELA TB_USUARIOS CRIADO NO BD E VAI CARREGAR OS ATRIBUTOS
class DBTbUsuarios {
    //ATRIBUTOS PRIVADOS, QUE NAO PODEM SER ACESSADOS FORA DA CLASSE
    //CRIA UM ATRIBUTO PARA CADA CAPO DA TABELA, COM OS MESMOS NOMES
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;
    //GET(LER)-SET(ATRIBUIR)
    public funcion getIdusuario(){
        return $this->idusuario;
    }
    public funcion setIdusuario($value){
        $this->idusuario = $value;
    }
    public funcion getDeslogin(){
        return $this->deslogin;
    }
    public funcion setDeslogin($value){
        $this->deslogin = $value;
    }
    public funcion getDessenha(){
        return $this->dessenha;
    }
    public funcion setDessenha($value){
        $this->dessenha = $value;
    }
    public funcion getDtcadastro(){
        return $this->dtcadastro;
    }
    public funcion setDtcadastro($value){
        $this->dtcadastro = $value;
    }
    public function setData($data){
        //COMO SEMPRE FAZEMOS ESSA ATRIBUICAO NOS METODOS DENTRO DESSA CLASSE, CRIAMOS UM METODO EXCLUSIVO SO PARA ESSAS ATRIBUICOES E COM ISSO EVITAMOS FICAR DIGITANDO AS MESMAS LINHAS DE CODIGO
        //CHAMAMOS OS SETERS PARA COLOCAR OS VALORES NOS ATRIBUTOS DA CLASSE USUARIO, CARREGA ESSAS VARIAVEIS
        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        //CONVERTEMOS A DATA PARA UM FORMATO MAIS AMIGAVEL
        $this->setIDtcadastro(new DateTime($data['dtcadastro']));
    }
    //METODOS PARA MANIPULACAO DA TABELA TB_USUARIOS NO DB DBPHP7
    //SELECT PELO ID DO USUARIO
    //VAMOS CRIAR UMA CLASSE PARA EXECUTAR UM COMANDO SQL COM UM UNICO ID E CARREGAR (SETERS) OS ATRIBUTOS
    public function loadById($id){
        //CRIA O OBJETO SQL
        $sql = new Sql();
        //CHAMAMOS O METODO SELECT DA CLASSE SQL
        //O RESULTADO, MESMO SENDO UMA LINHA, SERA UM ARRAY DE ARRAY
        //select("comandos SQL","paramentros");
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));
        //TESTAMOS SE O RESULT, resultou em alguma coisa, entao testamos o indice [0] do array existe/tem conteudo, com o isset (true ou false), ou contado o array count
        //if(isset($results[0])) ou
        if(count($results)>0){
            //PEGA O CONTEUDO DO ARRAY DENTRO DO ARRAY RESULTS E COLOCA NO ARRAY DE 1 NIVEL CHAMADO $ROW.
            //$RESULTS[[IDUSUARIO,DESLOGIN,DESSENHA,DTCADASTRO]]
            //$ROW = $RESULTS[0] = [IDUSUARIO,DESLOGIN,DESSENHA,DTCADASTRO]
            #$row = $results[0];
            //CHAMAMOS OS SETERS PARA COLOCAR OS VALORES NOS ATRIBUTOS DA CLASSE USUARIO, CARREGA ESSAS VARIAVEIS
            #$this->setIdusuario($row['idusuario']);
            #$this->setDeslogin($row['deslogin']);
            #$this->setDessenha($row['dessenha']);
            //CONVERTEMOS A DATA PARA UM FORMATO MAIS AMIGAVEL
            #$this->setIDtcadastro(new DateTime($row['dtcadastro']));
            //IMPORTANTE: COMO O CODIGO ACIMA ESTAVA MUITO REPETITIVO, CRIAMOS UM METODO QUE FAZ AS ATRIBUICOES DO $this, ASSIM ECONOMIZAMOS VARIAS REPETICOES DE CODIGO
            $this->setData($results[0]);
        }
    }
    //SELECT GERAL DA TABELA TB_USUARIOS ORDENADO PELO LOGIN
    //IMPORTANTE: USO DE METODO STATIC
    //FAZ UM SELECT SEM WHERE E GERA UMA LISTA DE DADOS COM TODOS OS USUARIOS
    //ESSE METODO PODE SER ESTATICO POIS NAO TRABALHA COM ATRIBUTOS $THIS DENTRO DELE, A VANTAGEM DE UM METODO SER ESTATISCO É QUE ELE NAO PRECISA SER INSTANCIADO NA CHAMADA, VOCE PODE ACESSAR DIRETO O METODO DESTE OBJETO COM ::
    public static function getList(){
        //CRIA A INSTANCIA DA CLASSE SQL
        $sql = new Sql();
        //RETORNA UM SELECT GERAL ORDENADO POR DESLOGIN
        //IMPORTANTE: TESTAR O PONTO E VIRGULA NO FINAL DO COMANDO - É OPCIONAL?
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
    }
    //SELECT PARA LOCALIZAR UM USUARIO PELO LOGIN
    //ESSE METODO TAMBEM NAO TRABALHA COM ATRIBUTOS DIRETAMENTE ($this), ENTAO TAMBEM PODEMOS FAZER ELE SER STATIC
    public static function search($login){
        //O "%$login%" É A MASCARA DO LIKE, PROCURA TUDO QUE TENHA O VALOR DE LOGIN DENTRO DA TABELA NO CAMPO DESLOGIN
        //O METODO SELECT("SQL","PARAMETROS")
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(':SEARCH'=>"%".$login."%"));
    }
    //SELECT PARA AUTENTICACAO DOS USUARIOS
    //OBTER OS DADOS DO USUARIO AUTENTICADO NO SISTEMA
    //COMO VAMOS USAR O $THIS PARA AMARRAR OS GETERS E SETERS, ELA NAO PODE SER STATICA
    public function login($login, $password){
        //CRIA O OBJETO SQL
        $sql = new Sql();
        //CHAMAMOS O METODO SELECT DA CLASSE SQL
        //O RESULTADO, MESMO SENDO UMA LINHA, SERA UM ARRAY DE ARRAY
        //select("comandos SQL","paramentros");
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWD", array(":LOGIN"=>$login, ":PASSWD"=>$password));
        //TESTAMOS SE O RESULT, resultou em alguma coisa, entao testamos o indice [0] do array existe/tem conteudo, com o isset (true ou false), ou contado o array count
        //if(isset($results[0])) ou
        if(count($results)>0){
            //PEGA O CONTEUDO DO ARRAY DENTRO DO ARRAY RESULTS E COLOCA NO ARRAY DE 1 NIVEL CHAMADO $ROW.
            //$RESULTS[[IDUSUARIO,DESLOGIN,DESSENHA,DTCADASTRO]]
            //$ROW = $RESULTS[0] = [IDUSUARIO,DESLOGIN,DESSENHA,DTCADASTRO]
            //AGORA PARA CADA RESULTS[], CHAMAMOS O METODO SETDATA
            $this->setData($results[0]);
        } else {
            //FIXME: SE DER ERRO ESSA LINHA, TEM QUE TRATAR COM TRY/CATCH - ORIENTACAOOBJ3.PHP TEM UM EXEMPLO - DEU ERRO NO LINUX NA ULTIMA VEZ QUE FOI USADO!!!
            throw new Exception("Login e/ou Senha invalidos.");
        }
    }
    //CRIAR UMA FUNCAO INSERT NA TABELA TB_USUARIO
    //ESSE METODO NAO TEM ARGUMENTOS, ENTAO ANTES DE CHAMA-LO É PRECISO FAZER OS SETERS DOS ATRIBUTOS DESLOGIN E DESSENHA NO ARQUIVO DE ORIGEM (QUE CHAMA ESSA CLASSE/METODO)!!!
    //IMPORTANTE:
    //PARA EVITAR ESSE SETERS ANTES DE CHAMAR UM METODO VAMOS CRIAR UM METODO CONSTRUTOR QUE FARA ESSE TRABALHO AQUI DENTRO - LOGO ABAIXO DO INSERT - ISSO FARA COM QUE O METODO INSERT TENHA O LOGIN E A SENHA COMO PARAMETROS OBRIGATORIOS, APESAR DE QUE NA FUNÇÃO INSERT NAO TENHA NADA ENTRE AS ASPAS - NO METODO CONSTRUTOR DELA TEM!!!!!
    public function insert(){
        $sql = new Sql();
        //NESTE EXEMPLO O METODO SELECT VAI CHAMAR UMA STORE PROCEDURE CRIADA NO BD QUE TRARA O ID GERADO NA TABELA
        //O CODIGO PARA A CRIACAO DA PROCEDURE ESTA NO ARQUIVO DE TEXTO PHP7
        //IMPORTANTE:
        //SE O BD FOSSE MSSQL AO INVES DO COMANDO CALL, USARIAMOS O COMANDO EXECUTE
        $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :SENHA)", array(':LOGIN'=>$this->getDeslogin(), ':SENHA'=>$this->getDessenha()));
        if(count($results)>0){
            //PEGA O CONTEUDO DO ARRAY DENTRO DO ARRAY RESULTS E COLOCA NO ARRAY DE 1 NIVEL CHAMADO $ROW.
            //$RESULTS[[IDUSUARIO,DESLOGIN,DESSENHA,DTCADASTRO]]
            //$ROW = $RESULTS[0] = [IDUSUARIO,DESLOGIN,DESSENHA,DTCADASTRO]
            //AGORA PARA CADA RESULTS[], CHAMAMOS O METODO SETDATA
            $this->setData($results[0]);
        }
    }
    //CRIAR UMA FUNCAO UPDATE NA TABELA TB_USUARIO
    //IMPORTANTE:
    //O METODO VAI SIMPLESMENTE EXECUTAR UMA AÇÃO NO BANCO
    public function update($login, $passwd){
        //CARREGA OS ATRIBUTOS DA CLASSE COM OS ARGUMENTOS CHAMANDO OS SETERS
        $this->setDeslogin($login);
        $this->setDessenha($passwd);
        //INSTANCIA A CLASSE SQL CARREGADA NO INDEX.PHP ATRAVES DO CONFIG.PHP COM O AUTOLOAD
        $sql = new Sql();
        //NESTE EXEMPLO O METODO SELECT VAI CHAMAR DIRETAMENTE O METODO QUERY DO PDO PASSANDO OS VALORES GRAVADOS ACIMA NOS ATRIBUTOS COMO PARAMENTROS PARA O INSERT
        $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWD WHERE idusuario = :ID", array(':LOGIN'=>$this->getDeslogin(), ':PASSWD'=>$this->getDessenha(), ':ID'=>$this->getIdusuario()));
        }
    }
    //CRIAR UMA FUNCAO DELETE NA TABELA TB_USUARIO
    //IMPORTANTE:
    //O METODO VAI SIMPLESMENTE EXECUTAR UMA AÇÃO NO BANCO
    public function delete(){
        //INSTANCIA A CLASSE SQL CARREGADA NO INDEX.PHP ATRAVES DO CONFIG.PHP COM O AUTOLOAD
        $sql = new Sql();
        //NESTE EXEMPLO O METODO DELETE VAI CHAMAR DIRETAMENTE O METODO QUERY DO PDO PASSANDO OS VALORES DOS ATRIBUTOS PASSADOS PELA CHAMADO DO SELECT
        $sql->query("DELETE tb_usuarios WHERE idusuario = :ID", array( ':ID'=>$this->getIdusuario()));
        //IMPORTANTE:
        //APOS DESTRUIR O REGISTRO NA BASE DE DADOS PRECISAMOS ZERAR OS VALORES GUARDADOS NOS ATRIBUTOS DA CLASSE - PARA NAO TER UMA MEMORIA DE ALGO QUE JA NAO EXISTE NO CONTEXTO DO PROGRAMA - USAMOS PARA ISSO OS METODOS SETERS CRIADOS
        this->setIdusuario(0);
        this->setDeslogin("");
        this->setDessenha("");
        this->setDtcadastro(new DateTime());
    }
    /////////////////////////////////////////////////////////////////////////////////////
    //          FUNCOES CONSTRUTORAS DESSA CLASSE - EXECUTAM AUTOMATICAMENTE           //
    /////////////////////////////////////////////////////////////////////////////////////

    //IMPORTANTE:
    //METODO CONSTRUTOR PARA SETAR OS ATRIBUTOS DESLOGIN E DESSENHA - E PARA NAO AFETAR AS OUTRAS CHAMADAS DE FUNCAO - NAO TORNANDO OBRIGATORIO OS PARAMETROS PARA OS OUTROS METODOS!!!!!!!!! ESSA FUNCAO ALIMENTA ESSES DOIS ATRIBUTOS AUTOMATICAMENTE
    public function __construct($login = "", $passwd = ""){
        $this->setDeslogin($login);
        $this->setDessenha($passwd);
    }
    //METODO RETORNA JSON - OBJETO - STRING
    //VAMOS CRIAR UMA CLASSE PARA LER OS ATRIBUTOS (GETERS) PREENCHIDOS PELO METODO SETERS DO SELECT - USAREMOS O METODO MAGICO --TOSTRING PARA TRATAR O ARRAY DE RESPOSTA E VAMOS CHAMAR O JSON PARA TRANSFORMAR O OBJETO EM UMA STRING MAIS FACIL DE TRATAR NO FRONT-END
    public function __toString(){
        return json_encode(array(
            //CRIAMOS UM VETOR CARREGANDO OS CAMPOS COM OS ATRIBUTOS DA CLASSE CHAMANDO OS METODOS GETERS DE CADA ATRIBUTO
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()=>format("d/m/Y H:i:s")
        ));
    }
}