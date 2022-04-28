<script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/funcoes.js"></script>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-user"></i>
                </span>
                <h5>Editar Usuário</h5>
            </div>
            <div class="widget_box_Painel2">
                <?php if ($custom_error != '') {
    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
} ?>
                <form action="<?php echo current_url(); ?>" id="formUsuario" method="post" class="form-horizontal">
                    <div class="control_group_up">
                        <?php echo form_hidden('idUsuarios', $result->idUsuarios) ?>
                        <label for="nome" class="control-label">Nome<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nome" type="text" name="nome" value="<?php echo $result->nome; ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="rg" class="control-label">RG<span class="required">*</span></label>
                        <div class="controls">
                            <input id="rg" type="text" name="rg" value="<?php echo $result->rg; ?>" />
                        </div>
                    </div>
                    
                  <div class="control_group_up">
                        <label for="cpf" class="control-label">CPF<span class="required">*</span></label>
                        <div class="controls">
                            <input name="cpf" type="text" class="cpfcnpj" value="<?php echo $result->cpf; ?>" />
                      </div>
                    </div>
                    
                    <div class="control_group_up">
                        <label for="telefone" class="control-label">Telefone<span class="required">*</span></label>
                        <div class="controls">
                            <input id="telefone" class="telefone1" type="text" name="telefone" value="<?php echo $result->telefone; ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="celular" class="control-label">Telefone 2</label>
                        <div class="controls">
                            <input id="celular" class="telefone1" type="text" name="celular" value="<?php echo $result->celular; ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->email; ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="senha" class="control-label">Senha</label>
                        <div class="controls">
                            <input id="senha" type="password" name="senha" value="" placeholder="Não preencha se não quiser alterar." />
                            <i class="icon-exclamation-sign tip-top" title="Se não quiser alterar a senha, não preencha esse campo."></i>
                        </div>
                    </div>

                    <div class="control_group_up" class="control-label">
                        <label for="cep" class="control-label">CEP<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cep" type="text" name="cep" value="<?php echo $result->cep; ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="rua" class="control-label">Rua<span class="required">*</span></label>
                        <div class="controls">
                            <input id="rua" type="text" name="rua" value="<?php echo $result->rua; ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="numero" class="control-label">Numero<span class="required">*</span></label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" value="<?php echo $result->numero; ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="bairro" class="control-label">Bairro<span class="required">*</span></label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" value="<?php echo $result->bairro; ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" value="<?php echo $result->cidade; ?>" />
                        </div>
                    </div>

                    <div class="control_group_up">
                        <label for="estado" class="control-label">Estado<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estado" type="text" name="estado" value="<?php echo $result->estado; ?>" />
                        </div>
                    </div>

                    <!--DATA-->
                    <div class="control_group_up">
                        <label for="dataExpiracao" class="control-label">Expira em<span class="required">*</span></label>
                        <div class="controls">
                            <input id="dataExpiracao" type="date" readonly="readonly" name="dataExpiracao" value="<?php echo $result->dataExpiracao; ?>" />
                        </div>
                    </div>


                    <div class="control_group_up">
                        <label class="control-label">Situação*</label>
                        <div class="controls">
                            <select name="situacao" id="situacao">
                                <?php if ($result->situacao == 1) {
    $ativo = 'selected';
    $inativo = '';
} else {
    $ativo = '';
    $inativo = 'selected';
} ?>
                                <option value="1" <?php echo $ativo; ?>>Ativo</option>
                                <option value="0" <?php echo $inativo; ?>>Inativo</option>
                            </select>
                        </div>
                    </div>


                    <div class="control_group_up">
                        <label class="control-label">Permissões<span class="required">*</span></label>
                        <div class="controls">
                            <select name="permissoes_id" id="permissoes_id">
                                <?php foreach ($permissoes as $p) {
    if ($p->idPermissao == $result->permissoes_id) {
        $selected = 'selected';
    } else {
        $selected = '';
    }
    echo '<option value="' . $p->idPermissao . '"' . $selected . '>' . $p->nome . '</option>';
} ?>
                            </select>
                        </div>
                    </div>

                    <div class="form_actions" align="center">
                    <a href="<?php echo base_url() ?>index.php/produtos" id="" class="btn btn-warning"><i class="fas fa-undo-alt"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
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
