<script src="<?php echo base_url()?>assets/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url()?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url()?>assets/js/funcoes.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>




<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Configurações do Sistema</h5>
</div>
<div class="widget_content_3">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#tab1">Gerais</a></li>
<!--<li><a data-toggle="tab" href="#tab2">Gift Card</a></li>-->
<li><a data-toggle="tab" href="#tab3">Misc</a></li>
<li><a data-toggle="tab" href="#tab4">Financeiro</a></li>
<li><a data-toggle="tab" href="#tab5">Termo de Uso OS</a></li>
<li><a data-toggle="tab" href="#tab6">Notificações</a></li>
<li><a data-toggle="tab" href="#tab7">Mensagem WhatsApp</a></li>
<li><a data-toggle="tab" href="#tab8">OS</a></li>
<li><a data-toggle="tab" href="#tab9">Itens Home</a></li>
</ul>
<form action="<?php echo current_url(); ?>" id="formConfigurar" method="post" class="form-horizontal">
<div class="nopadding tab-content">
<?php echo $custom_error; ?>
<div class="widget_content tab-content"> <!--Borda tabela externa-->
<!-- Menu Gerais -->
<div id="tab1" class="tab-pane active" style="min-height: 338px"><!--Tamanho Geral da Pagina-->
<div class="acordion_config">

                        <div class="control_group_up">
                            <label for="app_name" class="control-label">Nome do Sistema</label>
                            <div class="controls">
                                <input type="text" required name="app_name" value="<?= $configuration['app_name']?>">
                                <span class="help-inline">Nome do sistema</span>
                            </div>
                        </div>
                        <div class="control_group_up">
                            <label for="app_theme" class="control-label">Tema do Sistema</label>
                            <div class="controls">
                                <select name="app_theme" id="app_theme">
                                    <option value="novo"
                                        <?= $configuration['app_theme'] == 'novo' ? 'selected' : ''; ?>>Padrão</option>
                                </select>
                                <span class="help-inline">Selecione o tema que que deseja usar no sistema</span>
                            </div>
                        </div>
                        <div class="control_group_up">
                            <label for="gerenciador_arquivos" class="control-label">Gerenciador de Arquivos</label>
                            <div class="controls">
                                <select name="gerenciador_arquivos" id="gerenciador_arquivos">
                                    <option value="arquivos_old/arquivos"
                                        <?= $configuration['gerenciador_arquivos'] == 'arquivos_old/arquivos' ? 'selected' : ''; ?>>
                                        Classico</option>
                                    <option value="arquivos/arquivos"
                                        <?= $configuration['gerenciador_arquivos'] == 'arquivos/arquivos' ? 'selected' : ''; ?>>
                                        Novo</option>
                                </select>
                                <span class="help-inline">Versão do Gerenciador de Arquivos.</span>
                            </div>
                        </div>
                        <div class="control_group_up">
                            <label for="masteros_0" class="control-label">Complemento de eMail</label>
                            <div class="controls">
                                <input type="text" required name="masteros_0"
                                    value="<?= $configuration['masteros_0']?>">
                                <span class="help-inline">
                                    <span class="help-inline">Complemento de eMail em Cadastro de Cliente</span>
                            </div>
                        </div>
                        <div class="control_group_dn">
                            <label for="app_name" class="control-label">Mensagem Rápida</label>
                            <div class="controls">
                                <input id="telefone" class="telefone1" type="text" name="masteros_1" value="" style="margin-top:3px; margin-bottom:3px;"/>
                                <span class="help-inline">
                                <a title="Enviar WhatsWapp" style="margin-top:3px; margin-bottom:3px;" class="button_mini btn btn-success" href="whatsapp://send?phone=55<?= $configuration['masteros_1']?>"><span class="button_icon"><i class="fab fa-whatsapp"></i></span> <span class="button_text">Enviar WhatsWapp</span></a>
                                
                                <a title="Enviar WhatsWapp" style="margin-top:3px; margin-bottom:3px;" class="button_mini btn btn-success" href="https://web.whatsapp.com/send?phone=55<?= $configuration['masteros_1']?>"><span class="button_icon"><i class="fab fa-whatsapp"></i></span> <span class="button_text">Enviar WhatsApp Web</span></a>
                                        </span>
                                <span class="help-inline"><input disabled="disabled" value=" <?= $configuration['masteros_1']?>" readonly style="margin-top:3px; margin-bottom:3px;"/></span>
                            </div>
                        </div>

</div>
</div>
<!-- Fim Menu Gerais -->

