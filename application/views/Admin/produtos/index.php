<script type="text/javascript">
    $('document').ready(function(){
       $("a.apaga_produto").click(function(){
           
           var id = $(this).attr('id');
           var link = $(this);
           
           if(confirm("O produto será excluído definitivamente. Tem certeza?")) {
                $.post('<?php echo base_url(); ?>admin/produtos/kill',{ 'id': id },
                function(data) {
                    alert(data);
                    if(data.indexOf('sucesso') > 0) {
                        link.parent().parent().remove();
                    }
                }, "html"
                );
                return false;
            } else {
                return false;
            }
           
       });
    });
</script>
<div id="<?php echo strtolower($title); ?>">
    <?php echo anchor('admin/produtos/novo/','Novo produto');?>
    <br />
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
            echo "<td><a href='#' class='apaga_produto' id='".$produto->id."'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
        
    </table>
    <?php echo $this->pagination->create_links(); ?>
</div>