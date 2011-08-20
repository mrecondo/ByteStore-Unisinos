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
                <label for="categoria">Categoria:</label><br />
            </p>  
            <p>
                <input type="text" readonly="readonly"   id="id" name="id" width="100" size="30" 
                       value=<?php echo $categoria['id']; ?>
                       />   
            </p>  
            <p>
                <input type="text" id="categoria" name="categoria" width="30" size="30" 
                       value=<?php echo $categoria['categoria']; ?>
                       />                    
            </p>           
            <p>
                <input type="submit" value="Salvar"/>                    
            </p>                
        </form>

    </body>
</html>
