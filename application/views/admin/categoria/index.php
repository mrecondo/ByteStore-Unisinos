<script type="text/javascript">
    function confirma(id) {
        if(confirm('Deseja excluir o item '+id+'?')) {
            window.location = 'delete/'+id;
        } else {
            return false;
        }
    }
</script>
<div id="<?php echo strtolower($title); ?>">
<p>
    <?php echo $this->session->flashdata('erro');?>
</p>
<p>
    <?php echo anchor('admin/categoria/insert/', 'Inserir Nova Categoria'); ?>
</p>

<?php echo $this->pagination->create_links(); ?>
<table border="1" cellpadding="3" cellspacing="0">
    <tr>
        <th>Identificação</th>
        <th>Categoria</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php
    foreach ($categoria as $categoria) {
        echo "<tr>";
        echo "<td>$categoria->id</td>";
        echo "<td>" . anchor('admin/categoria/view/' . $categoria->id, $categoria->categoria) . "</td>";

        echo "<td>" . anchor('admin/categoria/edit/' . $categoria->id, 'Editar') . "</td>";
        echo "<td><a href='#' onclick='confirma(".$categoria->id.");return false;'>Excluir</a></td>";

        echo "</tr>";
    }
    ?>
</table>
<?php echo $this->pagination->create_links(); ?>
</div>