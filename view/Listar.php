<h2>Produtos</h2>
<table border="1">
    <tr>
        <th>Codigo</th><th>Nome</th><th>Preço</th><th>Quantidade</th>
    </tr>
    <?php foreach ($produto as $c): ?>
    <tr>
        <td><?= $c->getcodigo() ?></td>
        <td><?= $c->getdescricao() ?></td>
        <td><?= $c->getpreco() ?></td>
        <td><?= $c->getqtde() ?></td>
        <td>
            <a href="index.php?acao=formAlterar&id=<?= $c->getId() ?>">Editar</a>
            <a href="index.php?acao=remover&id=<?= $c->getId() ?>" 
               onclick="return confirm('Tem certeza que deseja remover?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
