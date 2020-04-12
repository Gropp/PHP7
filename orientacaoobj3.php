<?php
class Documento {
    private $numero;
    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        //antes de inserir o cpf ele sera validado
        //como o metodo é estatic voce acessa o mesmo com :: ao inves de ->
        //joga o valor bool em uma variavel resultado
        $resultado = Documento::validarCPF($numero);
        //O TRY CATCH vai tratar o resultado do metodo STATIC validarCPF (true ou false)
        try {
            if($resultado === false) {
                throw new Exception("CPF INFORMADO NÃO É VALIDO!");
            }else{
                $this->numero = $numero; 
            }    
        }catch (Exception $e){
            echo $e->getMessage();
        }       
        /*
        IMPORTANTE: ESSE THROW DO EXERCICIO NAO MOSTRA NADA NA TELA DA ERRO!!! O THROW NAO MANDA A MESAGEM PARA O DOCUMENTO, PRECISA ACESSAR O METODO PARA DAR UM ECHO ENTAO EU COLOQUEI O TRY CATCH PARA MOSTRAR A MENSAGEM
        if ($resultado === false)
        {
            //tratamento de erro atraves da classe Exception do PHP
            throw new Exception("CPF INFORMADO NÃO É VALIDO!");
        } 
        $this->numero = $numero;  
        */
    }
    //IMPORTANTE: METODO ESTATICO
    //usar & para que o tratamento de eliminar mascaras dentro da funcao fique na variavel e assim o efeito nao se perca!
    public static function validarCPF(&$cpf):bool
    {
        //verifica se um numero foi informado
        if (empty($cpf)) return false;
        //elimina possiveis mascaras
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        //verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11)
        {
            return false;
        }
        //verifica se nenhuma das sequencias invalidas abaixo foi digitada. caso afirmativo retorna falso 
        elseif
           ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999')
        {
            return false;
        }
        //calcula os digitos verificadores para validar o cpf informado
        else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }
}
$cpf = new Documento();
$cpf->setNumero("043.519.979-07");
//se o CPF estiver errado o programa da a mensagem de erro e o getNumero volta nulo
if($cpf->getNumero() !== null) var_dump($cpf->getNumero());