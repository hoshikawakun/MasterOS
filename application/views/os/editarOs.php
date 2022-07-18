<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 99999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
    }

    textarea {
        resize: vertical;
    }
</style>


<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3" align="center" style="padding-top:5px; padding-bottom:5px; margin-bottom:5px;">

<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) { ?>
<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Adicionar OS" class="button_mini btn btn-mini btn-success tip-top" target="new" href="<?php echo base_url(); ?>index.php/os/adicionar">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar OS</span></a>
<?php } ?>

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Visualizar OS" class="button_mini btn btn-mini btn-primary tip-top" target="new" href="<?php echo base_url() ?>index.php/os/visualizar/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-eye'></i></span><span class="button_text">Visualizar OS</span></a>

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Imprimir" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/os/imprimir/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir A4</span></a>

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Imprimir Termica" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/os/imprimirTermica/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir Termica</span></a>

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Imprimir Termica 2" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/os/imprimirTermica2/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir Termica 2</span></a>

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Enviar WhatsApp" class="button_mini btn btn-mini btn-success tip-top" id="btn-whatsapp" href="#modal-whatsapp" data-toggle="modal">
<span class="button_icon"><i class='fab fa-whatsapp'></i></span><span class="button_text">WhatsApp</span></a>

<!-------------------------------------------------------------------------->

<?php if ($result->faturado == 0) { ?>
<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Faturar" class="button_mini btn btn-mini btn-danger tip-top" id="btn-faturar" href="#modal-faturar" data-toggle="modal">
<span class="button_icon"><i class='fas fa-cash-register'></i></span><span class="button_text">Faturar</span></a>

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 200px" title="Faturar - Entregue - Sem Reparo" class="button_mini btn btn-mini btn-danger tip-top" id="btn-faturarEntregueSemReparo" href="#modal-entregue" data-toggle="modal">
<span class="button_icon"><i class='fas fa-cash-register'></i></span><span class="button_text">Entregue - Sem Reparo</span></a>
<?php } ?>

<!-------------------------------------------------------------------------->

<!--<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Enviar por E-mail" class="button_mini btn btn-mini btn-warning tip-top" target="new" href="<?php echo site_url() ?>/os/enviar_email/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-envelope'></i></span><span class="button_text">Enviar por E-mail</span></a>-->
</div>
</div>

<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Editar OS</h5>
</div>

<div class="widget_content_3">
<ul class="nav nav-tabs">
<li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
<!--
<?php if ($result->faturado == 0) { ?>
<li id="tabDesconto"><a href="#tab2" data-toggle="tab">Desconto</a></li>
<?php } ?>
-->
<li id="tabProdutos"><a href="#tab3" data-toggle="tab">Produtos</a></li>
<li id="tabServicos"><a href="#tab4" data-toggle="tab">Serviços</a></li>
<li id="tabAnexos"><a href="#tab5" data-toggle="tab">Anexos</a></li>
<li id="tabAnotacoes"><a href="#tab6" data-toggle="tab">Anotações</a></li>
<li id="tabEquipamentos"><a href="#tab7" data-toggle="tab">Equipamentos</a></li>
</ul>

<div class="widget_content_os tab-content">

<!-- Detalhes da OS -->
<div id="tab1" class="tab-pane fade in active" style="min-height: 360px">
<form action="<?php echo current_url(); ?>" method="post" id="formOs">
<div class="widget_os" id="divCadastrarOs">
<div class="widget_os">
<h2>N° OS: #<?php echo $result->idOs; ?></h2>
</div>

<?php echo form_hidden('idOs', $result->idOs) ?>
<div class="span12" style="padding: 1%; margin-left: 0">
<div class="span6">
<label for="cliente">Cliente<span class="required">*</span></label>
<input id="cliente" class="span12" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
<input id="clientes_id" class="span12" type="hidden" name="clientes_id" value="<?php echo $result->clientes_id ?>" />
<input id="valor" type="hidden" name="valor" value="" />
</div>
<div class="span6">
<label for="tecnico">Técnico / Responsável<span class="required">*</span></label>
<input id="tecnico" class="span12" type="text" name="tecnico" value="<?php echo $result->nome ?>" />
<input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>" />
</div>

<div class="span3" style="margin-left: 0">
<label for="status">Status<span class="required">*</span></label>
                                            <select class="span12" name="status" id="status" value="">
                                                <option <?php if ($result->status == 'Orçamento') {
                                    echo 'selected'; } ?> value="Orçamento">Orçamento</option>
                                                <option <?php if ($result->status == 'Orçamento Concluido') {
                                    echo 'selected'; } ?> value="Orçamento Concluido">Orçamento Concluido</option>
                                                <option <?php if ($result->status == 'Orçamento Aprovado') {
                                    echo 'selected'; } ?> value="Orçamento Aprovado">Orçamento Aprovado</option>
                                                <option <?php if ($result->status == 'Aguardando Peças') {
                                    echo 'selected'; } ?> value="Aguardando Peças">Aguardando Peças</option>
                                                <option <?php if ($result->status == 'Em Andamento') {
                                    echo 'selected'; } ?> value="Em Andamento">Em Andamento</option>
                                                <option <?php if ($result->status == 'Serviço Concluido') {
                                    echo 'selected'; } ?> value="Serviço Concluido">Serviço Concluido</option>
                                                <option <?php if ($result->status == 'Sem Reparo') {
                                    echo 'selected'; } ?> value="Sem Reparo">Sem Reparo</option>
                                                <option <?php if ($result->status == 'Não Autorizado') {
                                    echo 'selected'; } ?> value="Não Autorizado">Não Autorizado</option>
                                                <option <?php if ($result->status == 'Contato sem Sucesso') {
                                    echo 'selected'; } ?> value="Contato sem Sucesso">Contato sem Sucesso</option>
                                                <option <?php if ($result->status == 'Cancelado') {
                                    echo 'selected'; } ?> value="Cancelado">Cancelado</option>
                                                <option <?php if ($result->status == 'Pronto-Despachar') {
                                    echo 'selected'; } ?> value="Pronto-Despachar">Pronto-Despachar</option>
                                                <option <?php if ($result->status == 'Enviado') {
                                    echo 'selected'; } ?> value="Enviado">Enviado</option>
                                                <option <?php if ($result->status == 'Aguardando Envio') {
                                    echo 'selected'; } ?> value="Aguardando Envio">Aguardando Envio</option>
                                                <option <?php if ($result->status == 'Aguardando Entrega Correio') {
                                    echo 'selected'; } ?> value="Aguardando Entrega Correio">Aguardando Entrega Correio</option>
                                                <option <?php if ($result->status == 'Entregue - A Receber') {
                                    echo 'selected'; } ?> value="Entregue - A Receber">Entregue - A Receber</option>
                                                <option <?php if ($result->status == 'Garantia') {
                                    echo 'selected'; } ?> value="Garantia">Garantia</option>
                                                <option <?php if ($result->status == 'Abandonado') {
                                    echo 'selected'; } ?> value="Abandonado">Abandonado</option>
                                                <option <?php if ($result->status == 'Comprado pela Loja') {
                                    echo 'selected'; } ?> value="Comprado pela Loja">Comprado pela Loja</option>
                                                <option <?php if ($result->status == 'Entregue - Sem Reparo') {
                                    echo 'selected'; } ?> value="Entregue - Sem Reparo">Entregue - Sem Reparo</option>
                                                <option <?php if ($result->status == 'Entregue - Faturado') {
                                    echo 'selected'; } ?> value="Entregue - Faturado">Entregue - Faturado</option>
                                            </select>
