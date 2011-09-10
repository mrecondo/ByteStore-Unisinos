<div id="<?php echo strtolower($title); ?>">
<h1><?php echo $produto['nome'];?></h1>
<p>
    <?php
    if (isset($produto['foto'])) {
        $caminho = base_url()."/assets/image/produto/";
        echo "<img src='$caminho{$produto['foto']}' />";
    }
    ?>
</p>
<p><?php echo $produto['descricao'];?></p>
<p><?php echo $categoria['categoria'];?></p>
<p>Estoque: <?php echo $produto['estoque'];?></p>
<p>Valor: R$ <?php echo $produto['valor'];?></p>
<p><?php echo anchor('admin/produtos/edit/'.$produto['id'], 'Editar');?></p>
</div>