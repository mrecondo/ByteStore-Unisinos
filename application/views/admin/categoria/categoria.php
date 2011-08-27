<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
    </head>
    <body>

        <p><?php echo "ID: ". $categoria['id']; ?></p>
        <p><?php echo "Categoria: ". $categoria['categoria']; ?></p>

    <p><?php echo anchor('admin/categoria/edit/' . $categoria['id'], 'Editar'); ?></p>    
</body>
</html>