<!-- Gift Card -->
<div id="tab2" class="tab-pane" style="min-height: 338px"><!--Tamanho Geral da Pagina-->
<div class="acordion_config">


</div>
</div>
<!-- Fim Gift Card -->

<!-- Menu Misc -->
<div id="tab3" class="tab-pane" style="min-height: 338px"><!--Tamanho Geral da Pagina-->
<div class="acordion_config">

                        <div class="control_group_up">
                            <label for="per_page" class="control-label">Registros por Página</label>
                            <div class="controls">
                                <select name="per_page" id="theme">
                                    <option value="10" <?= $configuration['per_page'] == '10' ? 'selected' : ''; ?>>10
                                    </option>
                                    <option value="20" <?= $configuration['per_page'] == '20' ? 'selected' : ''; ?>>20
                                    </option>
                                    <option value="30" <?= $configuration['per_page'] == '30' ? 'selected' : ''; ?>>30
                                    </option>
                                    <option value="50" <?= $configuration['per_page'] == '50' ? 'selected' : ''; ?>>50
                                    </option>
                                    <option value="75" <?= $configuration['per_page'] == '75' ? 'selected' : ''; ?>>75
                                    </option>
                                    <option value="100" <?= $configuration['per_page'] == '100' ? 'selected' : ''; ?>>
                                        100</option>
                                    <option value="150" <?= $configuration['per_page'] == '150' ? 'selected' : ''; ?>>
                                        150</option>
                                    <option value="200" <?= $configuration['per_page'] == '200' ? 'selected' : ''; ?>>
                                        200</option>
                                    <option value="300" <?= $configuration['per_page'] == '300' ? 'selected' : ''; ?>>
                                        300</option>
                                    <option value="500" <?= $configuration['per_page'] == '500' ? 'selected' : ''; ?>>
                                        500</option>
                                    <option value="750" <?= $configuration['per_page'] == '750' ? 'selected' : ''; ?>>
                                        750</option>
                                    <option value="1000" <?= $configuration['per_page'] == '1000' ? 'selected' : ''; ?>>
                                        1000</option>
                                </select>
                                <span class="help-inline">Selecione quantos registros deseja exibir nas listas</span>
                            </div>
                        </div>
                        <div class="control_group_DN">
                            <label for="control_estoque" class="control-label">Controlar Estoque</label>
                            <div class="controls">
                                <select name="control_estoque" id="control_estoque">
                                    <option value="1">Sim</option>
                                    <option value="0" <?= $configuration['control_estoque'] == '0' ? 'selected' : ''; ?>>Não</option>
                                </select>
                                <span class="help-inline">Ativar ou desativar o controle de estoque.</span>
                            </div>
                        </div>

</div>
</div>
<!-- Fim Menu Misc -->

<!-- Menu Financeiro -->
<div id="tab4" class="tab-pane" style="min-height: 338px"><!--Tamanho Geral da Pagina-->
<div class="acordion_config">

                        <div class="control_group_up">
                        <label for="control_baixa" class="control-label">Controle de baixa retroativa</label>
                            <div class="controls">
                                <select name="control_baixa" id="control_baixa">
                                    <option value="1">Ativar</option>
                                    <option value="0" <?= $configuration['control_baixa'] == '0' ? 'selected' : ''; ?>>Desativar</option>
                                </select>
                                <span class="help-inline">Ativar ou desativar o controle de baixa financeira, com data retroativa.</span>
                            </div>
                        </div>
                        <div class="control_group_up">
                            <label for="control_editos" class="control-label">Controle de edição de OS</label>
                            <div class="controls">
                                <select name="control_editos" id="control_editos">
                                    <option value="1" <?= $configuration['control_editos'] == '0' ? 'selected' : ''; ?>>Ativar</option>
                                    <option value="0" <?= $configuration['control_editos'] == '0' ? 'selected' : ''; ?>>Desativar</option>
                                </select>
                                <span class="help-inline">Ativar ou desativar a permissão para alterar ou excluir OS faturada e/ou cancelada.</span>
                            </div>
                        </div>
                        <div class="control_group_up">
                            <label for="control_edit_vendas" class="control-label">Controle de edição de Vendas</label>
                            <div class="controls">
                                <select name="control_edit_vendas" id="control_edit_vendas">
                                    <option value="1" <?= $configuration['control_edit_vendas'] == '0' ? 'selected' : ''; ?>>Ativar</option>
                                    <option value="0" <?= $configuration['control_edit_vendas'] == '0' ? 'selected' : ''; ?>>Desativar</option>
                                </select>
                                <span class="help-inline">Ativar ou desativar a permissão para alterar ou excluir vendas faturada.</span>
                            </div>
                        </div>
                        <div class="control_group_dn">
                            <label for="pix_key" class="control-label">Chave Pix</label>
                            <div class="controls">
                                <input type="text" name="pix_key" value="<?= $configuration['pix_key'] ?>">
                                <span class="help-inline">Chave Pix para Recebimento de Pagamentos</span>
                            </div>
                        </div>

