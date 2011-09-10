<div id="<?php echo strtolower($title); ?>">
<h1><?php echo $produto['nome'];?></h1>
<p><?php echo $produto['descricao'];?></p>
<p><?php echo $categoria['categoria'];?></p>
<p><?php echo anchor('admin/produtos/edit/'.$produto['id'], 'Editar');?></p>
</div>