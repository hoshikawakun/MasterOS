<script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/funcoes.js"></script>
<style>
/* Hiding the checkbox, but allowing it to be focused */
.badgebox {
    opacity: 0;
}

.badgebox+.badge {
    /* Move the check mark away when unchecked */
    text-indent: -999999px;
    /* Makes the badge's width stay the same checked and unchecked */
    width: 27px;
}

.badgebox:focus+.badge {
    /* Set something to make the badge looks focused */
    /* This really depends on the application, in my case it was: */
    /* Adding a light border */
    box-shadow: inset 0px 0px 0px;
    /* Taking the difference out of the padding */
}

.badgebox:checked+.badge {
    /* Move the check mark back when checked */
    text-indent: 0;
}
</style>

<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Editar Cliente</h5>
</div>
<div class="widget_box_3">
<!-- Borda Geral -->
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#home">Informações Pessoais</a></li>
<li><a data-toggle="tab" href="#menu2">Endereço</a></li>
</ul>

<form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal">
<div class="nopadding tab-content">
<?php if ($custom_error != '') {
	echo '<div class="alert alert-danger">' . $custom_error . '</div>'; } ?>

<!-- Menu Gerais -->
<div id="home" class="tab-pane fade in active">
                            <div class="control_group_up">
                                <label for="documento" class="control-label">CPF/CNPJ</label>
                                <div class="controls">
                                    <input id="documento" class="cpfcnpj" type="text" name="documento"
                                        value="<?php echo $result->documento; ?>" />
                                    <button id="buscar_info_cnpj" class="btn btn-xs" type="button">Buscar Informações
                                        (CNPJ)
                                    </button>
                                </div>
                            </div>
                            <div class="control_group_up">
                                <?php echo form_hidden('idClientes', $result->idClientes) ?>
                                <label for="nomeCliente" class="control-label">Nome/Razão Social<span
                                        class="required">*</span></label>
                                <div class="controls">
                                    <input id="nomeCliente" type="text" name="nomeCliente"
                                        value="<?php echo $result->nomeCliente; ?>" />
                                </div>
                            </div>
                            
                            <div class="control_group_up">
                                <label for="telefone" class="control-label">Telefone<span
                                        class="required">*</span></label>
                                <div class="controls">
                                    <input id="telefone" class="telefone1" type="text" name="telefone"
                                        value="<?php echo $result->telefone; ?>" />
                                        <span class="help-inline">Nº WhatsApp</span>
                                </div>
                            </div>
                            <div class="control_group_up">
                                <label for="celular" class="control-label">Telefone 2</label>
                                <div class="controls">
                                    <input id="celular" class="telefone1" type="text" name="celular"
                                        value="<?php echo $result->celular; ?>" />
                                </div>
                            </div>
                            <div class="control_group_up">
                                <label for="email" class="control-label">Email</label>
                                <div class="controls">
                                    <input id="email" type="text" name="email" value="<?php echo $result->email; ?>" />
                                </div>
                            </div>
                            
                            <!--
<div class="control_group_up">
                                <label for="email" class="control-label">Email<span class="required">*</span></label>
                                <?php function gerar_email($tamanho, $maiusculas, $minusculas, $numeros, $simbolos)
{
    $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
  $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
  $nu = "0123456789"; // $nu contem os números
  $si = "!@#$%¨&*()_+="; // $si contem os símbolos

  if ($maiusculas) {
      // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $email
      $email .= str_shuffle($ma);
  }

    if ($minusculas) {
        // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $email
        $email .= str_shuffle($mi);
    }

    if ($numeros) {
        // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $email
        $email .= str_shuffle($nu);
    }

    if ($simbolos) {
        // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $email
        $email .= str_shuffle($si);
    }

    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return substr(str_shuffle($email), 0, $tamanho);
}
?>
                                <div class="controls">

                                    <input id="email" type="text" name="email"
                                        value="<?php echo gerar_email(15, false, true, false, false); ?><?php echo $configuration['masteros_0'] ?>" />
                                </div>
                            </div>
                            -->
                            
                            <div class="control_group_up">
                                <label for="senha" class="control-label">Senha<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="senha" class="senha" type="text" name="senha"
                                        value="<?php echo $result->senha; ?>" />
                                </div>
                            </div>
                            
                            <!--
                    <div class="control_group_up">
                    <label for="senha" class="control-label">Senha<span class="required">*</span></label>
					<?php function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos)
{
    $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
  $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
  $nu = "0123456789"; // $nu contem os números
  $si = "!@#$%¨&*()_+="; // $si contem os símbolos

  if ($maiusculas) {
      // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
      $senha .= str_shuffle($ma);
  }

    if ($minusculas) {
        // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($mi);
    }

    if ($numeros) {
        // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($nu);
    }

    if ($simbolos) {
        // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($si);
    }

    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return substr(str_shuffle($senha), 0, $tamanho);
}
?>
                        <div class="controls">
                        
                            <input id="senha" class="senha" type="text" name="senha" value="<?php echo gerar_senha(12, true, true, true, false); ?>" />
                      </div>
                  </div>
                  -->

                            <div class="control_group_up">
                                <label class="control_label">Tipo de Cliente</label>
                                <div class="controls">
                                    <label for="fornecedor" class="btn btn-default" style="width:194px; text-align:left">Fornecedor
                                    <input type="checkbox" id="fornecedor" name="fornecedor" style="text-align:right" class="badgebox" value="1" <?= ($result->fornecedor == 1) ? 'checked' : '' ?> />
                                    <span class="badge" style="text-align:center">&check;</span>
                                    </label>
                                </div>
                            </div>

