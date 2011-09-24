<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo "$titulo"; ?></title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                show_cart();
                
                $('button').click(function(){
                    id = $(this).val();
                    $.get("<?php echo base_url(); ?>/cart/compra", {prod_id: id},
                    function(data){
                        if(data.indexOf('erro') >0) {
                            alert('Desculpe. Ocorreu um erro ao processar sua compra.'+data);
                            return false;
                        } else {
                            show_cart();
                        }
                    });
                });
                
                $('#purge').click(function(){
                    $.get("<?php echo base_url(); ?>/cart/purge",
                    function(){
                        show_cart();
                        return false;
                    });
                });
                
            });
            
            
            
            function show_cart() {
                $.get("<?php echo base_url(); ?>/cart/resumo",
                function(data){
                    $('#cart').html(data);
                });
            }
        </script>
    </head>
    <body>
        <div id="header">
            <h1><?php echo "$titulo"; ?></h1>
        </div>

