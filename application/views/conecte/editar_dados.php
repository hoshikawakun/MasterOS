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
                <h5>Editar Meus Dados</h5>
                <div class="buttons">
                    <a title="Voltar" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/clientes"><i
                                class="fas fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
            <div class="widget_box_Painel2">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Informações Pessoais</a></li>
                <li><a data-toggle="tab" href="#menu2">Endereço</a></li>
            </ul>
            <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal">
                <div class="nopadding tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="control-group">
                        <input type="hidden" name="idClientes" id="idClientes" value="<?php echo $result->idClientes; ?>" />
                        <label for="nomeCliente" class="control-label">Nome/Razão Social<span class="required">*</span></label>
                        <div class="controls">
                            <input id="nomeCliente" type="text" name="nomeCliente" value="<?php echo $result->nomeCliente; ?>" />
                        </div>
                    </div>
                        <div class="control-group">
                        <?php if ($custom_error != '') {
    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
} ?>
                        <label for="documento" class="control-label">CPF/CNPJ<span class="required">*</span></label>
                        <div class="controls">
                            <input name="documento"  type="text" class="cpfcnpj" id="documento" value="<?php echo $result->documento; ?>" readonly="readonly" />
                        </div>
                    </div>
                        <div class="control-group">
                        <label for="senha" class="control-label">Senha<span class="required">*</span></label>
                        <div class="controls">
                            <input id="senha" type="text" name="senha" value="<?php echo $result->senha; ?>" />
                        </div>
                    </div>
                    
                        <div class="control-group">
                        <label for="telefone" class="control-label">Telefone<span class="required">*</span></label>
                        <div class="controls">
                            <input id="telefone" type="text" class="telefone1" name="telefone" value="<?php echo $result->telefone; ?>" />
                        </div>
                    </div>
                        <div class="control-group">
                        <label for="celular" class="control-label">Telefone 2</label>
                        <div class="controls">
                            <input id="celular" type="text" class="telefone1" name="celular" value="<?php echo $result->celular; ?>" />
                        </div>
                    </div>
                        <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">*</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->email; ?>" />
                        </div>
                    </div>
                  
                  <div class="form_actions" align="center">
	<button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Atualizar</button>
                                <a href="<?php echo base_url() ?>index.php/mine/conta" id="" class="btn btn-warning"><i class="fas fa-backward"></i> Voltar</a>
					</div>
                    </div>
                    <!-- Menu Endereços -->
                    <div id="menu2" class="tab-pane fade">
                        <div class="control-group" class="control-label">
                            <label for="cep" class="control-label">CEP<span class="required">*</span></label>
                            <div class="controls">
                                <input id="cep" type="text" name="cep" value="<?php echo $result->cep; ?>" />
                            </div>
                        </div>
                        <div class="control-group" class="control-label">
                            <label for="rua" class="control-label">Rua</label>
                            <div class="controls">
                                <input id="rua" type="text" name="rua" value="<?php echo $result->rua; ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                        <label for="numero" class="control-label">Número<span class="required">*</span></label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" value="<?php echo $result->numero; ?>" />
                        </div>
                    </div>
                        <div class="control-group">
                        <label for="complemento" class="control-label">Complmento</label>
                        <div class="controls">
                            <input id="complemento" type="text" name="complemento" value="<?php echo $result->complemento; ?>" />
                        </div>
                    </div>
                        <div class="control-group" class="control-label">
                            <label for="bairro" class="control-label">Bairro</label>
                            <div class="controls">
                                <input id="bairro" type="text" name="bairro" value="<?php echo $result->bairro; ?>" />
                            </div>
                        </div>
                        <div class="control-group" class="control-label">
                            <label for="cidade" class="control-label">Cidade<span class="required">*</span></label>
                            <div class="controls">
                                <input id="cidade" type="text" name="cidade" value="<?php echo $result->cidade; ?>" />
                            </div>
                        </div>
                        <div class="control-group" class="control-label">
                            <label for="estado" class="control-label">Estado<span class="required">*</span></label>
                            <div class="controls">
                                <input id="estado" type="text" name="estado" value="<?php echo $result->estado; ?>" />
                            </div>
                        </div>
                       <div class="form_actions" align="center">
	<button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Atualizar</button>
                                <a href="<?php echo base_url() ?>index.php/mine/conta" id="" class="btn btn-warning"><i class="fas fa-backward"></i> Voltar</a>
					</div>
				</div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>



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
