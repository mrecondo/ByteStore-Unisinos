<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
    </head>
    <body>
         <h1><?php echo $titulo ?></h1>

         <p>
         <?php echo anchor('admin/categoria/insert/','Inserir Nova Categoria'); ?>
         </p>
         
        <?php echo $this->pagination->create_links();?>
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
            echo "<td>".anchor('admin/categoria/view/'.$categoria->id,$categoria->categoria)."</td>";
            
            echo "<td>".anchor('admin/categoria/edit/' . $categoria->id, 'Editar')."</td>";           
            echo "<td>".anchor('admin/categoria/delete/' . $categoria->id, 'Excluir')."</td>";
            
            echo "</tr>";
        }
        ?>
        </table>
        <?php echo $this->pagination->create_links();?>
              
    </body>
</html>
