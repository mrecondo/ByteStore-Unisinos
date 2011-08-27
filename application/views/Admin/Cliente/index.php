

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $titulo; ?></title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript"> 
            function confirma(id) {
                if(confirm('Deseja excluir o item '+id+'?')) {
                    window.location = 'cliente/delete/'+id;
                } else {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <h1><?php echo $titulo; ?></h1>
        <?php
        $image = array(
            'src' => 'assets/image/admin/add.png',
            'alt' => 'Novo',
            'class' => 'adm_images',
            'width' => '20',
            'height' => '20',
            'title' => 'Novo'
        );
        echo '<p id="menu">';
        echo "<a href='".base_url().'admin/cliente/view/novo'."'>".img($image)."</a> ";
        echo '</p>';
        ?>
        <table border="1" cellpadding="3" cellspacing="0">
            <tr>  
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Fone</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>News</th>
                <th>Ação</th>
            </tr>
            <?php
            foreach ($clientes as $cliente) {
                echo "\t<tr>\n";
                echo "\t\t<td>" . $cliente['id'] . "</td>\n";
                echo "\t\t<td>" . anchor('admin/cliente/view/' . $cliente['id'] . '/' . $cliente['nome'], $cliente['nome']) . "</td>\n";
                echo "\t\t<td>" . $cliente['email'] . "</td>\n";
                echo "\t\t<td>" . $cliente['fone'] . "</td>\n";
                echo "\t\t<td>" . $cliente['cidade'] . "</td>\n";
                echo "\t\t<td>" . $cliente['uf'] . "</td>\n";
                echo "\t\t<td align='center'><input type='checkbox' id='newsletter' disabled='disabled' name='newsletter'";
                if ($cliente['newsletter'] == 1) {
                    echo "checked=\"checked\" value='1'</td>\n";
                } else {
                    echo "value='1'</td>\n";
                }
                echo "\t\t<td>";
                $image = array(
                    'src' => 'assets/image/admin/del.png',
                    'alt' => 'Excluir',
                    'class' => 'adm_images',
                    'width' => '15',
                    'height' => '15',
                    'title' => 'Excluir'
                );
                echo "<a href='#' onclick='confirma(" . $cliente['id'] . ");return false;'>" . img($image) . '</a> ';
                $image = array(
                    'src' => 'assets/image/admin/edit.png',
                    'alt' => 'Excluir',
                    'class' => 'adm_images',
                    'width' => '15',
                    'height' => '15',
                    'title' => 'Excluir'
                );
                echo " <a href='".  site_url('admin/cliente/view/'.$cliente['id'])."' >".img($image)."</a>";
                echo "</td>\n";
                echo "\t</tr>\n";
            }
            ?>
        </table>
        <?php echo $this->pagination->create_links(); ?>

        <?php
        /*
          echo "<pre>";
          print_r($produto);
          echo "</pre>";
         */
        ?>
    </body>
</html>