<label for="rastreio">Rastreio</label>
<input name="rastreio" type="text" class="span12" id="rastreio" maxlength="13" value="<?php echo $result->rastreio ?>" />
<a style="margin-right:5px; margin-bottom:5px" href="https://www.linkcorreios.com.br/<?php echo $result->rastreio ?>" title="Rastrear" target="_new" class="btn btn-warning"><i class="fas fa-envelope"></i> Rastrear</a>




<button style="margin-right:5px; margin-bottom:5px"  class="btn btn-primary" title="Atualizar" id="btnContinuar"><i class="fas fa-sync-alt"></i> Atualizar</button>
                                        </div>

<div class="span3">
<label for="dataInicial">Data de Entrtada<span class="required">*</span></label>
<!--
<input id="dataInicial" autocomplete="off" class="span12 datepicker" type="text" name="dataInicial" value="<?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>" />-->
<input id="dataInicial" autocomplete="off" class="span12" type="date" name="dataInicial" value="<?php echo $result->dataInicial; ?>" />

<label for="dataFinal">Data Final<span class="required">*</span></label>
<!--
<input id="dataFinal" autocomplete="off" class="span12 datepicker" type="date" name="dataFinal" value="<?php echo date('d/m/Y', strtotime($result->dataFinal)); ?>" />-->
<input id="dataFinal" autocomplete="off" class="span12" type="date" name="dataFinal" value="<?php echo $result->dataFinal; ?>" />
</div>

<div class="span3">
<label for="serial">Nº Série</label>
<input id="serial" type="text" class="span12" name="serial" maxlength="30" value="<?php echo $result->serial ?>" />
<label for="dataSaida">Data de Saida</label>
<!--
<input id="dataSaida" autocomplete="off" class="span12 datepicker" type="date" name="dataSaida" value="<?php echo $result->dataSaida ?>" />-->
<input id="dataSaida" autocomplete="off" class="span12" type="date" name="dataSaida" value="<?php echo $result->dataSaida; ?>" />
</div>

<div class="span3">
<label for="marca">Marca</label>
<input id="marca" type="text" class="span12" name="marca" maxlength="30" value="<?php echo $result->marca ?>" />
<label for="garantia">Garantia até</label>
<!--
<input id="garantia" type="date" class="span12 datepicker" name="garantia" value="<?php echo $result->garantia ?>" />-->
<input id="garantia" autocomplete="off" class="span12" type="date" name="garantia" value="<?php echo $result->garantia; ?>" />
</div>
</div>


<div class="span12" style="padding: 1%; margin-left: 0">
<div class="span6">
                                        <label for="descricaoProduto"><h4>Descrição Produto/Serviço</h4></label>
                                        <textarea class="span12 editor" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"><?php echo $result->descricaoProduto ?></textarea>
                                        <label for="observacoes"><h4>Observações</h4></label>
                                        <textarea class="span12 editor" name="observacoes" id="observacoes" cols="30" rows="5"><?php echo $result->observacoes ?></textarea>
</div>

<div class="span6">
                                        <label for="defeito"><h4>Problema Informado</h4></label>
                                        <textarea class="span12 editor" name="defeito" id="defeito" cols="30" rows="5"><?php echo $result->defeito ?></textarea>
                                        <label for="laudoTecnico"><h4>Relatório Técnico</h4></label>
                                        <textarea class="span12 editor" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5"><?php echo $result->laudoTecnico ?></textarea>
</div>
<!-- Botoes de Ação -->
&nbsp;
<div class="form_actions_2" align="center">

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Voltar" class="button_mini btn btn-mini btn-warning tip-top" href="<?php echo base_url() ?>index.php/os">
<span class="button_icon"><i class='fas fa-undo-alt'></i></span><span class="button_text">Voltar</span></a>

<?php if ($result->faturado == 0) { ?>
<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Faturar" class="button_mini btn btn-mini btn-danger tip-top" id="btn-faturar" href="#modal-faturar" data-toggle="modal">
<span class="button_icon"><i class='fas fa-cash-register'></i></span><span class="button_text">Faturar</span></a>
<?php } ?>

<button style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" class="button_mini btn btn-primary tip-top" id="btnContinuar" title="Atualizar" >
<span class="button__icon"><i class="bx bx-sync"></i></span><span class="button__text2">Atualizar</span>
</button>

<!--
<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Visualizar OS" class="button_mini btn btn-mini btn-primary tip-top" target="new" href="<?php echo base_url() ?>index.php/os/visualizar/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-eye'></i></span><span class="button_text">Visualizar OS</span></a>
-->

<!--
<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Enviar WhatsApp" class="button_mini btn btn-mini btn-success tip-top" id="btn-whatsapp" href="#modal-whatsapp" data-toggle="modal">
<span class="button_icon"><i class='fab fa-whatsapp'></i></span><span class="button_text">WhatsApp</span></a>
-->

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Imprimir" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/os/imprimir/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir A4</span></a>

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Imprimir Termica" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/os/imprimirTermica/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir Termica</span></a>

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Imprimir Termica 2" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/os/imprimirTermica2/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir Termica 2</span></a>

</div>
<!-- Fim Botoes de Ação -->
</div>

</div>
</form>
</div>
<!-- Fim Detalhes da OS -->

<!-- Desconto -->
                        <?php
                        $total = 0;
                        foreach ($produtos as $p) {
                            $total = $total + $p->subTotal;
                        }
                        ?>
                        <?php
                        $totals = 0;
                        foreach ($servicos as $s) {
                            $preco = $s->preco ?: $s->precoVenda;
                            $subtotals = $preco * ($s->quantidade ?: 1);
                            $totals = $totals + $subtotals;
                        }
                        ?>

<div id="tab2" class="tab-pane fade" style="min-height: 360px">
<div class="widget_os_2" id="divCadastrarOs">
<div class="widget_os">
<h2></h2>
</div>

<div class="span12 well" style="margin-left: 0">

