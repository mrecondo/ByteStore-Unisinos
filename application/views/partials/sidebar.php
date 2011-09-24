<div id="sidebar">
    <select id="categoria">
        <option value="">Categorias</option>
        <?php foreach ($categorias as $cat) :?>
        <option value="<?php echo $cat['id'];?>"><?php echo $cat['categoria'];?></option>
        <?php endforeach;?>
    </select>
    <br /><br />
    Seu carrinho:
    <div id="cart">
        
        <br />&nbsp;
    </div>
    <a href="<?php echo base_url();?>cart/">Ver carrinho</a><br />
    <a href="#" id="purge">Esvaziar carrinho</a>
</div>