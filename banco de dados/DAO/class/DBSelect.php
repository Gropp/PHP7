<?php
//VAI ACESSAR A TABELA TB_USUARIOS CRIADO NO BD E VAI CARREGAR OS ATRIBUTOS
class DBSelect {
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
            $row = $results[0];
            //CHAMAMOS OS SETERS PARA COLOCAR OS VALORES NOS ATRIBUTOS DA CLASSE USUARIO, CARREGA ESSAS VARIAVEIS
            $this->setIdusuario($row['idusuario']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            //CONVERTEMOS A DATA PARA UM FORMATO MAIS AMIGAVEL
            $this->setIDtcadastro(new DateTime($row['dtcadastro']));
        }
    }
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