<div class="form_actions" align="center">
<a title="Voltar" class="button_mini btn btn-warning" href="<?php echo site_url() ?>/clientes"><span class="button_icon"><i class="fas fa-undo-alt"></i></span> <span class="button_text">Voltar</span></a>
<button type="submit" class="button_mini btn btn-primary" style="max-width: 160px"><span class="button_icon"><i class="fas fa-sync-alt"></i></span><span class="button_text">Atualizar</span></button>
</div>
</div>
<!-- Fim Menu Gerais -->

<!-- Menu Endereços -->
<div id="menu2" class="tab-pane fade">
                            <div class="control_group_up" class="control-label">
                                <label for="cep" class="control-label">CEP<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="cep" type="text" name="cep" value="<?php echo $result->cep; ?>" />
                                </div>
                            </div>
                            <div class="control_group_up" class="control-label">
                                <label for="rua" class="control-label">Rua</label>
                                <div class="controls">
                                    <input id="rua" type="text" name="rua" value="<?php echo $result->rua; ?>" />
                                </div>
                            </div>
                            <div class="control_group_up">
                                <label for="numero" class="control-label">Número</label>
                                <div class="controls">
                                    <input id="numero" type="text" name="numero"
                                        value="<?php echo $result->numero; ?>" />
                                </div>
                            </div>
                            <div class="control_group_up">
                                <label for="complemento" class="control-label">Complemento</label>
                                <div class="controls">
                                    <input id="complemento" type="text" name="complemento"
                                        value="<?php echo $result->complemento; ?>" />
                                </div>
                            </div>
                            <div class="control_group_up" class="control-label">
                                <label for="bairro" class="control-label">Bairro</label>
                                <div class="controls">
                                    <input id="bairro" type="text" name="bairro"
                                        value="<?php echo $result->bairro; ?>" />
                                </div>
                            </div>
                            <div class="control_group_up" class="control-label">
                                <label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="cidade" type="text" name="cidade"
                                        value="<?php echo $result->cidade; ?>" />
                                </div>
                            </div>
                            <div class="control_group_up" class="control-label">
                                <label for="estado" class="control-label">Estado<span class="required">*</span></label>
                                <div class="controls">
                                    <select id="estado" name="estado">
                                        <option value="">Selecione...</option>
                                    </select>
                                </div>
                            </div>

<div class="form_actions" align="center">
<a title="Voltar" class="button_mini btn btn-warning" href="<?php echo site_url() ?>/clientes"><span class="button_icon"><i class="fas fa-undo-alt"></i></span> <span class="button_text">Voltar</span></a>
<button type="submit" class="button_mini btn btn-primary" style="max-width: 160px"><span class="button_icon"><i class="fas fa-sync-alt"></i></span><span class="button_text">Atualizar</span></button>
</div>
</div>
<!-- Fim do Menu Endereços -->

</div>
</form>

</div>
</div>
</div>


<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $.getJSON('<?php echo base_url() ?>assets/json/estados.json', function(data) {
        for (i in data.estados) {
            $('#estado').append(new Option(data.estados[i].nome, data.estados[i].sigla));
            var curState = '<?php echo $result->estado; ?>';
            if (curState) {
                $("#estado option[value=" + curState + "]").prop("selected", true);
            }
        }
    });
    $('#formCliente').validate({
        rules: {
			nomeCliente: {
                required: true
            },
            documento: {
                required: true
            },
            telefone: {
                required: true
            },
            senha: {
                required: true
            },
            email: {
                required: true
            },
            cidade: {
                required: true
            },
            estado: {
                required: true
            },
            cep: {
                required: true
            },
        },
        messages: {
            nomeCliente: {
                required: 'Campo Requerido.'
            },
            documento: {
                required: 'Campo Requerido.'
            },
            telefone: {
                required: 'Campo Requerido.'
            },
            senha: {
                required: 'Campo Requerido.'
            },
            email: {
                required: 'Campo Requerido.'
            },
            cidade: {
                required: 'Campo Requerido.'
            },
            estado: {
                required: 'Campo Requerido.'
            },
            cep: {
                required: 'Campo Requerido.'
            },
        },

        errorClass: "help-inline",
        errorElement: "span",
        highlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });
});
</script>