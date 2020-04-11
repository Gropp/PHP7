<?php
//funcoes recursivas
//cria uma hierarquia de cargos de uma empresa, os cargos e seus subordinados
$hierarquia = array
(array
    (
        'nome_cargo'=>'CEO',
        'subordinados'=>array(
        array
            (
                'nome_cargo'=>'Diretor Comercial',
                'subordinados'=>array(
                array
                    (
                        'nome_cargo'=>'Gerente de Vendas',
                        'subordinados'=>array(
                        array
                            (
                                //FIXME: nao le mais de um nome_cargo
                                'nome_cargo'=>'Supervisor de Vendas PR',
                                'subordinados'=>array(
                                array
                                (
                                    'nome_cargo'=>'Rep 001'   
                                ),
                                array
                                (
                                    'nome_cargo'=>'Rep 002'   
                                ),
                                array
                                (
                                    'nome_cargo'=>'Rep 003'   
                                )
                                )
                            ),
                        array
                            (
                                'nome_cargo'=>'Supervisor de Vendas SC'
                            ),
                        array
                            (
                                'nome_cargo'=>'Supervisor de Vendas RS'
                            )
                        )
                    )
                )   
            ),
        array
            (
                'nome_cargo'=>'Diretor Finaceiro',
                'subordinados'=>array(
                array
                    (
                        'nome_cargo'=>'Gerente de Contas a Pagar',
                        'subordinados'=>array(
                        array
                            (
                                'nome_cargo'=>'Supervisor de Pagamentos'
                            ),
                        array
                            (
                                'nome_cargo'=>'Supervisor de Recebimentos'
                            )    
                        )
                    ),
                array
                    (
                        'nome_cargo'=>'Gerente de Compras',
                        'subordinados'=>array(
                        array
                            (
                                'nome_cargo'=>'Supervisor de Suprimentos',
                                'subordinados'=>array(
                                array
                                    (
                                        //FIXME: nao le mais de um
                                        'nome_cargo'=>'Estoquista'
                                    ),
                                array
                                    (
                                        'nome_cargo'=>'Almoxarife'
                                    )
                                )
                            )
                        )
                    )
                )
            )
        )
    )

);

//funcao que percorre a matriz e mostra os cargos e subordinados
function exibe($cargos){
    //criacao de uma lista nao ordenada em html <ul>
    //inicio
    $html = '<ul>';
    //IMPORTANTE:
    //todas as inclusoes tem que ser array por causa do foreach!!!
    foreach($cargos as $cargo)
    {
        //cria a tag de itens da lista <li> concatena
        $html .= "<li>";
        //concatena os cargos
        $html .= $cargo['nome_cargo'];
        //testa se o cargo tem um subcargo e se nao é vazio
        if(isset($cargo['subordinados']) && count($cargo['subordinados']) > 0)
        {
            //chama a mesma funcao passando a subestrutura subordinados
            $html .= exibe($cargo['subordinados']);
        }
        //fecha a tag dos itens da lista </li> concatena
        $html .= "</li>";
    }
    //fecha a lista </ul> concatena
    $html .= '</ul>';
    return $html;
}
echo exibe($hierarquia);