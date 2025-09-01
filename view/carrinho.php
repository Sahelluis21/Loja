<h2>Meu Carrinho</h2>

<?php if (empty($carrinho)) : ?>
    <p>Seu carrinho está vazio.</p>
<?php else : ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço unitário</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($carrinho as $codigo => $item) :
                $subtotal = $item['preco'] * $item['qtde'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['descricao']); ?></td>
                    <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                    <td><?php echo $item['qtde']; ?></td>
                    <td>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                    <td>
                        <a href="index.php?acao=removerCarrinho&codigo=<?php echo $codigo; ?>">Remover</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                <td colspan="2"><strong>R$ <?php echo number_format($total, 2, ',', '.'); ?></strong></td>
            </tr>
        </tfoot>
    </table>
<?php endif; ?>

<p><a href="index.php?acao=listar">Continuar comprando</a></p>