<form id="formDesconto" action="<?php echo base_url(); ?>index.php/os/adicionarDesconto" method="POST">
<div id="divValorTotal">
<div class="span2">
<label>Valor Total Da OS:</label>
<input type="text" class="span12 money" value="<?php echo number_format($totals + $total, 2, ',', '.'); ?>" readonly="readonly"/>
</div>
<div class="span2 hide">
<label for="">Valor Total Da OS:</label>
<input class="span12 money" id="valorTotal" name="valorTotal" type="text" data-affixes-stay="true" data-thousands="" data-decimal="." name="valor" value="<?php echo number_format($totals + $total, 2, '.', ''); ?>" readonly />
</div>
</div>
<div class="span2">
<input type="hidden" name="idOs" id="idOs" value="<?php echo $result->idOs; ?>" />
<label for="">Desconto em R$</label>
<input id="desconto" name="desconto" type="text" class="span12 money" placeholder="R$" value="<?php echo number_format($result->desconto, 2, ',', '.'); ?>"/>
<strong><span style="color: red" id="errorAlert"></span></strong>
</div>
<div class="span2">
<label for="">Total com Desconto</label>
<input class="span12 money" id="resultado" type="text" data-affixes-stay="true" data-thousands="" data-decimal="." name="resultado" value="<?php echo number_format($result->valor_desconto, 2, ',', '.'); ?>" readonly />

</div>
<div class="span2">
<label for="">&nbsp;</label>
<button class="button_mini btn btn-success" id="btnAdicionarDesconto">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Aplicar</span>
</button>
</div>
</form>

</div>

</div>
</div>
<!-- Fim Desconto -->

<!-- Produtos -->
<div id="tab3" class="tab-pane fade" style="min-height: 360px">
<div class="widget_os_2" id="divCadastrarOs">
<div class="widget_os">
<h2></h2>
</div>

<div class="span12 well" style="margin-left: 0; ">
<form id="formProdutos" action="<?php echo base_url() ?>index.php/os/adicionarProduto" method="post">
                                    <div class="span6">
                                        <input type="hidden" name="idProduto" id="idProduto" />
                                        <input type="hidden" name="idOsProduto" id="idOsProduto"
                                            value="<?php echo $result->idOs; ?>" />
                                        <input type="hidden" name="estoque" id="estoque" value="" />
                                        <label for="">Produto</label>
                                        <input type="text" class="span12" name="produto" id="produto"
                                            placeholder="Digite o nome do produto" />
                                    </div>
                                    <div class="span2">
                                        <label for="">Preço</label>
                                        <input type="text" placeholder="Preço" id="preco" name="preco"
                                            class="span12 money" data-affixes-stay="true" data-thousands=""
                                            data-decimal="." />
                                    </div>
                                    <div class="span2">
                                        <label for="">Quantidade</label>
                                        <input type="text" placeholder="Quantidade" id="quantidade" name="quantidade"
                                            class="span12" />
                                    </div>
                                    <div class="span2">
                                        <label for="">&nbsp;</label>
                                        <button title="Adicionar Produto" class="button_mini btn btn-mini btn-success tip-top" id="btnAdicionarProduto">
                                        <span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar Produto</span>
                                        </button>
                                    </div>
                                </form>
</div>

<div class="span12" style="margin-left: 0" id="divProdutos">
<div class="well_2">
                                    <table width="100%" class="table_y" id="tblProdutos">
                                        <thead>
                                            <tr>
                                                <th width="10%">Cod. Produto</th>
                                                <th>Produto</th>
                                                <th width="8%">Quantidade</th>
                                                <th width="10%">Preço unit.</th>
                                                <th width="6%">Ações</th>
                                                <th width="10%">Sub-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $total = 0;
                                    foreach ($produtos as $p) {
                                        $total = $total + $p->subTotal;
                                        echo '<tr>';
                                        echo '<td align="center">' . $p->idProdutos . '</td>';
                                        echo '<td>' . $p->descricao . '</td>';
                                        echo '<td align="center">' . $p->quantidade . '</td>';
                                        echo '<td align="center">R$: ' . ($p->preco ?: $p->precoVenda)  . '</td>';
                                        echo '<td align="center"><a href="" idAcao="' . $p->idProdutos_os . '" prodAcao="' . $p->idProdutos . '" quantAcao="' . $p->quantidade . '" title="Excluir Produto" class="btn-nwe4 tip-top"><i class="fas fa-trash"></i></a></td>';
                                        echo '<td align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                        echo '</tr>';
                                    } ?>
                                            <tr>
                                                <td colspan="5" style="text-align: right"><strong>Total:</strong></td>
                                                <td><strong>
                                                        <div align="center">R$:
                                                            <?php echo number_format($total, 2, ',', '.'); ?><input
                                                                type="hidden" id="total-venda"
                                                                value="<?php echo number_format($total, 2); ?>">
                                                    </strong>
                                </div>
                                </td>
                                </tr>
                                </tbody>
                                </table>
</div>
</div>

</div>
</div>
<!-- Fim Produtos -->

<!-- Serviços -->
<div id="tab4" class="tab-pane fade" style="min-height: 360px">
<div class="widget_os_2" id="divCadastrarOs">
<div class="widget_os">
<h2></h2>
</div>

<div class="span12 well" style="margin-left: 0">
                            <form id="formServicos" action="<?php echo base_url() ?>index.php/os/adicionarServico"
                                method="post">
                                <div class="span6">
                                    <input type="hidden" name="idServico" id="idServico" />
                                    <input type="hidden" name="idOsServico" id="idOsServico"
                                        value="<?php echo $result->idOs; ?>" />
                                    <label for="">Serviço</label>
                                    <input type="text" class="span12" name="servico" id="servico"
                                        placeholder="Digite o nome do serviço" />
                                </div>
                                <div class="span2">
                                    <label for="">Preço</label>
                                    <input type="text" placeholder="Preço" id="preco_servico" name="preco"
                                        class="span12 money" data-affixes-stay="true" data-thousands=""
                                        data-decimal="." />
                                </div>
                                <div class="span2">
                                    <label for="">Quantidade</label>
                                    <input type="text" placeholder="Quantidade" id="quantidade_servico"
                                        name="quantidade" class="span12" />
                                </div>
                                <div class="span2">
                                    <label for="">&nbsp;</label>
                                    <button title="Adicionar Serviço" class="button_mini btn btn-mini btn-success tip-top">
                                    <span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar Serviço</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        
<div class="span12" style="margin-left: 0" id="divServicos">
<div class="well_2">
                                <table width="100%" class="table_y">
                                    <thead>
                                        <tr>
                                            <th>Serviço</th>
                                            <th width="8%">Quantidade</th>
                                            <th width="10%">Preço</th>
                                            <th width="6%">Ações</th>
                                            <th width="10%">Sub-totals</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $totals = 0;
                                            foreach ($servicos as $s) {
                                                $preco = $s->preco ?: $s->precoVenda;
                                                $subtotals = $preco * ($s->quantidade ?: 1);
                                                $totals = $totals + $subtotals;
                                                echo '<tr>';
                                                echo '<td>' . $s->nome . '</td>';
                                                echo '<td align="center">' . ($s->quantidade ?: 1) . '</div></td>';
                                                echo '<td align="center">R$: ' . $preco  . '</div></td>';
                                                echo '<td align="center"><span idAcao="' . $s->idServicos_os . '" title="Excluir Serviço" class="btn-nwe4 tip-top servico"><i class="fas fa-trash"></i></span></div></td>';
                                                echo '<td align="center">R$: ' . number_format($subtotals, 2, ',', '.') . '</div></td>';
                                                echo '</tr>';
                                            } ?>
                                        <tr>
                                            <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>
                                                    <div align="center">R$:
                                                        <?php echo number_format($totals, 2, ',', '.'); ?><input
                                                            type="hidden" id="total-servico" value="
												<?php echo number_format($totals, 2); ?>">
                                                </strong>
                            </div>
                            </td>
                            </tr>
                            </tbody>
                            </table>
