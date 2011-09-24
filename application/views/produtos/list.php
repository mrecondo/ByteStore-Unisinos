<div id="content">
    <?php foreach ($produtos as $produto) : ?>
    <div class="produto">
        <h2><?php echo $produto->nome; ?></h2>
        <img src="<?php echo base_url(); ?>assets/image/produto/<?php echo $produto->foto;?>" />
        <br />
        R$ <?php echo $produto->valor; ?>
        <br />
        <button value="<?php echo $produto->id;?>">Comprar</button>
    </div>
    <?php endforeach; ?>
</div>
