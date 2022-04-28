<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Cadastro de Permissão</h5>
</div>

<form action="<?php echo base_url(); ?>index.php/permissoes/adicionar" class="form_horizontal" id="formPermissao" method="post">
<div class="control_group_up" style="padding: 1%">
<div class="span12 well_1" style="padding: 1%; margin-left: 0">
<div class="span6" style="margin-left: 0">
<label>Nome da Permissão</label>
<input name="nome" type="text" id="nome" class="span12" value="" />
</div>
<div class="span5">
<label>Marcar Todos</label>
<input name="marcarTodos" type="checkbox" value="1" id="marcarTodos" />
</div>
</div>
</div>

<!-- Cadastro de Permissão -->

<!--<div class="permition_content" id="collapse-group">-->
<div class="permition_content">

<div class="acordion_group acordion_group_1">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG1" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Clientes</h5>
</a>
</div>
</div>
<div class="collapse in" id="collapseG1">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vCliente" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Cliente</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

<div class="acordion_group acordion_group_2">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG2" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Produtos</h5>
</a>
</div>
</div>
<div class="collapse" id="collapseG2">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vProduto" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Produto</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Produto</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Produto</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Produto</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

<div class="acordion_group acordion_group_2">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG3" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Serviços</h5>
</a>
</div>
</div>
<div class="collapse" id="collapseG3">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vServico" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Serviço</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Serviço</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Serviço</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Serviço</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

<div class="acordion_group acordion_group_2">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG4" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Ordem de Serviços - OS</h5>
</a>
</div>
</div>
<div class="collapse" id="collapseG4">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vOs" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir OS</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

<div class="acordion_group acordion_group_2">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG5" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Vendas</h5>
</a>
</div>
</div>
<div class="collapse" id="collapseG5">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vVenda" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Venda</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

<div class="acordion_group acordion_group_2">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG6" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Cobranças</h5>
</a>
</div>
</div>
<div class="collapse" id="collapseG6">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vCobranca" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Cobranças</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aCobranca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Cobranças</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eCobranca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Cobranças</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dCobranca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Cobranças</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

<div class="acordion_group acordion_group_2">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG7" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Garantias</h5>
</a>
</div>
</div>
<div class="collapse" id="collapseG7">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vGarantia" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Garantia</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aGarantia" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Garantia</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eGarantia" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Garantia</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dGarantia" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Garantia</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

<div class="acordion_group acordion_group_2">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG8" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Arquivos</h5>
</a>
</div>
</div>
<div class="collapse" id="collapseG8">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vArquivo" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Arquivo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aArquivo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Arquivo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eArquivo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Arquivo</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dArquivo" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Arquivo</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

<div class="acordion_group acordion_group_2">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG9" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Financeiro</h5>
</a>
</div>
</div>
<div class="collapse" id="collapseG9">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vPagamento" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Pagamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aPagamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Pagamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="ePagamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Pagamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dPagamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Pagamento</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="vLancamento" class="marcar" type="checkbox" checked="checked" value="1" />
                                                    <span class="lbl"> Visualizar Lançamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="aLancamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Lançamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="eLancamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Lançamento</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="dLancamento" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Lançamento</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

<div class="acordion_group acordion_group_2">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG10" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Relatórios</h5>
</a>
</div>
</div>
<div class="collapse" id="collapseG10">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="rCliente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Cliente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rServico" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Serviço</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rOs" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rProduto" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Produto</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="rVenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Venda</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="rFinanceiro" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Relatório Financeiro</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

<div class="acordion_group acordion_group_3">
<div class="acordion_heading">
<div class="permition_title">
<a data-parent="#collapse-group" href="#collapseG11" data-toggle="collapse">
<span><i class="fas fa-key icon_cli2" ></i></span>
<h5>Configurações e Sistema</h5>
</a>
</div>
</div>
<div class="collapse" id="collapseG11">
<div class="acordion_content">


<table class="table_w">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="cUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Usuário</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cEmitente" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Emitente</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cPermissao" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Configurar Permissão</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cBackup" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Backup</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input name="cAuditoria" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Auditoria</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cEmail" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Emails</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input name="cSistema" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Sistema</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


</div>
</div>
</div>

</div>
<!-- Fim Cadastro de Permissão -->

<div class="form_actions" align="center">
<a title="Voltar" class="button_mini btn btn-warning" href="<?php echo site_url() ?>/permissoes"><span class="button_icon"><i class="fas fa-undo-alt"></i></span> <span class="button_text">Voltar</span></a>
<button type="submit" class="button_mini btn btn-mini btn-success"><span class="button_icon"><i class='fas fa-plus-circle' ></i></span> <span class="button_text">Adicionar</span></a></button>
</div>
</form>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#marcarTodos").change(function() {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
        $("#formPermissao").validate({
            rules: {
                nome: {
                    required: true
                }
            },
            messages: {
                nome: {
                    required: 'Campo obrigatório'
                }
            }
        });
    });
</script>