<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
    </head>
    <body>        
        <form name="f_categoria" id="f_cadastro"
              method="post" action=<?php echo $action ?>>
            <p>
                <label for="categoria">Categoria</label><br />
            </p>  
            <?php
            if ($categoria['id'] > 0) {
                echo "<p>";
                echo '<input type="hidden"  id="id" name="id" width="100" size="30"';
                echo 'value="' . $categoria['id'] . '"/>';
                echo "</p>";

            }
                ?>
            <p>
                <label for="nomeCategoria">Nome da Categoria:</label><br />
            </p>  
            <p>
                <input type="text" id="categoria" name="categoria" width="30" size="30"                        
                       <?php if ($categoria['id'] > 0)
                           echo 'value="' . $categoria['categoria'].'"'; ?>
                       />                    
            </p>           
            <p>
                <?php
                if ($categoria['id'] > 0)
                    echo '<input type="submit" value="Salvar"/>';
                else
                    echo '<input type="submit" value="Inserir"/>';
                ?>                   
        </p>                
    </form>

</body>
</html>