</div>
</div>

</div>
</div>
<!-- Fim Serviços -->

<!-- Anexos -->
<div id="tab5" class="tab-pane fade" style="min-height: 360px">
<div class="widget_os_2" id="divCadastrarOs">
<div class="widget_os">
<h2></h2>
</div>

<div class="span12 well" style="margin-left: 0">
                     <form id="formAnexos" enctype="multipart/form-data" action="javascript:;" accept-charset="utf-8" method="post">
                                <div class="span10">
                                    <label for="">Anexos</label>
                                    <input type="hidden" name="idOsServico" id="idOsServico" value="<?php echo $result->idOs; ?>" />
                                	<input type="file" class="span12" name="userfile[]" multiple />
                                    <label for="">&nbsp;</label>
                                    <button title="Anexar" class="button_mini btn btn-mini btn-success tip-top">
                                    <span class="button_icon"><i class='fas fa-paperclip'></i></span><span class="button_text">Anexar</span>
                                    </button>
                                </div>
                            </form>
</div>
                    
<div class="span12" id="divAnexos" style="margin-left: 0" >
<div class="span12 well_3">
<?php
	foreach ($anexos as $a) {
		if ($a->thumb == null) {
			$thumb = base_url() . 'assets/img/icon-file.png';
			$link = base_url() . 'assets/img/icon-file.png';
	  } else {
			$thumb = $a->url . '/thumbs/' . $a->thumb;
			$link = $a->url . '/' . $a->anexo;
			$NomeAnexo = mb_strimwidth(strip_tags($a->anexo), 0, 20, "...");
			}
		 echo '<div class="grade" style=" margin-bottom:5px; margin-left:1%;">
		 <a style="min-height:210px; border: 1px solid #bbbbbb;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal">
		<img src="' . $thumb . '" alt="">
		</a>
		<span>' . $NomeAnexo . '</span>
		</div>';
		} ?>
</div>
</div>

</div>
</div>
<!-- Fim Anexos -->

<!--Anotações -->
<div id="tab6" class="tab-pane fade" style="min-height: 360px">
<div class="widget_os_2" id="divCadastrarOs">
<div class="widget_os">
<h2></h2>
</div>

<div class="span12 well" style="margin-left: 0">
<a href="#modal-anotacao" title="Adicionar Anotação" data-toggle="modal" class="button_mini btn btn-mini btn-success tip-top" id="btn-anotacao">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar Anotação</span></a>
</div>

<div class="span12" style="margin-left: 0" id="divAnotacoes">
<div class="well_2">

<table width="100%" class="table_y">
                                <thead>
                                    <tr>
                                        <th width="73%">Anotação</th>
                                        <th width="20%">Data/Hora</th>
                                        <th width="7%">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
                                            date_default_timezone_set('America/Sao_Paulo');
                                            // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
                                            $dataLocal = date('d/m/Y H:i:s', time());
                                            foreach ($anotacoes as $a) {
                                                echo '<tr>';
                                                echo '<td>' . $a->anotacao . '</td>';
                                                echo '<td align="center">' . date('d/m/Y H:i:s', strtotime($a->data_hora))  . '</div></td>';
                                                echo '<td align="center"><span idAcao="' . $a->idAnotacoes . '" title="Excluir Anotação" class="btn-nwe4 tip-top anotacao"><i class="fas fa-trash"></i></span></div></td>';
                                                echo '</tr>';
                                            }
                                            if (!$anotacoes) {
                                                echo '<tr><td colspan="3">Nenhuma anotação cadastrada</td></tr>';
                                            }

                                            ?>
                                </tbody>
                            </table>
</div>
</div>

</div>
</div>
<!-- Fim Anotações -->

<!-- Equipamentos -->
<div id="tab7" class="tab-pane fade" style="min-height: 360px">
<div class="widget_os_2" id="divCadastrarOs">
<div class="widget_os">
<h2></h2>
</div>

<div class="span12 well" style="margin-left: 0">
<a href="#modal-equipamento" title="Adicionar Equipamento" data-toggle="modal" class="button_mini btn btn-mini btn-success tip-top" id="btn-equipamento">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar Equipamento</span></a>
</div>

<div class="span12" style="margin-left: 0" id="divEquipamento">
<div class="well_2">
<table width="100%" class="table_y">
                                <thead>
                                    <tr>
                                        <th>Equipamento</th>
                                        <th>Marca</th>
                                        <th>Tipo</th>
                                        <th>Nº Serie</th>
                                        <th>Modelo</th>
                                        <th>Cor</th>
                                        <th>Voltagem</th>
                                        <th>Potência</th>
                                        <th>Obs:</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            foreach ($equipamentos as $x) {
                                                echo '<tr>';
                                                echo '<td align="center">' . $x->equipamento . '</div></td>';
                                                echo '<td align="center">' . $x->marca . '</div></td>';
                                                echo '<td align="center">' . $x->tipo . '</div></td>';
                                                echo '<td align="center">' . $x->num_serie . '</div></td>';
                                                echo '<td align="center">' . $x->modelo . '</div></td>';
                                                echo '<td align="center">' . $x->cor . '</div></td>';
                                                echo '<td align="center">' . $x->voltagem . '</div></td>';
                                                echo '<td align="center">' . $x->potencia . '</div></td>';
                                                echo '<td align="center">' . $x->observacao . '</div></td>';
                                                echo '<td align="center"><span idAcao="' . $x->idEquipamento . '" title="Excluir Equipamento" class="btn-nwe4 tip-top equipamento"><i class="fas fa-trash"></i></span></div></td>';
                                                echo '</tr>';
                                            }
                                            if (!$equipamentos) {
                                                echo '<tr><td colspan="10">Nenhum Equipamento cadastrado</td></tr>';
                                            }

                                            ?>
                                </tbody>
                            </table>
</div>
</div>

</div>
</div>
<!-- Fim Equipamentos -->


</div>

</div>

</div>
</div>


<!-- Visualizar Anexo -->
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Visualizar Anexo</h5>
</div>

<div class="modal-body">
<div class="span12" id="div-visualizar-anexo" style="text-align: center">
<div class='progress progress-info progress-striped active'>
<div class='bar' style='width: 100%'></div>
</div>
</div>
</div>

<div class="form_actions" align="center">
        <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
        <a href="" link="" class="btn btn-danger" id="excluir-anexo">Excluir Anexo</a>
