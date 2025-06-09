<?php

namespace app\classes;

use app\interfaces\CarrinhoInterface;

class Carrinho implements CarrinhoInterface
{
    public function adicionarProduto($produto){
        //criando array na session p/ armazenar produtos
        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'] = [];
        }
 
        //se o produto nao estiver no carrinho, adiciona um, caso já estiver incrementa um em quantidade
        (!isset($_SESSION['carrinho'][$produto])) ? $_SESSION['carrinho'][$produto] = 1 : $_SESSION['carrinho'][$produto] += 1;
    } 
   
    public function removerProduto($produto){
        if(isset($_SESSION['carrinho'][$produto])){
            unset($_SESSION['carrinho'][$produto]);
        }
    } 
    
    public function quantidadeProduto($produto, $quantidade){
        if(isset($_SESSION['carrinho'][$produto])){
            if($quantidade === 0 || $quantidade === ''){
                $this->removerProduto($produto);
                return;
            }

            $_SESSION['carrinho'][$produto] = $quantidade;
        }
    }
    
    public function limparCarrinho(){
        if(isset($_SESSION['carrinho'])){
            unset($_SESSION['carrinho']);
        }
    }  
    
    public function produtosCarrinho(){
        //se tivermos produtos, retorna todos num array
        if(isset($_SESSION['carrinho'])){
            return $_SESSION['carrinho'];
        } else { return [];}
    }
}