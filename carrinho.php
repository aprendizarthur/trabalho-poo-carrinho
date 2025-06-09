<?php

//iniciando session
session_start();
require("vendor/autoload.php");
use app\classes\Carrinho;
use app\classes\ProdutosCarrinho;

$produtosCarrinho = new ProdutosCarrinho(new Carrinho);
$produtos = $produtosCarrinho->produtos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
</head>
<body>
    <div id="container">
        <h2>Carrinho : <a href="index.php">Página Inicial</a> | <a href="clear.php">Limpar carrinho</a></h2>
        <hr>

    <?php if(count($produtos['produtos']) <= 0): ?>
        <h3>Nenhum produto no carrinho</h3>
    <?php else: ?>
        <ul>
            <?php foreach($produtos['produtos'] as $produto): ?>
                <li class="produtos-carrinho">
                    <?php echo $produto['produto'] ?>
                    <form action="quantidade.php" method="GET">
                        <input type="text" name="quantidade" value="<?php echo $produto['quantidade'];?>">
                        <input type="hidden" name="id" value="<?php echo $produto['id']?>">
                    </form><?php echo $produto['quantidade'];?> x R$ <?php echo number_format($produto['preco'],2,",",".");?>  = <?php echo number_format($produto['subtotal'],2,",",".");?>
                    <a href="remove.php?id=<?php echo $produto['id'];?>">remover produto</a>
                </li>
            <?php endforeach ?>
        </ul>

        <div class="total-carrinho">
                <h3><?php echo "Total: ".number_format($produtos['total'],2,",","."); ?></h3>
        </div>
    <?php endif ?>    
    </div>
</body>
</html>