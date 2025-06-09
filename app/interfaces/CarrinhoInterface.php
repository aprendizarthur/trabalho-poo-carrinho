<?php

namespace app\interfaces;

interface CarrinhoInterface
{
   public function adicionarProduto($produto); 
   public function removerProduto($produto); 
   public function quantidadeProduto($produto, $quantidade);
   public function limparCarrinho();  
   public function produtosCarrinho();
}