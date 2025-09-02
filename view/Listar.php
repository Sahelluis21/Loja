<h2>Produtos</h2>

<?php if (empty($produtos)) : ?>
    <p>Nenhum produto disponível.</p>
<?php else : ?>

    
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Quantidade</th>
        <th>Ação</th>
    </tr>
    <?php foreach ($produtos as $p): ?>
    <tr>
        <td><?= $p->getCodigo(); ?></td>
        <td><?= htmlspecialchars($p->getDescricao()); ?></td>
        <td>R$ <?= number_format($p->getPreco(), 2, ',', '.'); ?></td>
        <td><?= $p->getQtde(); ?></td>
        <td>
            <form action="index.php?acao=adicionarCarrinho" method="post" style="margin:0;">
                <input type="hidden" name="codigo" value="<?= $p->getCodigo(); ?>">
                <input type="number" name="quantidade" min="1" max="<?= $p->getQtde(); ?>" value="1" required>
        </td>
        <td>
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>

<p><a href="index.php?acao=mostrarCarrinho">Ver Carrinho</a></p>