</div>
</div>
<!-- Fim Visualizar Anexo -->

<!-- Cadastro de Anotações -->
<div id="modal-anotacao" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="#" method="POST" id="formAnotacao">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Adicionar Anotação</h5>
</div>

<div class="modal-body">
<div class="span12">
<textarea class="span12 editor" name="anotacao" id="anotacao" cols="30" rows="3"></textarea>
<input type="hidden" name="os_id" value="<?php echo $result->idOs; ?>">
</div>
</div>

<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" id="btn-close-anotacao" data-dismiss="modal" aria-hidden="true">
<span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Fechar</span>
</button>
<button class="button_mini btn btn-mini btn-success tip-top"><span class="button_icon"><i class="fas fa-plus-circle"></i></span><span class="button_text">Adicionar</span></button>
</div>
</form>
</div>
<!-- Fim Cadastro de Anotaçõe -->

<!-- Cadastro de Equipamentos -->
<div id="modal-equipamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="#" method="POST" id="formEquipamento">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Adicionar Equipamento</h5>
</div>

<div class="modal-body">
<div class="span6" style="margin-left: 0">
                <label for="equipamentos">Equipamento<span class="required">*</span></label>
                <input name="equipamento" type="text" class="span12" id="equipamento" value="" />
            </div>
            <div class="span6">
                <label for="marca">Marca</label>
                <input name="marca" type="text" class="span12" id="equipamento" value="" />
            </div>
            <div class="span6" style="margin-left: 0">
                <label for="modelo">Modelo</label>
                <input name="modelo" type="text" class="span12" id="equipamento" value="" />
            </div>
            <div class="span6">
                <label for="cor">Cor</label>
                <input name="cor" type="text" class="span12" id="equipamento" value="" />
            </div>
            <div class="span6" style="margin-left: 0">
                <label for="tipo">Tipo</label>
                <input name="tipo" type="text" class="span12" id="equipamento" value="" />
            </div>
            <div class="span6">
                <label for="num_serie">Nº Serie</label>
                <input name="num_serie" type="text" class="span12" id="equipamento" value="" />
            </div>
            <div class="span6" style="margin-left: 0">
                <label for="voltagem">Voltagem</label>
                <input name="voltagem" type="text" class="span12" id="equipamento" value="" />
            </div>
            <div class="span6">
                <label for="potencia">Potência</label>
                <input name="potencia" type="text" class="span12" id="equipamento" value="" />
            </div>
            <div class="span12" style="margin-left: 0">
                <label for="observacao">Observação</label>
                <input name="observacao" type="text" class="span12" id="equipamento" value="" />
                <input type="hidden" name="os_id" value="<?php echo $result->idOs; ?>">
            </div>
</div>

<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" id="btn-close-equipamento" data-dismiss="modal" aria-hidden="true">
<span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Fechar</span>
</button>
<button class="button_mini btn btn-mini btn-success tip-top">
<span class="button_icon"><i class="fas fa-plus-circle"></i></span><span class="button_text">Adicionar</span>
</button>
</div>
</form>
</div>
<!-- Fim Cadastro de Equipamentos -->


<!-- Modal Faturar-->
<div id="modal-faturar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form id="formFaturar" action="<?php echo current_url() ?>" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Faturar OS</h5>
</div>

<div class="modal-body">
            <div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
      <div class="span12" style="margin-left: 0">
        <label for="descricao">Descrição</label>
          <input name="descricao" type="text" class="span12" id="descricao" value="Fatura da OS: <?php echo $result->idOs; ?> " readonly="readonly" />
        </div>
            <div class="span12" style="margin-left: 0">
                <div class="span12" style="margin-left: 0">
                    <label for="cliente">Cliente*</label>
                    <input name="cliente" type="text" class="span12" id="cliente" value="<?php echo $result->nomeCliente ?>" readonly="readonly" />
                    <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
                    <input type="hidden" name="os_id" id="os_id" value="<?php echo $result->idOs; ?>">
                </div>
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span6" style="margin-left: 0">
                    <label for="valor">Valor*</label>
                    <input type="hidden" id="tipo" name="tipo" value="receita" />
                    <input name="valor" type="text" class="span12 money" id="valor" value="<?php echo number_format($totals + $total, 2, ',', '.'); ?>" data-affixes-stay="true" data-thousands="" data-decimal="." />
                </div>
                <div class="span6" style="margin-left: 2;">
                    <label for="valor">Valor Com Desconto*</label>
                    <input name="faturar-desconto" type="text" class="span12 money" id="faturar-desconto" value="<?php echo number_format($result->valor_desconto, 2, ',', '.'); ?> " readonly="readonly" />
                    <strong><span style="color: red" id="resultado"></span></strong>
                </div>
            </div>
            <div class="span12 hide" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="vencimento">Data Entrada</label>
                    <input class="span12" autocomplete="off" id="vencimento" type="date" name="vencimento" value="<?php echo date('Y-m-d'); ?>"/>
                    <input id="recebido" name="recebido" value="1" />
                </div>
            </div>
            <div class="span12" style="margin-left: 0">

                  <div class="span6">
                        <label for="recebimento">Data do Pagamento</label>
                        <input class="span12" autocomplete="off" id="recebimento" type="date" name="recebimento" value="<?php echo date('Y-m-d'); ?>" />
                    </div>
                    <div class="span6">
                        <label for="formaPgto">Forma Pgto</label>
                        <select name="formaPgto" id="formaPgto" class="span12">
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Débito">Débito</option>
                            <option value="Boleto">Boleto</option>
                            <option value="Depósito">Depósito</option>
                            <option value="Pix">Pix</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                    </div>


      </div>
    </div>

<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" id="btn-cancelar-faturar" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
<button class="button_mini btn btn-primary"><span class="button_icon"><i class="fas fa-sync-alt"></i></span><span class="button_text">Faturar</span></button>
</div>
</form>
</div>
<!-- Fim Modal Faturar -->


<!-- Faturar - Entregue - Sem Reparo -->
<div id="modal-entregue" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form id="formfaturarEntregueSemReparo" action="<?php echo current_url() ?>" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Faturar OS - Entregue - Sem Reparo</h5>
</div>