</div>
</div>
<!-- Fim Menu Financeiro -->

<!-- Menu Termo de Uso OS -->
<div id="tab5" class="tab-pane" style="min-height: 250px"><!--Tamanho Geral da Pagina-->
<div class="acordion_text">
<textarea name="termo_uso" class="editor"><?= $configuration['termo_uso']?></textarea>
</div>
</div>
<!-- Fim Menu Termo de Uso OS -->

<!-- Menu Notificação -->
<div id="tab6" class="tab-pane" style="min-height: 338px"><!--Tamanho Geral da Pagina-->
<div class="acordion_config">

                        <div class="control_group_up">
                            <label for="os_notification" class="control-label">Notificação de OS</label>
                            <div class="controls">
                                <select name="os_notification" id="os_notification">
                                    <option value="todos">Notificar a Todos</option>
                                    <option value="cliente"
                                        <?= $configuration['os_notification'] == 'cliente' ? 'selected' : ''; ?>>Somente
                                        o Cliente</option>
                                    <option value="tecnico"
                                        <?= $configuration['os_notification'] == 'tecnico' ? 'selected' : ''; ?>>Somente
                                        o Técnico</option>
                                    <option value="emitente"
                                        <?= $configuration['os_notification'] == 'emitente' ? 'selected' : ''; ?>>
                                        Somente o Emitente</option>
                                    <option value="nenhum"
                                        <?= $configuration['os_notification'] == 'nenhum' ? 'selected' : ''; ?>>Não
                                        Notificar</option>
                                </select>
                                <span class="help-inline">Selecione a opção de notificação por e-mail no cadastro de
                                    OS.</span>
                            </div>
                        </div>
                        
                        <div class="control_group_dn">
                            <label for="email_automatico" class="control-label">Enviar Email Automático</label>
                            <div class="controls">
                                <select name="email_automatico" id="email_automatico">
                                    <option value="1">Ativar</option>
                                    <option value="0" <?= $configuration['email_automatico'] == '0' ? 'selected' : ''; ?>>Desativar</option>
                                </select>
                                <span class="help-inline">Ativar ou Desativar a opção de envio de e-mail automático no cadastro de OS.</span>
                        </div>
                        
                        </div>

</div>
</div>
<!-- Fim Menu Notificação -->

<!-- Menu Mensagem WhatsApp -->
<div id="tab7" class="tab-pane" style="min-height: 338px"><!--Tamanho Geral da Pagina-->
<div class="acordion_config">

<div class="control_group_up">
                            <label for="app_name" class="control-label">Mensagem WhatsApp</label>
                            <div class="controls">
                                <input class="span5" name="whats_app1" type="text" value="<?= $configuration['whats_app1']?>
                            " size="50" />
                                <span class="help-inline">Mensagem</span>
                            </div>
                            </div>
                            <div class="control_group_up">
                            <div class="controls">
                                <input class="span5" name="whats_app2" type="text"
                                    value="<?= $configuration['whats_app2']?>" size="50">
                                <span class="help-inline">Nome</span>
                            </div>
                        </div>
                            <div class="control_group_up">
                       <div class="controls">
                            <input class="span5 telefone1" name="whats_app3" type="text" id="telefone"
                                value="<?= $configuration['whats_app3']?>" size="50" />
                            <span class="help-inline">Telefone</span>
                        </div>
                        </div>
                            <div class="control_group_dn">
                        <div class="controls">
                            <input class="span5" name="whats_app4" type="text" value="<?= $configuration['whats_app4']?>
                            " size="50" widg="50" />
                            <span class="help-inline">URL Area do Usuário</span>
                        </div>
                        </div>

</div>
</div>
<!-- Fim Menu Mensagem WhatsApp -->

<!-- Menu OS -->
<div id="tab8" class="tab-pane" style="min-height: 338px"><!--Tamanho Geral da Pagina-->
<div class="acordion_config">

<div class="control_group_dn" align="center">
<label class="help-inline2" >Defina a vizualização, onde o que ficar marcado será exibida na listagem de OS por padrão.</label>
</div>

