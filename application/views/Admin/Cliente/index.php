
        <script type="text/javascript"> 
            function confirma(id) {
                if(confirm('Deseja excluir o item '+id+'?')) {
                    window.location = 'cliente/delete/'+id;
                } else {
                    return false;
                }
            }
            function confirmaAtiva(id) {
                if(confirm('Deseja ativar o item '+id+'?')) {
                    window.location = 'cliente/ativa/'+id;
                } else {
                    return false;
                }
            }
        </script>
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
                if($cliente['block']==0){
                $image = array(
                    'src' => 'assets/image/admin/del.png',
                    'alt' => 'Bloquear',
                    'class' => 'adm_images',
                    'width' => '15',
                    'height' => '15',
                    'title' => 'Bloquear'                    
                );
                echo "<a href='#' onclick='confirma(" . $cliente['id'] . ");return false;'>" . img($image) . '</a> ';
                }else{
                $image = array(
                    'src' => 'assets/image/admin/visto.png',
                    'alt' => 'Ativar',
                    'class' => 'adm_images',
                    'width' => '15',
                    'height' => '15',
                    'title' => 'Ativar'
                );
                echo "<a href='#' onclick='confirmaAtiva(" . $cliente['id'] . ");return false;'>" . img($image) . '</a> ';
                }
                
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

       