<div class="modal-body">
<div class="span12" style="margin-left: 0">
                <label for="descricao">Descrição</label>
                <input readonly="readonly" name="descricao" type="text" class="span12" id="descricao"
                    value="OS Nº: <?php echo $result->idOs; ?> - Entregue - Sem Reparo" />
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span12" style="margin-left: 0">
                    <label for="cliente">Cliente</label>
                    <input readonly="readonly" name="cliente" type="text" class="span12" id="cliente"
                        value="<?php echo $result->nomeCliente ?>" />
                    <input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
                    <input type="hidden" name="os_id" id="os_id" value="<?php echo $result->idOs; ?>">
                </div>
            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span5" style="margin-left: 0">
                    <label for="valor">Valor</label>
                    <input type="hidden" id="tipo" name="tipo" value="receita" />

                    <input readonly="readonly" name="valor" type="text" class="span12" id="valor" value="0,00"
                        data-affixes-stay="true" data-thousands="" data-decimal="." />
                </div>

            </div>
            <div class="span12" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="vencimento">Data Saida</label>
                    <input readonly="readonly" name="vencimento" type="date" class="span12 datepicker" id="vencimento"
                        autocomplete="off" value="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <div class="span12 hide" style="margin-left: 0">
                <div class="span4" style="margin-left: 0">
                    <label for="recebimento">Data Recebimento</label>
                    <input name="recebimento" type="date" class="span12 datepicker" id="recebimento" autocomplete="off"
                        value="<?php echo date('Y-m-d'); ?>" />
                    <input id="recebido" name="recebido" value="1" />
                </div>
            </div>
</div>

<div class="form_actions" align="center">
<button class="button_mini btn btn-primary"><span class="button_icon"><i class="fas fa-sync-alt"></i></span><span class="button_text">Faturar</span></button>
<button class="button_mini btn btn-warning"  data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
</div>
</form>
</div>
<!-- Fim Faturar - Entregue - Sem Reparo -->


<!-- Modal WhatsApp -->
<div id="modal-whatsapp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo base_url() ?>index.php/produtos/atualizar_estoque" method="post" id="formEstoque">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Enviar WhatsApp</h5>
</div>

<div class="modal-body">
<div class="span12" style="margin-left: 0">
<font size='2'>Prezado(a) <b><?php echo $result->nomeCliente ?></b>
                    <br><br>
                    <div>Sua <b>O.S <?php echo $result->idOs ?></b> referente ao equipamento
                        <b><?php echo $result->descricaoProduto ?></b> foi atualizada para
                        <b><?php echo $result->status ?></b>
                    </div>
                    <br>
                    <?php echo $result->defeito ?>
                    <br><br>
                    <?php echo $result->observacoes ?>
                    <br><br>
                    <?php echo $result->laudoTecnico ?>
                    <br><br>
                    <div>Valor Total <b>R$: <?php echo number_format($totals + $total, 2, ',', '.') ?></b></div>
                    <br>
                    <?php echo $configuration['whats_app1'] ?>
                    <br><br>
                    <div>Atenciosamente <b><?php echo $configuration['whats_app2'] ?></b> -
                        <b><?php echo $configuration['whats_app3'] ?></b>
                    </div>
                </font>
</div>
</div>
<div class="form_actions" align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
	$zapnumber = preg_replace("/[^0-9]/", "", $result->celular_cliente);
	$totalOS = number_format($totals + $total, 2, ',', '.');
	echo '<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 200px" title="Enviar Por WhatsApp" class="button_mini btn btn-mini btn-success tip-top" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $result->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $result->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($result->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $result->status . '*.%0d%0a%0d%0a' . strip_tags($result->defeito) . '%0d%0a%0d%0a' . strip_tags($result->observacoes) . '%0d%0a%0d%0a' . strip_tags($result->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20*R$&#58%20'. $totalOS . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] . '">
<span class="button_icon"><i class="fab fa-whatsapp"></i></span><span class="button_text">Enviar Por WhatsApp</span></a>'
; } ?>
</div>
</form>
</div>
<!-- Fim Modal WhatsApp -->


<!-- Modal WhatsApp 2 -->
<div id="modal-whatsapp-2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo base_url() ?>index.php/produtos/atualizar_estoque" method="post" id="formEstoque">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Enviar WhatsApp</h5>
</div>

<div class="modal-body">
<div class="span12" style="margin-left: 0">
<font size='2'>Prezado(a) <b><?php echo $result->nomeCliente ?></b>
                    <br><br>
                    <div>Sua <b>O.S <?php echo $result->idOs ?></b> referente ao equipamento
                        <b><?php echo $result->descricaoProduto ?></b> foi atualizada para
                        <b><?php echo $result->status ?></b>
                    </div>
                    <br>
                    <?php echo $result->defeito ?>
                    <br><br>
                    <?php echo $result->observacoes ?>
                    <br><br>
                    <?php echo $result->laudoTecnico ?>
                    <br><br>
                    <div>Valor Total <b>R$: <?php echo number_format($totals + $total, 2, ',', '.') ?></b></div>
                    <br>
                    <?php echo $configuration['whats_app1'] ?>
                    <br><br>
                    <div>Atenciosamente <b><?php echo $configuration['whats_app2'] ?></b> -
                        <b><?php echo $configuration['whats_app3'] ?></b>
                    </div>
                    <br>
                    <div>Acesse a área do cliente pelo link <font color='#1E90FF'>
                            <?php echo $configuration['whats_app4'] ?></font>
                    </div>
                    <div>E utilize estes dados para fazer Log-In.
                        <br>Email: <b><?php echo $result->email ?></b>
                        <br>Senha: <b><?php echo $result->senha ?></b>
                    </div>
                    <div>Você poderá edita-los no menu <b>Minha Conta</b></div>
                    <br>
                </font>
</div>
</div>
<div class="form_actions" align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
	$zapnumber = preg_replace("/[^0-9]/", "", $result->celular_cliente);
	$totalOS = number_format($totals + $total, 2, ',', '.');
	echo '<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 200px" title="Enviar Por WhatsApp" class="button_mini btn btn-mini btn-success tip-top" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $result->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $result->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($result->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $result->status . '*.%0d%0a%0d%0a' . strip_tags($result->defeito) . '%0d%0a%0d%0a' . strip_tags($result->observacoes) . '%0d%0a%0d%0a' . strip_tags($result->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20*R$&#58%20'. $totalOS . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . strip_tags($result->email) . '*%0d%0aSenha:%20*' . strip_tags($result->senha) . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*">
<span class="button_icon"><i class="fab fa-whatsapp"></i></span><span class="button_text">Enviar Por WhatsApp</span></a>'
; } ?>
</div>
</form>
</div>
<!-- Fim Modal WhatsApp 2 -->


<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>