<div class="control_group_dn">
<table class="table_x">
<tbody>
<tr>
<td>
<label>
<input <?= @in_array("Orçamento", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Orçamento">
<span class="lbl">Orçamento</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Orçamento Concluido", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Orçamento Concluido">
<span class="lbl">Orçamento Concluido</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Orçamento Aprovado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Orçamento Aprovado">
<span class="lbl">Orçamento Aprovado</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Em Andamento", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Em Andamento">
<span class="lbl">Em Andamento</span>
</label>
</td>
</tr>
                                
<tr>
<td>
<label>
<input <?= @in_array("Aguardando Peças", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aguardando Peças">
<span class="lbl">Aguardando Peças</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Serviço Concluido", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Serviço Concluido">
<span class="lbl">Serviço Concluido</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Sem Reparo", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Sem Reparo">
<span class="lbl">Sem Reparo</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Não Autorizado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Não Autorizado">
<span class="lbl">Não Autorizado</span>
</label>
</td>
</tr>
                                
<tr>
<td>
<label>
<input <?= @in_array("Contato sem Sucesso", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Contato sem Sucesso">
<span class="lbl">Contato sem Sucesso</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Cancelado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Cancelado">
<span class="lbl">Cancelado</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Pronto-Despachar", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Pronto-Despachar">
<span class="lbl">Pronto-Despachar</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Aguardando Envio", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aguardando Envio">
<span class="lbl">Aguardando Envio</span>
</label>
</td>
</tr>
                                
<tr>
<td>
<label>
<input <?= @in_array("Enviado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Enviado">
<span class="lbl">Enviado</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Aguardando Entrega Correio", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Aguardando Entrega Correio">
<span class="lbl">Aguardando Entrega Correio</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Garantia", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Garantia">
<span class="lbl">Garantia</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Abandonado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Abandonado">
<span class="lbl">Abandonado</span>
</label>
</td>
</tr>
                                
<tr>
<td>
<label>
<input <?= @in_array("Comprado pela Loja", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Comprado pela Loja">
<span class="lbl">Comprado pela Loja</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Entregue - A Receber", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Entregue - A Receber">
<span class="lbl">Entregue - A Receber</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Entregue - Sem Reparo", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Entregue - Sem Reparo">
<span class="lbl">Entregue - Sem Reparo</span>
</label>
</td>
<td>
<label>
<input <?= @in_array("Entregue - Faturado", json_decode($configuration['os_status_list'])) == 'true' ? 'checked' : ''; ?> name="os_status_list[]" class="marcar" type="checkbox" value="Entregue - Faturado">
<span class="lbl">Entregue - Faturado</span>
</label>
</td>
</tr>
                                </tbody>
                            </table>
</div>

</div>
</div>
<!-- Fim Menu OS -->

<!-- Menu OS Home -->
<div id="tab9" class="tab-pane" style="min-height: 338px"><!--Tamanho Geral da Pagina-->
<div class="acordion_config">

<div class="control_group_up">
<label for="per_page_home" class="control-label">Registros por Página</label>
<div class="controls">
<select name="per_page_home" id="theme">
<option value="5" <?= $configuration['per_page_home'] == '5' ? 'selected' : ''; ?>>5
</option>
<option value="10" <?= $configuration['per_page_home'] == '10' ? 'selected' : ''; ?>>10
</option>
<option value="15" <?= $configuration['per_page_home'] == '15' ? 'selected' : ''; ?>>15
</option>
<option value="20" <?= $configuration['per_page_home'] == '20' ? 'selected' : ''; ?>>20
</option>
<option value="25" <?= $configuration['per_page_home'] == '25' ? 'selected' : ''; ?>>25
</option>
</select>
<span class="help-inline">Selecione quantos registros de OS deseja exibir nas listas</span>
</div>
</div>

<div class="control_group_dn" align="center">
<label class="help-inline2" >Defina quais tipos de OS Vão aparecer na Pagina inicial do Sistema.</label>
</div>

<div class="control_group_up">
<table class="table_x">
<tbody>
<tr>
<td>
<label>
<input type="checkbox" id="orcamento" name="orcamento" style="text-align:right" class="marcar" value="1" <?= ($configuration['orcamento'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Em Aberto</span>
</label>
</td>
<td>
<label>
<input type="checkbox" id="orcamento_concluido" name="orcamento_concluido" style="text-align:right" class="marcar" value="1" <?= ($configuration['orcamento_concluido'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Orçamento Concluido</span>
</label>
</td>
<td>
<label>
<input type="checkbox" id="orcamento_aprovado" name="orcamento_aprovado" style="text-align:right" class="marcar" value="1" <?= ($configuration['orcamento_aprovado'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Orçamento Aprovado</span>
</label>
</td>

<td>
<label>
<input type="checkbox" id="em_andamento" name="em_andamento" style="text-align:right" class="marcar" value="1" <?= ($configuration['em_andamento'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Em Andamento</span>
</label>
</td>
</tr>
                                
<tr>
<td>
<label>
<input type="checkbox" id="aguardando_pecas" name="aguardando_pecas" style="text-align:right" class="marcar" value="1" <?= ($configuration['aguardando_pecas'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Aguardando Peças</span>
</label>
</td>
<td>
<label>
<input type="checkbox" id="servico_concluido" name="servico_concluido" style="text-align:right" class="marcar" value="1" <?= ($configuration['servico_concluido'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Serviço Concluido</span>
</label>
</td>
<td>
<label>
<input type="checkbox" id="sem_reparo" name="sem_reparo" style="text-align:right" class="marcar" value="1" <?= ($configuration['sem_reparo'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Sem Reparo</span>
</label>
</td>
<td>
<label>
<input type="checkbox" id="nao_autorizado" name="nao_autorizado" style="text-align:right" class="marcar" value="1" <?= ($configuration['nao_autorizado'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Não Autorizado</span>
</label>
</td>
</tr>
                                
<tr>
<td>
<label>
<input type="checkbox" id="cancelado" name="cancelado" style="text-align:right" class="marcar" value="1" <?= ($configuration['cancelado'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Cancelado</span>
</label>
</td>
<td>
<label>
<input type="checkbox" id="pronto_despachar" name="pronto_despachar" style="text-align:right" class="marcar" value="1" <?= ($configuration['pronto_despachar'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Pronto-Despachar</span>
</label>
</td>
<td>
<label>
<input type="checkbox" id="em_garantia" name="em_garantia" style="text-align:right" class="marcar" value="1" <?= ($configuration['em_garantia'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Garantia</span>
</label>
</td>
<td>
<label>
<input type="checkbox" id="entregue_a_receber" name="entregue_a_receber" style="text-align:right" class="marcar" value="1" <?= ($configuration['entregue_a_receber'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Entregue - A Receber</span>
</label>
</td>
</tr>
</tbody>
</table>
</div>
<div class="control_group_dn" align="center">
<label class="help-inline2" >Defina quais Itens vão aparecer na Pagina inicial do Sistema.</label>
</div>
<div class="control_group_dn">
<table class="table_x">
<tbody>
<tr>
<td>
<label>
<input type="checkbox" id="masteros_2" name="masteros_2" style="text-align:right" class="marcar" value="1" <?= ($configuration['masteros_2'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Agenda/Estatisticas do Sistema</span>
</label>
</td>
<td>
<label>
<input type="checkbox" id="masteros_3" name="masteros_3" style="text-align:right" class="marcar" value="1" <?= ($configuration['masteros_3'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Produtos com Estoque Mínimo</span>
</label>
</td>
<td>
<label>
<input type="checkbox" id="masteros_4" name="masteros_4" style="text-align:right" class="marcar" value="1" <?= ($configuration['masteros_4'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Balanço Mensal</span>
</label>
</td>

<!--<td>
<label>
<input type="checkbox" id="masteros_5" name="masteros_5" style="text-align:right" class="marcar" value="1" <?= ($configuration['masteros_5'] == 1 ) ? 'checked' : '' ?> />
<span class="lbl">Graficos - Estatisticas</span>
</label>
</td>-->
</tr>
</tbody>
</table>
</div>

</div>
</div>
<!-- Fim Menu OS Home -->


</div>
</div>
<div class="form_actions" align="center">
<button type="submit" class="button_mini btn btn-primary">
<span class="button_icon"><i class='fas fa-sd-card'></i></span><span class="button_text">Salvar Alterações</span></button>
</div>
</form>
</div>
</div>
</div>


<script>
$('#update-database').click(function() {
    window.location = "<?= site_url('masteros/atualizarBanco') ?>"
});
$('#update-masteros').click(function() {
    window.location = "<?= site_url('masteros/atualizarMasteros') ?>"
});
$(document).ready(function() {
    $('#notifica_whats_select').change(function() {
        if ($(this).val() != "0")
            document.getElementById("notifica_whats").value += $(this).val();
        $(this).prop('selectedIndex', 0);
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