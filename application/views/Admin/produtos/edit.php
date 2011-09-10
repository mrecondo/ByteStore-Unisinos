<script type="text/javascript">
    $('document').ready(function() {
        $("#apaga_foto").click(function(){
            $.post('<?php echo base_url();?>admin/produtos/apaga_foto',
                { 'id':'<?php echo $produto['id'];?>', 'foto':'<?php echo $produto['foto'];?>' },
                function(data) {
                    alert(data);
                    if(data.indexOf('sucesso') > 0) {
                        $('#div_foto').remove();
                    }
                }, "html"
            );
            return false;
        })
    });
    
</script>
<div id="erro">
    <?php
        echo $this->session->userdata('erro');
        $this->session->unset_userdata('erro');
    ?>
    <?php echo validation_errors(); ?>
</div>
<div id="<?php strtolower($title);?>">
    <?php echo form_open_multipart('admin/produtos/save');?>
    <input type="hidden" name="action" value="edit" />
    <input type="hidden" name="id" value="<?php echo $produto['id'];?>" />
    <p>
        <label for="nome">Nome:</label><br />
        <input type="text" name="nome" value="<?php echo $produto['nome'];?>" />
    </p>
    <p>
        <label for="descricao">Descrição:</label><br />
        <textarea name="descricao"><?php echo $produto['descricao']; ?></textarea>
    </p>
    <p>
        <label for="categoria">Categoria:</label><br />
        <select name="categoria">
        <?php 
            foreach ($categorias as $cat) {
                echo "<option value='{$cat['id']}'".($cat['id']==$produto['categoria_id']?" selected":"").">{$cat['categoria']}</option>\n";
            }
        ?>
        </select>
    </p>
    <p>
        <label for="estoque">Estoque:</label><br />
        <input type="number" name="estoque" value="<?php echo $produto['estoque']; ?>" />
    </p>
    <p>
        <label for="valor">Valor:</label><br />
        <input type="text" name="valor" value="<?php echo $produto['valor']; ?>" />
    </p>
    <p>
        <label for="foto">Foto:</label>
        <input type="file" name="foto" /><br />
        <?php
        if($produto['foto']) {
            echo "<div id='div_foto'>";
            $caminho = base_url()."assets/image/produto/";
            echo "<img src='$caminho{$produto['foto']}' /><br />\n";
            echo "<input type='hidden' name='foto_old' value='{$produto['foto']}' />\n";
            ?>
            <br />
            <a id="apaga_foto" href="#">Excluir?</a>
            </div>
        <?php
        }
        ?>

    </p>
    <p>
        <input type="submit" value="Enviar" />
    </p>
    </form>
</div>