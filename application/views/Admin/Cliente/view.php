<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<script type="text/javascript">    
    $(document).ready(function() {         
        var options = { 
            beforeSubmit: function(){    
                $("#formulario").validate({
                    rules:{
                        nome:{
                            required: true, minlength: 5
                        },
                        email:{
                            required: true, email: true
                        },
                        fone:{
                            required: true, minlength: 3
                        },
                        senha:{
                            required: true, minlength: 3
                        },
                        conf_senha:{
                            required: true, minlength: 3
                        },
                        endereco_num:{
                            required: true, minlength: 3
                        },
                        endereco:{
                            required: true, minlength: 3
                        },
                        cidade:{
                            required: true, minlength: 3
                        },
                        cpf:{
                            required: true, minlength: 3
                        }
                    },
                    messages:{
                        nome:{
                            required: "Digite o seu nome",
                            minLength: "O seu nome deve conter, no mínimo, 2 caracteres"
                        },
                        email:{
                            required: "Digite o seu e-mail para contato",
                            email: "Digite um e-mail válido"
                        },
                        fone:{
                            required: "Digite seu telefone",
                            minLength: "Telefone informado muito pequeno"
                        },
                        senha:{
                            required: "Digite sua Senha",
                            minLength: "Senha informada muita pequena"
                        },
                        conf_senha:{
                            required: "Confirme sua Senha",
                            minLength: "Senha informada muita pequena"
                        },
                        endereco:{
                            required: "Digite seu endereço",
                            minLength: "Endereço informado muito pequeno"
                        },
                        endereco_num:{
                            required: "Digite o Nº",
                            minLength: "Numero informado muito pequeno"
                        },                
                        cidade:{
                            required: "Digite sua Cidade",
                            minLength: "Cidade informada tem que ter minimo 3 caracteres"
                        },
                        cpf:{                    
                            required: "Digite seu CPF",
                            minLength: "Telefone informado muito pequeno"
                        }
                    }
                });        
                if(!($("#formulario").valid())){
                    return false;
                }
            },
            target: '#status', 
            success: function(){
                alert('Cliente adicionado com sucesso');
                window.location = '<?php echo base_url(); ?>admin/cliente/'
            }
        };
        $('#formulario').submit(function() { 
            $(this).ajaxSubmit(options); 
            return false; 
        }); 
    }); 
    
</script>
<form method="post" action="<?php echo site_url("/admin/cliente/$acao"); ?>" name="formulario" id="formulario">
    <p> 
        <?php echo (isset($cliente)) ? "Edição do cliente" : "Novo Cliente"; ?>
        <input type="hidden" name="id" <?php echo ($cliente['id'] != '' ? "value='" . $cliente['id'] . "'" : "value='0'"); ?> />
    </p> 
    <p> 
        <label for='nome'>Nome: </label> 
        <input type='text' id='nome' name='nome' size='30' value="<?php echo $cliente['nome'] ?>"/> 
    </p> 

    <p> 
        <label for='email'>Email: </label> 
        <input type='text' id='email' name='email' size='30' value="<?php echo $cliente['email'] ?>"/> 
    </p> 

    <p> 
        <label for='data_cadastro'>Data cadastro: </label> 
        <input type='text' id='data_cadastro' name='data_cadastro' size='15' value="<?php echo (isset($cliente)) ? $cliente['data_cadastro'] : date('d/m/Y') ?>" disabled="disabled"/> 
    </p> 

    <p> 
        <label for='fone'>Telefone: </label> 
        <input type='text' id='fone' name='fone' size='10' value="<?php echo $cliente['fone'] ?>"/> 
    </p> 

    <p> 
        <label for='senha'>Senha: </label> 
        <input type='password' id='senha' name='senha' size='10' value="<?php echo $cliente['senha'] ?>"/> 
    </p> 
    <p> 
        <label for='conf_senha'>Confirma Senha: </label> 
        <input type='password' id='conf_senha' name='conf_senha' size='10' value="<?php echo $cliente['senha'] ?>"/> 
    </p> 

    <p> 
        <label for='endereco'>Endereço: </label> 
        <input type='text' id='endereco' name='endereco' size='30' value="<?php echo $cliente['endereco'] ?>"/> 
        <label for='endereco_num'>Nº: </label> 
        <input type='text' id='endereco_num' name='endereco_num' size='3' value="<?php echo $cliente['endereco_num'] ?>"/> 
    </p> 

    <p> 
        <label for='endereco_comp'>Complemento: </label> 
        <input type='text' id='endereco_comp' name='endereco_comp' size='10' value="<?php echo $cliente['endereco_comp'] ?>"/> 
    </p> 

    <p> 
        <label for='cidade'>Cidade: </label> 
        <input type='text' id='cidade' name='cidade' size='15'value="<?php echo $cliente['cidade'] ?>"/> 
    </p> 

    <p> 
        <label for='uf'>UF: </label> 
        <input type='text' id='uf' name='uf' size='1'value="<?php echo $cliente['uf'] ?>"/> 
        <label for='cep'>CEP: </label> 
        <input type='text' id='cep' name='cep' size='10'value="<?php echo $cliente['cep'] ?>"/> 
    </p>

    <p> 
        <label for='cpf'>CPF: </label> 
        <input type='text' id='cpf' name='cpf' size='10'value="<?php echo $cliente['cpf'] ?>"/> 
        <label for='rg'>RG: </label> 
        <input type='text' id='rg' name='rg' size='10'value="<?php echo $cliente['rg'] ?>"/> 
    </p> 

    <p> 
        <label for='nascimento'>Nascimento: </label> 
        <input type='text' id='nascimento' name='nascimento' size='15'value="<?php echo $cliente['nascimento'] ?>"/> 
    </p> 

    <p> 
        <label for='newsletter'>Newsletter: </label> 
        <input type='checkbox' id='newsletter' name='newsletter' 
        <?php
        if (isset($cliente)) {
            if ($cliente['newsletter'] == 1) {
                echo "checked=\"checked\" value='1'";
            } else {
                echo "value='1'";
            }
        } else {
            echo "checked=\"checked\" value='1'";
        }
        ?>/> 
    </p>
    <p>                
    <div id="status"></div>
    <input type="submit" value="Salvar" />
    <input type="button" value="Voltar" onclick="window.location = '<?php echo base_url() ?>admin/cliente/lista'" />
</p>
</form>