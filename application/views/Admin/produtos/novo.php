<div id="erro">
    <?php
        echo $this->session->userdata('erro');
        $this->session->unset_userdata('erro');
    ?>
    <?php echo validation_errors(); ?>
</div>
<div id="<?php strtolower($title);?>">
    <?php echo form_open_multipart('admin/produtos/save');?>
    <input type="hidden" name="action" value="new" />
    <p>
        <label for="nome">Nome:</label><br />
        <input type="text" name="nome" value="<?php echo set_value('nome'); ?>" />
    </p>
    <p>
        <label for="descricao">Descrição:</label><br />
        <textarea name="descricao"><?php echo set_value('descricao'); ?></textarea>
    </p>
    <p>
        <label for="categoria">Categoria:</label><br />
        <select name="categoria">
        <?php 
            foreach ($categorias as $cat) {
                echo "<option value='{$cat['id']}'>{$cat['categoria']}</option>\n";
            }
        ?>
        </select>
    </p>
    <p>
        <label for="estoque">Estoque:</label><br />
        <input type="number" name="estoque" value="<?php echo set_value('estoque'); ?>" />
    </p>
    <p>
        <label for="valor">Valor:</label><br />
        <input type="text" name="valor" value="<?php echo set_value('valor'); ?>" />
    </p>
    <p>
        <label for="foto">Foto:</label>
        <input type="file" name="foto" value="<?php echo set_value('foto'); ?>" /><br />
    </p>
    <p>
        <input type="submit" value="Enviar" />
    </p>
    </form>
</div>