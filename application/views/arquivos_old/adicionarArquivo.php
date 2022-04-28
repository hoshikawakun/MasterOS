<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>


<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Cadastro de Arquivo</h5>
</div>
<div class="widget_box_3">
<?= $custom_error ?>
<form action="<?= current_url() ?>" id="formArquivo" enctype="multipart/form-data" method="post" class="form-horizontal">

<div class="control_group_up">
<label for="preco" class="control-label"><span class="required">Arquivo*</span></label>
<div class="controls">
<input id="arquivo" type="file" name="userfile" />
</div>
</div>

<div class="control_group_up">
<label for="nome" class="control-label">Nome do Arquivo*</label>
<div class="controls">
<input id="nome" type="text" name="nome" class="span7"/>
</div>
</div>

<div class="control_group_up">
<label for="descricao" class="control-label">Descrição</label>
<div class="controls">
<div class="span7">
<textarea class="editor" name="descricao" id="descricao"></textarea>
</div>
</div>
</div>

<div class="control_group_dn">
<label for="descricao" class="control-label">Data</label>
<div class="controls">
<input id="data" class="span7" autocomplete="off" type="date" name="data" value="<?php echo date('Y-m-d'); ?>" />
</div>
</div>

<div class="form_actions" align="center">

<a href="<?= base_url() ?>index.php/arquivos/gerenciar/" class="button_mini btn btn-mini btn-warning" style="max-width: 160px">
<span class="button_icon"><i class="fas fa-undo-alt"></i></span><span class="button_text">Voltar</span></a>

<button type="submit" class="button_mini btn btn-mini btn-success" style="max-width: 160px">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar</span></a>
</button>

</div>

</form>
</div>
</div>
</div>

<script src="<?= base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#formArquivo').validate({
            rules: {
                nome: {
                    required: true
                },
                userfile: {
                    required: true
                }
            },
            messages: {
                nome: {
                    required: 'Campo Requerido.'
                },
                userfile: {
                    required: 'Campo Requerido.'
                }
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
                $(element).parents('.control-group').removeClass('success');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>