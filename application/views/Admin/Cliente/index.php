<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $titulo;?></title>
    </head>
    <body>
        <h1><?php echo $titulo;?></h1>
        <?php echo $this->pagination->create_links();?>
        <table border="1" cellpadding="3" cellspacing="0">
            <tr>  
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Fone</th>
              <th>Cidade</th>
              <th>UF</th>
              <th>Newsletter</th>
              <th>&nbsp;</th>
            </tr>
        <?php
        foreach ($clientes as $cliente) {
         
            echo "<tr>";
            echo "<td>".$cliente['id']."</td>";
            echo "<td>".anchor('admin/cliente/view/'.$cliente['id'].'/'.$cliente['nome'],$cliente['nome'])."</td>";
            echo "<td>".$cliente['email']."</td>";
            echo "<td>".$cliente['fone']."</td>";
            echo "<td>".$cliente['cidade']."</td>";
            echo "<td>".$cliente['uf']."</td>";
            echo "<td>".$cliente['newsletter']."</td>";
            echo "<td>Excluir</td>";
            echo "</tr>";
        }
        ?>
        </table>
        <?php echo $this->pagination->create_links();?>
        
        <?php
        /*
        echo "<pre>";
        print_r($produto);
        echo "</pre>";
        */
        ?>
    </body>
</html>
