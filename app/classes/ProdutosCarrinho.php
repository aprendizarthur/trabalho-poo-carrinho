<?php

namespace app\classes;

use app\interfaces\CarrinhoInterface;

class ProdutosCarrinho
{
    //estou esperando como parâmetro um objeto que implemente carrinhointerface
    public function __construct(private CarrinhoInterface $carrinhoInterface){

    }

    //método que vai associar os id's de produto no carrinho com os seus dados (nome e preço) para exibir ao usuário
    public function produtos(){
        //pegando os produtos do carrinho passado de parâmetro
        $produtosCarrinho = $this->carrinhoInterface->produtosCarrinho();
        //pegando
        $produtosDatabase = require 'app/helpers/produto.php';
    
        $produtos = [];
        $total = 0;

        foreach($produtosCarrinho as $produtoID => $quantidade){
            $produto = $produtosDatabase[$produtoID];
            $produtos[] = [
                'id' => $produtoID,
                'produto' => $produto['nome'],
                'preco' => $produto['preço'],
                'quantidade' => $quantidade,
                'subtotal' => $quantidade * $produto['preço']
            ];
            $total += $quantidade * $produto['preço'];
        }

        return [
            'produtos' => $produtos,
            'total' => $total
        ];
    }
}