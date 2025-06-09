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
$carrinho->limparCarrinho();

//depois de ter limpado o carrinho, volta para o index
header("Location: index.php");
