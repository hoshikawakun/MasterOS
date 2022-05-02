<script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/funcoes.js"></script>

<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Cadastro de Usuário</h5>
</div>
<div class="acordion_group_6"><!--Tamanho Geral da Pagina-->
<div class="row-fluid" style="margin-top:0">
<?php if ($custom_error != '') {
    echo '<div class="alert alert-danger">' . $custom_error . '</div>'; } ?>
</div>
<div class="acordion_group_8">
<form action="<?php echo current_url(); ?>" id="formUsuario" method="post" class="form-horizontal">

                    <div class="control_group_up">
                        <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nome" type="text" name="nome" value="<?php echo set_value('nome'); ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="rg" class="control-label">RG</label>
                        <div class="controls">
                            <input id="rg" class="rguser" type="text" name="rg" value="<?php echo set_value('rg'); ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="cpf" class="control-label">CPF<span class="required">*</span></label>
                        <div class="controls">
                            <input class="cpfuser" type="text" name="cpf" value=""/>
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="telefone" class="control-label">Telefone<span class="required">*</span></label>
                        <div class="controls">
                            <input class="telefone1" id="telefone" type="text" name="telefone" value="<?php echo set_value('telefone'); ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="celular" class="control-label">Telefone 2</label>
                        <div class="controls">
                            <input class="telefone1" id="celular" type="text" name="celular" value="<?php echo set_value('celular'); ?>" />
                        </div>
                    </div>


                    <div class="control_group_up">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="email" name="email" value="<?php echo set_value('email'); ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="senha" class="control-label">Senha<span class="required">*</span></label>
                        <div class="controls">
                            <input id="senha" type="password" name="senha" value="<?php echo set_value('senha'); ?>" />
                        </div>
                    </div>

                    <div class="control_group_up" class="control-label">
                        <label for="cep" class="control-label">CEP<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cep" type="text" name="cep" value="<?php echo set_value('cep'); ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="rua" class="control-label">Endereço<span class="required">*</span></label>
                        <div class="controls">
                            <input id="rua" type="text" name="rua" value="<?php echo set_value('rua'); ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="numero" class="control-label">Numero</label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" value="<?php echo set_value('numero'); ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="bairro" class="control-label">Bairro<span class="required">*</span></label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" value="<?php echo set_value('bairro'); ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" value="<?php echo set_value('cidade'); ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="estado" class="control-label">Estado<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estado" type="text" name="estado" value="<?php echo set_value('estado'); ?>" />
                        </div>
                    </div>


                    <!-- Campo para inserir a data de validade de acesso do usuário-->
                    <div class="control_group_up">
                        <label for="dataExpiracao" class="control-label">Expira em <span class="required">*</span></label>
                        <div class="controls">
                            <input name="dataExpiracao" type="date" id="dataExpiracao" value="<?php echo date('Y-m-d'); ?>" readonly="readonly" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label class="control-label">Situação*</label>
                        <div class="controls">
                            <select name="situacao" id="situacao">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="control_group_dn">
                        <label class="control-label">Permissões<span class="required">*</span></label>
                        <div class="controls">
                            <select name="permissoes_id" id="permissoes_id">
                                <?php foreach ($permissoes as $p) {
    echo '<option value="' . $p->idPermissao . '">' . $p->nome . '</option>';
} ?>
                            </select>
                        </div>
                    </div>

<div class="form_actions" align="center">
<a href="<?php echo base_url() ?>index.php/usuarios" id="" class="button_mini btn btn-mini btn-warning">
<span class="button_icon"><i class="fas fa-undo-alt"></i></span> <span class="button_text">Voltar</span></a>
<button type="submit" class="button_mini btn btn-success">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar</span></button>
</div>
</form>

</div>
</div>
</div>
</div>


<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $('#formUsuario').validate({
        rules: {
            nome: {
                required: true
            },
            dataExpiracao: {
                required: true
            },
            cpf: {
                required: true
            },
            telefone: {
                required: true
            },
            email: {
                required: true
            },
            senha: {
                required: true
            },
            rua: {
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
            nome: {
                required: 'Campo Requerido.'
            },
            dataExpiracao: {
                required: 'Campo Requerido.'
            },
            cpf: {
                required: 'Campo Requerido.'
            },
            telefone: {
                required: 'Campo Requerido.'
            },
            email: {
                required: 'Campo Requerido.'
            },
            senha: {
                required: 'Campo Requerido.'
            },
            rua: {
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