<script type="text/javascript">
    function calcDesconto(valor, desconto) {

        var resultado = (valor - desconto).toFixed(2);
        return resultado;
    }

    function validarDesconto(resultado, valor) {
        if (resultado == valor) {
            return resultado = "";
        } else {
            return resultado.toFixed(2);
        }
    }
    var valorBackup = $("#valorTotal").val();

    $("#quantidade").keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });

    $("#quantidade_servico").keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });

    $("#desconto").keyup(function() {

        this.value = this.value.replace(/[^0-9.]/g, '');
        if ($('#desconto').val() > $("#valorTotal").val()) {
            $('#errorAlert').text('Desconto não pode ser maior que o total.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $("#desconto").focus();
        }
        if ($("#valorTotal").val() == null || $("#valorTotal").val() == '') {
            $('#errorAlert').text('Valor não pode ser apagado.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $('#resultado').val('');
            $("#valorTotal").val(valorBackup);
            $("#desconto").focus();

        } else if (Number($("#desconto").val()) >= 0) {
            $('#resultado').val(calcDesconto(Number($("#valorTotal").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#valorTotal").val())));
        } else {
            $('#errorAlert').text('Erro desconhecido.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $('#resultado').val('');
        }
    });

    $("#valorTotal").focusout(function() {
        $("#valorTotal").val(valorBackup);
        if ($("#valorTotal").val() == '0.00' && $('#resultado').val() != '') {
            $('#errorAlert').text('Você não pode apagar o valor.').css("display", "inline").fadeOut(6000);
            $('#resultado').val('');
            $("#valorTotal").val(valorBackup);
            $('#resultado').val(calcDesconto(Number($("#valorTotal").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#valorTotal").val())));
            $("#desconto").focus();
        } else {
            $('#resultado').val(calcDesconto(Number($("#valorTotal").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#valorTotal").val())));
        }
    });

    $('#resultado').focusout(function() {
        if (Number($('#resultado').val()) > Number($("#valorTotal").val())) {
            $('#errorAlert').text('Desconto não pode ser maior que o Valor.').css("display", "inline").fadeOut(6000);
            $('#resultado').val('');
        }
        if ($("#desconto").val() != "" || $("#desconto").val() != null) {
            $('#resultado').val(calcDesconto(Number($("#valorTotal").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#valorTotal").val())));
        }
    });

	$(document).ready(function() {

        $(".money").maskMoney();

        $('#recebido').click(function(event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divRecebimento').show();
            } else {
                $('#divRecebimento').hide();
            }
        });

        $("#formFaturar").validate({
            rules: {
                descricao: {
                    required: true
                },
                cliente: {
                    required: true
                },
                valor: {
                    required: true
                },
                vencimento: {
                    required: true
                }

            },
            messages: {
                descricao: {
                    required: 'Campo Requerido.'
                },
                cliente: {
                    required: 'Campo Requerido.'
                },
                valor: {
                    required: 'Campo Requerido.'
                },
                vencimento: {
                    required: 'Campo Requerido.'
                }
            },
            submitHandler: function(form) {
                var dados = $(form).serialize();
                var qtdProdutos = $('#tblProdutos >tbody >tr').length;
                var qtdServicos = $('#tblServicos >tbody >tr').length;
                var qtdTotalProdutosServicos = qtdProdutos + qtdServicos;

                $('#btn-cancelar-faturar').trigger('click');

                if (qtdTotalProdutosServicos <= 0) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: "Não é possível faturar uma OS sem serviços e/ou produtos"
                    });
                } else if (qtdTotalProdutosServicos > 0) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/os/faturar",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                window.location.reload(true);
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Atenção",
                                    text: "Ocorreu um erro ao tentar faturar OS."
                                });
                                $('#progress-fatura').hide();
                            }
                        }
                    });

                    return false;
                }
            }
        });

    $("#formfaturarEntregueSemReparo").validate({
        rules: {
            vencimento: {
                required: true
            }

        },
        messages: {
            vencimento: {
                required: 'Campo Requerido.'
            }
        },
        submitHandler: function(form) {
            var dados = $(form).serialize();
            $('#btn-cancelar-faturarEntregueSemReparo').trigger('click');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/os/faturarEntregueSemReparo",
                data: dados,
                dataType: 'json',
                success: function(data) {
                    if (data.result == true) {

                        window.location.reload(true);
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: "Ocorreu um erro ao tentar faturar OS."
                        });
                        $('#progress-fatura').hide();
                    }
                }
            });

            return false;
        }
    });

        $('#formDesconto').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                beforeSend: function() {
                    Swal.fire({
                        title: 'Processando',
                        text: 'Registrando desconto...',
                        icon: 'info',
                        showCloseButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    });
                },
                success: function(response) {
                    if (response.result) {
                        Swal.fire({
                            type: "success",
                            title: "Sucesso",
                            text: response.messages
                        });
                        setTimeout(function() {
                            window.location.href = window.BaseUrl + 'index.php/os/editar/' + <?php echo $result->idOs ?>;
                        }, 2000);
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: response.messages
                        });
                    }

                },
                error: function(response) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: response.responseJSON.messages
                    });
                }
            });
        });

    $("#produto").autocomplete({
        source: "<?php echo base_url(); ?>index.php/os/autoCompleteProduto",
        minLength: 2,
        select: function(event, ui) {
            $("#codDeBarra").val(ui.item.codbar);
            $("#idProduto").val(ui.item.id);
            $("#estoque").val(ui.item.estoque);
            $("#preco").val(ui.item.preco);
            $("#quantidade").focus();
        }
    });

    $("#servico").autocomplete({
        source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
        minLength: 2,
        select: function(event, ui) {
            $("#idServico").val(ui.item.id);
            $("#preco_servico").val(ui.item.preco);
            $("#quantidade_servico").focus();
        }
    });


    $("#cliente").autocomplete({
        source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
        minLength: 2,
        select: function(event, ui) {
            $("#clientes_id").val(ui.item.id);
        }
    });

    $("#tecnico").autocomplete({
        source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
        minLength: 2,
        select: function(event, ui) {
            $("#usuarios_id").val(ui.item.id);
        }
    });

    $("#termoGarantia").autocomplete({
        source: "<?php echo base_url(); ?>index.php/os/autoCompleteTermoGarantia",
        minLength: 1,
        select: function(event, ui) {
            if (ui.item.id) {
                $("#garantias_id").val(ui.item.id);
            }
        }
    });

    $('#termoGarantia').on('change', function() {
        if (!$(this).val() && $("#garantias_id").val()) {
            $("#garantias_id").val('');
            Swal.fire({
                type: "success",
                title: "Sucesso",
                text: "Termo de garantia removido"
            });
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

        $("#formProdutos").validate({
            rules: {
                preco: {
                    required: true
                },
                quantidade: {
                    required: true
                }
            },
            messages: {
                preco: {
                    required: 'Inserir o preço'
                },
                quantidade: {
                    required: 'Insira a quantidade'
                }
            },
            submitHandler: function(form) {
                var quantidade = parseInt($("#quantidade").val());
                var estoque = parseInt($("#estoque").val());

                <?php if (!$configuration['control_estoque']) {
                                                echo 'estoque = 1000000';
                                            }; ?>

                if (estoque < quantidade) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: "Você não possui estoque suficiente."
                    });
                } else {
                    var dados = $(form).serialize();
                    $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/os/adicionarProduto",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                                $("#quantidade").val('');
                                $("#preco").val('');
                                $("#resultado").val('');
                                $("#desconto").val('');
                                $("#divValorTotal").load("<?php echo current_url(); ?> #divValorTotal");
                                $("#produto").val('').focus();
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Atenção",
                                    text: "Ocorreu um erro ao tentar adicionar produto."
                                });
                            }
                        }
                    });
                    return false;
                }
            }
        });

        $("#formServicos").validate({
            rules: {
                servico: {
                    required: true
                },
                preco: {
                    required: true
                },
                quantidade: {
                    required: true
                },
            },
            messages: {
                servico: {
                    required: 'Insira um serviço'
                },
                preco: {
                    required: 'Insira o preço'
                },
                quantidade: {
                    required: 'Insira a quantidade'
                },
            },
            submitHandler: function(form) {
                var dados = $(form).serialize();

                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarServico",
                    data: dados,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                            $("#quantidade_servico").val('');
                            $("#preco_servico").val('');
                            $("#resultado").val('');
                            $("#desconto").val('');
                            $("#divValorTotal").load("<?php echo current_url(); ?> #divValorTotal");
                            $("#servico").val('').focus();
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar adicionar serviço."
                            });
                        }
                    }
                });
                return false;
            }
        });

    $("#formEquipamento").validate({
        rules: {
            equipamento: {
                required: true
            }
        },
        messages: {
            equipamento: {
                required: 'Insira o Equipamento'
            }
        },
        submitHandler: function(form) {
            var dados = $(form).serialize();
            $("#divFormEquipamento").html(
                "<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>"
            );

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/os/adicionarEquipamento",
                data: dados,
                dataType: 'json',
                success: function(data) {
                    if (data.result == true) {
                        $("#divEquipamento").load(
                            "<?php echo current_url(); ?> #divEquipamento");
                        $("#equipamento").val('');
                        $('#btn-close-equipamento').trigger('click');
                        $("#divFormEquipamento").html('');
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: "Ocorreu um erro ao tentar adicionar Equipamento."
                        });
                    }
                }
            });
            return false;
        }
    });

    $("#formAnotacao").validate({
        rules: {
            anotacao: {
                required: true
            }
        },
        messages: {
            anotacao: {
                required: 'Insira a anotação'
            }
        },
        submitHandler: function(form) {
            var dados = $(form).serialize();
            $("#divFormAnotacoes").html(
                "<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>"
            );

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/os/adicionarAnotacao",
                data: dados,
                dataType: 'json',
                success: function(data) {
                    if (data.result == true) {
                        $("#divAnotacoes").load(
                            "<?php echo current_url(); ?> #divAnotacoes");
                        $("#anotacao").val('');
                        $('#btn-close-anotacao').trigger('click');
                        $("#divFormAnotacoes").html('');
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: "Ocorreu um erro ao tentar adicionar anotação."
                        });
                    }
                }
            });
            return false;
        }
    });

    $("#formAnexos").validate({
        submitHandler: function(form) {
            //var dados = $( form ).serialize();
            var dados = new FormData(form);
            $("#form-anexos").hide('1000');
            $("#divAnexos").html(
                "<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>"
            );
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/os/anexar",
                data: dados,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(data) {
                    if (data.result == true) {
                        $("#divAnexos").load("<?php echo current_url(); ?> #divAnexos");
                        $("#userfile").val('');

                    } else {
                        $("#divAnexos").html(
                            '<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> ' +
                            data.mensagem + '</div>');
                    }
                },
                error: function() {
                    $("#divAnexos").html(
                        '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> Ocorreu um erro. Verifique se você anexou o(s) arquivo(s).</div>'
                    );
                }
            });
            $("#form-anexos").show('1000');
            return false;
        }
    });

        $(document).on('click', 'a', function(event) {
            var idProduto = $(this).attr('idAcao');
            var quantidade = $(this).attr('quantAcao');
            var produto = $(this).attr('prodAcao');
            var idOS = "<?php echo $result->idOs ?>"
            if ((idProduto % 1) == 0) {
                $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirProduto",
                    data: "idProduto=" + idProduto + "&quantidade=" + quantidade + "&produto=" + produto + "&idOs=" + idOS,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                            $("#divValorTotal").load("<?php echo current_url(); ?> #divValorTotal");
                            $("#resultado").val('');
                            $("#desconto").val('');

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar excluir produto."
                            });
                        }
                    }
                });
                return false;
            }

        });

        $(document).on('click', '.servico', function(event) {
            var idServico = $(this).attr('idAcao');
            var idOS = "<?php echo $result->idOs ?>"
            if ((idServico % 1) == 0) {
                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirServico",
                    data: "idServico=" + idServico + "&idOs=" + idOS,
                    data: "idServico=" + idServico,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                            $("#divValorTotal").load("<?php echo current_url(); ?> #divValorTotal");
                            $("#resultado").val('');
                            $("#desconto").val('');

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar excluir serviço."
                            });
                        }
                    }
                });
                return false;
            }
        });

    $(document).on('click', '.anexo', function(event) {
        event.preventDefault();
        var link = $(this).attr('link');
        var id = $(this).attr('imagem');
        var url = '<?php echo base_url(); ?>index.php/os/excluirAnexo/';
        $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
        $("#excluir-anexo").attr('link', url + id);

        $("#download").attr('href', "<?php echo base_url(); ?>index.php/os/downloadanexo/" + id);

    });

    $(document).on('click', '#excluir-anexo', function(event) {
        event.preventDefault();
        var link = $(this).attr('link');
        var idOS = "<?php echo $result->idOs ?>"
        $('#modal-anexo').modal('hide');
        $("#divAnexos").html(
            "<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>"
        );

        $.ajax({
            type: "POST",
            url: link,
            dataType: 'json',
            data: "idOs=" + idOS,
            success: function(data) {
                if (data.result == true) {
                    $("#divAnexos").load("<?php echo current_url(); ?> #divAnexos");
                } else {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: data.mensagem
                    });
                }
            }
        });
    });

    $(document).on('click', '.equipamento', function(event) {
        var idEquipamento = $(this).attr('idAcao');
        var idOS = "<?php echo $result->idOs ?>"
        if ((idEquipamento % 1) == 0) {
            $("#divEquipamento").html(
                "<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>"
            );
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/os/excluirEquipamento",
                data: "idEquipamento=" + idEquipamento + "&idOs=" + idOS,
                dataType: 'json',
                success: function(data) {
                    if (data.result == true) {
                        $("#divEquipamento").load(
                            "<?php echo current_url(); ?> #divEquipamento");

                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: "Ocorreu um erro ao tentar excluir Equipamento."
                        });
                    }
                }
            });
            return false;
        }
    });

    $(document).on('click', '.anotacao', function(event) {
        var idAnotacao = $(this).attr('idAcao');
        var idOS = "<?php echo $result->idOs ?>"
        if ((idAnotacao % 1) == 0) {
            $("#divAnotacoes").html(
                "<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>"
            );
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/os/excluirAnotacao",
                data: "idAnotacao=" + idAnotacao + "&idOs=" + idOS,
                dataType: 'json',
                success: function(data) {
                    if (data.result == true) {
                        $("#divAnotacoes").load(
                            "<?php echo current_url(); ?> #divAnotacoes");

                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: "Ocorreu um erro ao tentar excluir Anotação."
                        });
                    }
                }
            });
            return false;
        }
    });

        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd'
        });

        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
});
</script>