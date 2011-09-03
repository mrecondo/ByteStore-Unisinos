<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="menu">
            <?php 
                echo "<a href='".base_url().'admin/cliente'."'><li>Clientes</li></a>\n";
                echo "\t<a href='".base_url().'admin/produto'."'><li>Produto</li></a>\n";
                echo "\t<a href='".base_url().'admin/categoria'."'><li>Categorias</li>\n";
                echo "\t<a href='".base_url().'admin/user'."'><li>Usuarios</li></a>\n";
                echo "\t<a href='".base_url().'admin/fornecedor'."'><li>Fornecedores</li></a>\n";
            ?>
        </div>
    </body>
</html>
