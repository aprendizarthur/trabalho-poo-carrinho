<?php
//iniciando session
session_start();
require ("vendor/autoload.php");
use app\classes\Carrinho;

//sanitizando e armazenando id do produto
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$quantidade = filter_input(INPUT_GET, 'quantidade', FILTER_SANITIZE_NUMBER_INT);


//instanciando o carrinho
$carrinho = new Carrinho;
//adicionando produto do id ao carrinho
$carrinho->quantidadeProduto($id, $quantidade);

//depois de ter removido o produto, volta para o index
header("Location: carrinho.php");
