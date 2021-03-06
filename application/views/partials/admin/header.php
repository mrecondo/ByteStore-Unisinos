<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin/main.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="https://raw.github.com/malsup/form/master/jquery.form.js" type="text/javascript"></script>        
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8.1/jquery.validate.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="header">
            <h1><?php echo $title; ?></h1>
            <div id="menu">
               <?php     
                echo anchor('administrator', "Home", 'class="itens_menu"');
                echo "\n";
                echo anchor('admin/cliente', "Clientes", 'class="itens_menu"');
                echo "\n";
                echo anchor('admin/produtos', 'Produtos', 'class="itens_menu"');
                echo "\n";
                echo anchor('admin/categoria', 'Categorias', 'class="itens_menu"');
                echo "\n";
                echo anchor('admin/fornecedor', 'Fornecedores', 'class="itens_menu"');
                echo "\n";
                echo anchor('admin/pedido', 'Pedidos', 'class="itens_menu"');
                echo "\n";
                echo anchor('auth/user', 'Usuarios', 'class="itens_menu"');
                echo "\n";
                echo anchor('auth/logout', 'Sair', 'class="itens_menu"');
                ?>
            </div>
        </div>
        <div id="conteudo" >
