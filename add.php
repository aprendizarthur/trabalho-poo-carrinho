<?php
//iniciando session
session_start();
require ("vendor/autoload.php");
use app\classes\Carrinho;

//sanitizando e armazenando id do produto
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//instanciando o carrinho
$carrinho = new Carrinho;
//adicionando produto do id ao carrinho
$carrinho->adicionarProduto($id);

//removendo produto do carrinho
//$carrinho->removerProduto($id);

//limpar carrinho
//$carrinho->limparCarrinho();

//modificando quantidade do produto
//$carrinho->quantidadeProduto($id, 10);

var_dump($_SESSION['carrinho']);
//depois de ter adicionado o produto, volta para o index
header("Location: index.php");