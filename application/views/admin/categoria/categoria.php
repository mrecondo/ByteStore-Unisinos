<div id="<?php echo strtolower($title); ?>">
    <p><?php echo "ID: " . $categoria['id']; ?></p>
    <p><?php echo "Categoria: " . $categoria['categoria']; ?></p>

    <p><?php echo anchor('admin/categoria/edit/' . $categoria['id'], 'Editar'); ?></p>    
</div>