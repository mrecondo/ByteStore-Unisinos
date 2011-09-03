<div id="<?php echo strtolower($title); ?>">
    <?php echo $this->pagination->create_links(); ?>
    <table border="1" cellpadding="3" cellspacing="0">
        <tr>
            <th>Produto</th>
            <th>Categoria</th>
            <th>Estoque</th>
            <th>Valor</th>
            <th>Data cadastro</th>
            <th>&nbsp;</th>
        </tr>
        <?php
        foreach ($produtos as $produto) {
            echo "<tr>";
            echo "<td>" . anchor('admin/produtos/view/' . $produto->id, $produto->nome) . "</td>";
            echo "<td>$produto->categoria</td>";
            echo "<td>$produto->estoque</td>";
            echo "<td>$produto->valor</td>";
            echo "<td>$produto->data</td>";
            echo "<td>Excluir</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php echo $this->pagination->create_links(); ?>
</div>