<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 9999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
    }
</style>


<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Cadastro de OS</h5>
</div>
<form action="<?php echo current_url(); ?>" method="post" id="formOs">

<div class="widget_content_3">
<ul class="nav nav-tabs">
<li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
</ul>
<div class="widget_content_os tab-content">

<!-- Detalhes da OS -->
<div id="tab1" class="tab-pane fade in active" style="min-height: 360px">
<div class="widget_os" id="divCadastrarOs">

<?php if ($custom_error == true) { ?>
<div class="span12 alert alert-danger" id="divInfo" style="padding: 1%; margin-left: 0">
Dados incompletos, verifique os campos com asterisco ou se selecionou corretamente cliente, responsável e garantia.<br />Ou se tem um cliente e um termo de garantia cadastrado.</div>
<?php } ?>

<div class="span12" style="padding: 1%; margin-left: 0">
<div class="span6">
<label for="cliente">Cliente</label>
<input name="cliente" type="text" disabled="disabled" class="span12" id="cliente" value="<?= $this->session->userdata('nome'); ?>" readonly="readonly" />
</div>

<div class="span6">
<label for="tecnico">Data de Entrtada</label>
<input id="dataInicial" disabled="disabled" class="span12" type="date" name="dataInicial" value="<?php echo date('Y-m-d'); ?>" />
</div>

<div class="span3" style="margin-left: 0">
<label for="serial">Nº Série</label>
<input id="serial" type="text" class="span12" name="serial" maxlength="30" value="<?php echo $result->serial ?>" />
</div>

<div class="span3">
<label for="marca">Marca</label>
<input id="marca" type="text" class="span12" name="marca" maxlength="30" value="<?php echo $result->marca ?>" />
</div>
</div>



<div class="span12" style="padding: 1%; margin-left: 0">
<div class="span6">
                                        <label for="descricaoProduto"><h4>Descrição Produto/Serviço</h4></label>
                                        <textarea class="span12 editor" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"></textarea>
                                        <label for="observacoes"><h4>Observações</h4></label>
                                        <textarea class="span12 editor" name="observacoes" id="observacoes" cols="30" rows="5"></textarea>
</div>

<div class="span6">
                                        <label for="defeito"><h4>Problema Informado</h4></label>
                                        <textarea class="span12 editor" name="defeito" id="defeito" cols="30" rows="5"></textarea>
</div>
</div>
</div>
</div>
<!-- Fim Detalhes da OS -->

</div>
</div>

<!-- Botoes de Ação -->
<div class="form_actions" align="center">
<div align="center" style="padding: 3px">
<a href="<?php echo base_url() ?>index.php/os" class="button_mini btn btn-mini btn-warning" style="max-width: 160px">
<span class="button_icon"><i class="fas fa-undo-alt"></i></span><span class="button_text">Voltar</span></a>
<button class="button_mini btn btn-success" id="btnContinuar">
<span class="button_icon"><i class='fas fa-fast-forward'></i></span><span class="button_text">Continuar</span></button>
</div>
</div>
</form>
<!-- Fim Botoes de Ação -->
</div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 1,
            select: function(event, ui) {
                $("#clientes_id").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 1,
            select: function(event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });
        $("#termoGarantia").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteTermoGarantia",
            minLength: 1,
            select: function(event, ui) {
                $("#garantias_id").val(ui.item.id);
            }
        });

        $("#formOs").validate({
            rules: {
                cliente: {
                    required: true
                },
                tecnico: {
                    required: true
                },
                dataInicial: {
                    required: true
                },
                dataFinal: {
                    required: true
                },
				descricaoProduto: {
                    required: true
                }

            },
            messages: {
                cliente: {
                    required: 'Campo Requerido.'
                },
                tecnico: {
                    required: 'Campo Requerido.'
                },
                dataInicial: {
                    required: 'Campo Requerido.'
                },
                dataFinal: {
                required: 'Campo Requerido.'
                },
                descricaoProduto: {
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
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>