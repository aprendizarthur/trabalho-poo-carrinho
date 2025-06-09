<?php
//iniciando session
session_start();
require("vendor/autoload.php");
use app\classes\Carrinho;

$produtos = require 'app/helpers/produto.php';

$produtosCarrinho = (new Carrinho)->produtosCarrinho();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
</head>
<body>
    <div id="container">
        <h3>Carrinho <?php /*contando o nº de produtos no array carrinho*/ echo count($produtosCarrinho)?> | <a href="carrinho.php">Ir para o carrinho</a></h3>
        <ul>
                <?php foreach($produtos as $index => $produto): ?>
                    <li><?php echo $produto['nome']. " | " . number_format($produto['preço'], 2,',','.');?></li>
                    <a href="add.php?id=<?php echo $index ?>">adicionar ao carrinho</a>
                <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>