<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Editar Serviço</h5>
</div>
<div class="acordion_group_6"><!--Tamanho Geral da Pagina-->
<div class="acordion_group_8">
<?php echo $custom_error; ?>
        <form action="<?php echo current_url(); ?>" id="formServico" method="post" class="form-horizontal">

<div class="control_group_up">
                        <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nome" type="text" name="nome" value="<?php echo $result->nome ?>" />
                        </div>
</div>

<div class="control_group_up">
                        <label for="preco" class="control-label"><span class="required">Preço*</span></label>
                        <div class="controls">
                            <input id="preco" class="money" data-affixes-stay="true" data-thousands="" data-decimal="." type="text" name="preco" value="<?php echo $result->preco ?>" />
                        </div>
</div>

<div class="control_group_up">
                        <label for="descricao" class="control-label">Descrição</label>
                        <div class="controls">
                            <input id="descricao" type="text" name="descricao" value="<?php echo $result->descricao ?>" />
                        </div>
</div>
<div class="form_actions" align="center">
<a href="<?php echo base_url() ?>index.php/servicos" id="btnAdicionar" class="button_mini btn btn-mini btn-warning" style="max-width: 160px">
<span class="button_icon"><i class="fas fa-undo-alt"></i></span><span class="button_text">Voltar</span></a>
<button type="submit" class="button_mini btn btn-primary" style="max-width: 160px"><span class="button_icon"><i class="fas fa-sync-alt"></i></span><span class="button_text">Atualizar</span></button>
</div>

</form>
</div>
</div>
</div>
</div>


<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".money").maskMoney();
        $('#formServico').validate({
            rules: {
                nome: {
                    required: true
                },
                preco: {
                    required: true
                }
            },
            messages: {
                nome: {
                    required: 'Campo Requerido.'
                },
                preco: {
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
