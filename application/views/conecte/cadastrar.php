<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro de Cliente - <?php echo $this->config->item('app_name') ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo $this->config->item('app_name') . ' - ' . $this->config->item('app_subname') ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-media.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/funcoes.js"></script>
</head>

<body style="position: relative; min-height: 100vh;"> <!-- Defina o estilo do body -->
    <div class="row-fluid" style="margin-top:0">
        <div class="span6 offset3">

            <div class="modal_title_0">
                <h5><i class="fas fa-user-cog"></i> Cadastre-se no sistema</h5>
            </div>

            <div class="widget_content_0">
                <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal">

<div class="control_group_up">
<label for="nomeCliente" class="control-label">Nome<span class="required">*</span></label>
<div class="controls">
<input id="nomeCliente" type="text" name="nomeCliente" value="<?php echo set_value('nomeCliente'); ?>" />
</div>
</div>

<div class="control_group_up">
<?php if (isset($custom_error) && $custom_error != '') {
    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
} ?>
<label for="documento" class="control-label">CPF/CNPJ<span class="required">*</span></label>
<div class="controls">
<input id="documento" class="cpfcnpj" type="text" name="documento" value="<?php echo set_value('documento'); ?>" />
<button id="buscar_info_cnpj" class="btn btn-xs" type="button"><i class="fas fa-search"></i></button>
</div>
</div>

<div class="control_group_up">
<label for="telefone" class="control-label">Telefone<span class="required">*</span></label>
<div class="controls">
<input id="telefone" class="telefone1" type="text" name="telefone" value="<?php echo set_value('telefone'); ?>" />
<span class="help-inline">Nº WhatsApp</span>
</div>
</div>

<div class="control_group_up">
<label for="celular" class="control-label">Telefone 2</label>
<div class="controls">
<input id="celular" class="telefone1" type="text" name="celular" value="<?php echo set_value('celular'); ?>" />
</div>
</div>

<div class="control_group_up">
<label for="email" class="control-label">Email<span class="required">*</span></label>
<div class="controls">
<input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>" />
</div>
</div>

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
<input id="senha" class="senha" type="password" name="senha" value="<?php echo gerar_senha(12, true, true, true, false); ?>" />
</div>
</div>

<div class="control_group_up" class="control-label">
<label for="cep" class="control-label">CEP<span class="required">*</span></label>
<div class="controls">
<input id="cep" type="text" name="cep" value="<?php echo set_value('cep'); ?>" />
</div>
</div>


<div class="control_group_up" class="control-label">
<label for="rua" class="control-label">Rua<span class="required">*</span></label>
<div class="controls">
<input id="rua" type="text" name="rua" value="<?php echo set_value('rua'); ?>" />
</div>
</div>

<div class="control_group_up">
<label for="numero" class="control-label">Número<span class="required">*</span></label>
<div class="controls">
<input id="numero" type="text" name="numero" value="<?php echo set_value('numero'); ?>" />
</div>
</div>

<div class="control_group_up">
<label for="complemento" class="control-label">Complemento</label>
<div class="controls">
<input id="complemento" type="text" name="complemento" value="<?php echo set_value('complemento'); ?>" />
</div>
</div>

<div class="control_group_up" class="control-label">
<label for="bairro" class="control-label">Bairro<span class="required">*</span></label>
<div class="controls">
<input id="bairro" type="text" name="bairro" value="<?php echo set_value('bairro'); ?>" />
</div>
</div>

<div class="control_group_up" class="control-label">
<label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
<div class="controls">
<input id="cidade" type="text" name="cidade" value="<?php echo set_value('cidade'); ?>" />
</div>
</div>

<div class="control_group_up" class="control-label">
<label for="estado" class="control-label">Estado<span class="required">*</span></label>
<div class="controls">
<input id="estado" type="text" name="estado" value="<?php echo set_value('estado'); ?>" />
</div>
</div>

<button type="submit" class="button_mini btn btn-mini btn-primary"><span class="button_icon"><i class='fas fa-plus-circle' ></i></span> <span class="button_text">Cadastrar</span></a></button>
<a title="Voltar" class="button_mini btn btn-warning" href="<?php echo base_url() ?>index.php/conect"><span class="button_icon"><i class="fas fa-lock"></i></span> <span class="button_text">Acessar</span></a>
</div>

</form>
</div>
</div>
</div>
</body>

<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
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
                    email: {
                        required: true
                    },
                    rua: {
                        required: true
                    },
                    numero: {
                        required: true
                    },
                    bairro: {
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
                    }
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
                    email: {
                        required: 'Campo Requerido.'
                    },
                    rua: {
                        required: 'Campo Requerido.'
                    },
                    numero: {
                        required: 'Campo Requerido.'
                    },
                    bairro: {
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
                    }

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


<!-- Rodapé -->
<div class="row-fluid" style="position: absolute; bottom: 0; width: 100%;"> <!-- Rodapé posicionado no final -->
<div id="footer" class="span12">
2020 - <?= date('Y') ?> &copy;
<?php echo $this->config->item('app_name'); ?> - Emanuel Victor - Versão
<?php echo $this->config->item('app_version'); ?>
</div>
</div>
<!-- Final Rodapé -->
<!-- javascript
================================================== -->

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>

</html>
