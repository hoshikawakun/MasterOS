<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/dayjs.min.js"></script>

<?php $situacao = $this->input->get('situacao');
$periodo = $this->input->get('periodo');
?>

<style type="text/css">
    label.error {
        color: #b94a48;
    }

    input.error {
        border-color: #b94a48;
    }

    input.valid {
        border-color: #5bb75b;
    }

    textarea {
        resize: vertical;
    }
</style>


<div class="new122" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2">
<div class="span12">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLancamento')) { ?>
<div class="span4">
<a href="#modalReceita" data-toggle="modal" role="button" class="button_mini btn btn-mini btn-success" style="margin-bottom:10px; margin-right:10px; width: 180px">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text" title="Cadastrar nova receita">Add. Receita/Despesa</span></a>
</div>
<?php } ?>
</div>
</div>

<div class="widget_painel_2">
<div class="span12">
<form action="<?php echo current_url(); ?>" method="get">
        <div class="span2" style="margin-left: 0">
            <label>Período <i class="fas fa-calendar-day tip-top"
                    title="Lançamentos com vencimento no período."></i></label>
            <select id="periodo" name="periodo" class="span12">
                <option value="dia" <?= $this->input->get('periodo') === 'dia' ? 'selected' : '' ?>>Dia</option>
                <option value="semana" <?= $this->input->get('periodo') === 'semana' ? 'selected' : '' ?>>Semana
                </option>
                <option value="mes" <?= $this->input->get('periodo') === 'mes' ? 'selected' : '' ?>>Mês</option>
                <option value="ano" <?= $this->input->get('periodo') === 'ano' ? 'selected' : '' ?>>Ano</option>
            </select>
        </div>

        <div class="span2">
            <label>Vencimento (de) <i class="fas fa-calendar-day tip-top" title="Vencimento (de)"></i></label>
            <input id="vencimento_de" type="date" class="span12" name="vencimento_de" value="<?= $this->input->get('vencimento_de') ? $this->input->get('vencimento_de') : date('Y-m-d') ?>">
        </div>

        <div class="span2">
            <label>Vencimento (até) <i class="fas fa-calendar-day tip-top" title="Vencimento (até)"></i></label>
            <input id="vencimento_ate" type="date" class="span12" name="vencimento_ate" value="<?= $this->input->get('vencimento_ate') ? $this->input->get('vencimento_ate') : date('Y-m-d') ?>">
        </div>

        <div class="span2">
            <label>Tipo <i class="fas fa-hand-holding-usd tip-top" title="Tipo."></i></label>
            <select name="tipo" class="span12">
                <option value="">Todos</option>
                <option value="receita" <?= $this->input->get('tipo') === 'receita' ? 'selected' : '' ?>>Receita
                </option>
                <option value="despesa" <?= $this->input->get('tipo') === 'despesa' ? 'selected' : '' ?>>Despesa
                </option>
            </select>
        </div>

        <div class="span2">
            <label>Status <i class="fa fa-file-signature tip-top" title="Tipo."></i></label>
            <select name="status" class="span12">
                <option value="">Todos (Pendente e Pago)</option>
                <option value="0" <?= $this->input->get('status') === '0' ? 'selected' : '' ?>>Pendente</option>
                <option value="1" <?= $this->input->get('status') === '1' ? 'selected' : '' ?>>Pago</option>
            </select>
        </div>

        <div class="span2">
            <label>Cliente/Fornecedor</label>
            <input id="cliente_busca" type="text" class="span12" name="cliente" value="<?= $this->input->get('cliente') ?>">
        </div>

        <div class="span2 pull-right">
                <button type="submit" class="button_mini btn btn-primary btn-sm" style="min-width: 120px">
                    <span class="button_icon"><i class='bx bx-filter-alt'></i></span><span class="button_text">Filtrar</span></a></button>
            </div>
</form>
</div>
</div>

<div class="widget_painel_2">
<div class="widget_box_4">
<div class="widget_title_2">
<h5>Lançamentos Financeiros</h5>
</div>

            

            <table id="divLancamentos" width="100%" class="table_w">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Tipo</th>
                            <th>Cliente / Fornecedor</th>
                            <th>Descrição</th>
                            <th>Entrada</th>
                            <th>Status</th>
                            <th width="9%">Forma de Pagamento</th>
                            <th>Valor (+)</th>
                            <th>Desconto (-)</th>
                            <th>Valor Total (=)</th>
                            <th width="110">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (!$results) {
                            echo '<tr>
              <td colspan="12" >Nenhum lançamento encontrado</td>
            </tr>';
                        }
                        foreach ($results as $r) {
                            $vencimento = date(('d/m/Y'), strtotime($r->data_vencimento));
                            $resultado_valor_desconto_valor = $r->valor;
                            $resultado_valor_desconto_desconto = $r->desconto;
                            $subtracao_valor_desconto = $resultado_valor_desconto_valor -  $resultado_valor_desconto_desconto;
                          
                            if ($r->baixado == 0) {
                                $status = 'Pendente';
                            } else {
                                $status = 'Pago';
                            };
                            if ($r->tipo == 'receita') {
                                $label = 'success';
                            } else {
                                $label = 'important';
                            }
                            echo '<tr>';
                            echo '<td align="center">' . $r->idLancamentos . '</td>';
                            echo '<td align="center"><span class="label label-' . $label . '">' . ucfirst($r->tipo) . '</span></td>';
                            echo '<td>' . $r->cliente_fornecedor . '</td>';
                            echo '<td>' . $r->descricao . '</td>';
                            echo '<td align="center">' . $vencimento . '</td>';
                            echo '<td align="center">' . $status . '</td>';
                            echo '<td align="center">' . $r->forma_pgto . '</td>';
                            echo '<td align="center">R$: ' . number_format($r->valor, 2, ',', '.') . '</td>'; //valor total sem o desconto
                            echo '<td align="center">R$: ' . number_format($r->desconto, 2, ',', '.') . '</td>'; // valor do desconto
                            echo '<td align="center">R$: ' . number_format($subtracao_valor_desconto, 2, ',', '.') . '</td>'; // valor total  com o desconto
                            echo '<td align="center">';
							
                            if  ($r->data_pagamento == "0000-00-00")  {
                               $data_pagamento = "";
                           } else  {
                            $data_pagamento = date('Y-m-d', strtotime($r->data_pagamento));
                        }

                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eLancamento')) {
                                echo '<a href="#modalEditar" style="margin-right: 1%" data-toggle="modal" role="button" idLancamento="' . $r->idLancamentos . '" descricao="' . $r->descricao . '" valor="' . number_format($r->valor, 2, ',', '.') . '" vencimento="' . date('Y-m-d', strtotime($r->data_vencimento)) . '" pagamento="' . $data_pagamento . '" baixado="' . $r->baixado . '" cliente="' . $r->cliente_fornecedor . '" formaPgto="' . $r->forma_pgto . '" tipo="' . $r->tipo . '" observacoes="' . $r->observacoes . '" valor_desconto_editar="' . $resultado_valor_desconto_desconto . '" usuario="' . $r->nome . '" class="btn-nwe3 editar" title="Editar OS"><i class="bx bx-edit"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dLancamento')) {
                                echo '<a href="#modalExcluir" data-toggle="modal" role="button" idLancamento="' . $r->idLancamentos . '" class="btn-nwe4 excluir" title="Excluir OS"><i class="bx bx-trash-alt"></i></a>';
                            }

                            echo '</td>';
                            echo '</tr>';
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10" style="text-align: right; color: green"><strong>Total Receitas:</strong></td>
                            <td colspan="2" style="text-align: left; color: green">
                                <strong>R$ <?php echo number_format($totals['receitas'], 2, ',', '.') ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="text-align: right; color: red"><strong>Total Despesas:</strong></td>
                            <td colspan="2" style="text-align: left; color: red">
                                <strong>R$ <?php echo number_format($totals['despesas'], 2, ',', '.') ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" style="text-align: right"><strong>Saldo:</strong></td>
                            <td colspan="2" style="text-align: left;">
                                <strong>R$ <?php echo number_format($totals['receitas'] - $totals['despesas'], 2, ',', '.') ?></strong>
                            </td>
                        </tr>
                    
                        <tr>
                            <td colspan="12" align="center" style="color:#000000; background:#eeeeee"><strong>Estatísticas Gerais do Financeiro:</strong></td>
                        </tr> 
                        <tr>
                        <td colspan="10" style="text-align: right"><strong>Total Receitas (Pagas): </strong></td>
                        <td colspan="2" style="text-align: left;">R$: <?php echo number_format( $estatisticas_financeiro->total_receita, 2, ',', '.'); ?></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total Despesas (Pagas): </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php echo number_format( $estatisticas_financeiro->total_despesa, 2, ',', '.'); ?></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total Receitas (-) Despesas = Saldo Líquido: </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php $sub_receita_despesa = $estatisticas_financeiro->total_receita - $estatisticas_financeiro->total_despesa; echo number_format($sub_receita_despesa, 2, ',', '.') ?></strong></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total Receitas (+) Despesas: </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php $soma_receita_despesa = $estatisticas_financeiro->total_receita + $estatisticas_financeiro->total_despesa; echo number_format($soma_receita_despesa, 2, ',', '.') ?></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total Receitas Pendentes: </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php  echo number_format( $estatisticas_financeiro->total_receita_pendente, 2, ',', '.'); ?></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total Despesas Pendentes: </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php echo number_format( $estatisticas_financeiro->total_despesa_pendente, 2, ',', '.'); ?></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total de Receitas Pendentes (-) Despesas Pendentes: </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php $sub_recpendente_despependente = $estatisticas_financeiro->total_receita_pendente - $estatisticas_financeiro->total_despesa_pendente; echo number_format( $sub_recpendente_despependente, 2, ',', '.')?></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total de Receitas Pendentes (+) Despesas Pendentes: </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php $sub_recpendente_despependente = $estatisticas_financeiro->total_receita_pendente + $estatisticas_financeiro->total_despesa_pendente; echo number_format( $sub_recpendente_despependente, 2, ',', '.')?></strong></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total de Descontos aplicados á lançamentos Pagos: </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php echo number_format( $estatisticas_financeiro->total_valor_desconto, 2, ',', '.'); ?></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total de Descontos aplicados á lançamentos Pendentes: </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php echo number_format( $estatisticas_financeiro->total_valor_desconto_pendente, 2, ',', '.'); ?></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total de descontos aplicados (pagos + pendentes): </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php $soma_descontos_pagos = $estatisticas_financeiro->total_valor_desconto + $estatisticas_financeiro->total_valor_desconto_pendente; echo number_format( $soma_descontos_pagos, 2, ',', '.')?></strong></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total de Receitas sem descontos aplicados (pagos + pendentes): </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php echo number_format( $estatisticas_financeiro->total_receita_sem_desconto, 2, ',', '.'); ?></td>
                      </tr>
                      <tr>
                      <td colspan="10" style="text-align: right"><strong>Total de Despesas sem descontos aplicados (pagos + pendentes): </strong></td>
                      <td colspan="2" style="text-align: left;">R$: <?php echo number_format( $estatisticas_financeiro->total_despesa_sem_desconto, 2, ',', '.'); ?></td>
                      </tr>
                    </tfoot>
                </table>

</div>        
</div>
<div class="widget_painel_2">
<?= $this->pagination->create_links() ?>
</div>

</div>


<!-- Modal nova receita e despesa -->
<div id="modalReceita" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form id="formReceita" action="<?php echo base_url() ?>index.php/financeiro/adicionarReceita" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Adicionar Receita/Despesa</h5>
</div>
<div class="modal-body">
<div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.
</div>
<div class="span12" style="margin-left: 0">
<div class="span3" style="margin-left: 0">
<label for="tipo">Tipo</label>
<select name="tipo" id="tipo" class="span12">
<option value="receita">Receita</option>
<option value="despesa">Despesa</option>				
</select>
</div>
<div class="span9">
<label for="cliente">Cliente/Fornecedor*</label>
<input class="span12" id="cliente" type="text" name="cliente" value="" required />
<input class="span12" id="idCliente" type="hidden" name="idCliente" value="" />
</div>
</div>
<div class="span12" style="margin-left: 0">
<label for="descricao">Descrição/Referência*</label>
<input class="span12" id="descricao" type="text" name="descricao" required />
<input id="urlAtual" type="hidden" name="urlAtual" value="<?php echo current_url() ?>" />
</div>
<div class="span12 hide" style="margin-left: 0">
<label for="observacoes">Observações</label>
<textarea class="span12" id="observacoes" name="observacoes"></textarea>
</div>
<div class="span12" style="margin-left: 0">
<div class="span4" style="margin-left: 0">
<label for="valor">Valor*</label>
<input class="span12 money" id="valor" type="text" name="valor" data-affixes-stay="true" data-thousands="" data-decimal="." required />
</div>
</div>
<div class="span12 hide" style="margin-left: 0">
<div class="span4">  
<label for="descontos">Desconto</label>
<input class="span6 money" id="descontos" type="text" name="descontos" value="" placeholder="em R$" style="float: left;" />
<input class="btn btn-inverse" onclick="mostrarValores();" type="button" name="valor_desconto" value="Aplicar" placeholder="R$" style="margin-left:6px; width: 75px;" />
</div>
<div class="span4">  
<label for="valor_desconto">Val.Desc <i class="icon-info-sign tip-left" title="Não altere esta campo, caso clicar nele e sair e ficar vázio, terá que recarregar á pagina e inserir de novo"></i></label>
<input class="span12 money" id="valor_desconto" readOnly="true" title="Não altere este campo" type="text" name="valor_desconto" value="<?php echo number_format("0.00",2,',','.') ?>"/>
</div>
</div>
<div class="span12" style="margin-left: 0">
<div class="span4" style="margin-left: 0">
<label for="vencimento">Data Vencimento*</label>
<input name="vencimento" type="date" required class="span12" id="vencimento" autocomplete="off" value="<?php echo date('Y-m-d'); ?>" />
</div>
<div class="span4">
<label for="qtdparcelas">Qtd Parcelas</label>
<select name="qtdparcelas" id="qtdparcelas" class="span12">
<option value="0">Pagamento á vista</option>
<option value="1">1x</option>			
<option value="2">2x</option>			
<option value="3">3x</option>			
<option value="4">4x</option>			
<option value="5">5x</option>			
<option value="6">6x</option>			
<option value="7">7x</option>			
<option value="8">8x</option>			
<option value="9">9x</option>			
<option value="10">10x</option>			
<option value="11">11x</option>			
<option value="12">12x</option>			
</select>
<a href="#modalReceitaParcelada" id="abrirmodalreceitaparcelada" data-toggle="modal" style="display: none;" role="button"> </a>   
</div>
<div class="span4">
<label for="recebido">Recebido?</label>
<input id="recebido" type="checkbox" name="recebido" value="1" />
</div>
</div>
<div id="divRecebimento" class="span12" style="display: none; margin-left: 0">
<div class="span6" style="margin-left: 0">
<label for="recebimento">Data Recebimento</label>
<input name="recebimento" type="date" class="span12" id="recebimento" autocomplete="off" value="<?php echo date('Y-m-d'); ?>" />
</div>
<div class="span6">
<label for="formaPgto">Forma Pgto</label>
<select name="formaPgto" id="formaPgto" class="span12">
<option value="Dinheiro">Dinheiro</option>
<option value="Pix">Pix</option>
<option value="Boleto">Boleto</option>
<option value="Cartão de Crédito">Cartão de Crédito</option>
<option value="Cartão de Débito">Cartão de Débito</option>
<option value="Cheque">Cheque</option> 
<option value="Cheque Pré-datado">Cheque Pré-datado</option> 
<option value="Depósito">Depósito</option>
<option value="Transferência DOC">Transferência DOC</option>
<option value="Transferência TED">Transferência TED</option>
<option value="Promissória">Promissória</option> 
</select>
</div>
</div>
</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" id="cancelar_nova_receita" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span>
</button>
<button class="button_mini btn btn-success"><span class="button_icon"><i class='fas fa-plus-circle'></i></span> <span class="button_text">Adicionar Registro</span>
</button>
</div>

</form>
</div>
<!-- Fim Modal nova receita e despesa -->


<!-- Modal nova receita e despesa parcelada -->
<div id="modalReceitaParcelada" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form id="formReceita_parc" action="<?php echo base_url() ?>index.php/financeiro/adicionarReceita_parc" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Adicionar Receita/Despesa Parcelada</h5>
</div>
<div class="modal-body">
<div class="span12" style="margin-left: 0">
<div class="span3" style="margin-left: 0">
<label for="tipo_parc" style="margin-left: 0">Tipo</label>
<select name="tipo_parc" id="tipo_parc" class="span12">
<option value="receita">Receita</option>
<option value="despesa">Despesa</option>				
</select>
</div>
<div class="span9"> 
<label for="cliente_parc">Cliente/Fornecedor*</label>
<input class="span12" id="cliente_parc" type="text" name="cliente_parc" required />
</div>
</div>
<div class="span12" style="margin-left: 0">
<label for="descricao_parc">Descrição/Referência*</label>
<input class="span12" id="descricao_parc" type="text" name="descricao_parc" required />
<input id="urlAtual" type="hidden" name="urlAtual" value="<?php echo current_url() ?>"/>
</div>
<div class="span12 hide" style="margin-left: 0">
<label for="observacoes_parc">Observações</label>
<textarea class="span12" id="observacoes_parc" name="observacoes_parc"></textarea>
</div>
<div class="span12" style="margin-left: 0">
<div class="span4" style="margin-left: 0">  
<label for="valor_parc">Valor*</label>
<input class="span12 money" id="valor_parc" type="text" name="valor_parc" required />
</div>
<div class="span4">  
<label for="descontos_parc">Desconto</label>
<input class="span6 money" id="descontos_parc" type="text" name="descontos_parc" value="" placeholder="em R$" style="float: left;" />
<input class="btn btn-inverse" onclick="mostrarValoresParc();" type="button" name="desconto_parc" value="Aplicar" placeholder="R$" style="width: 75px; margin-left:6px;" />
</div>
<div class="span4">  
<label for="desconto_parc">Desconto <i class="icon-info-sign tip-left" title="Não altere esta campo, caso clicar nele e sair e ficar vázio, terá que recarregar á pagina e inserir de novo"></i></label>
<input class="span12 money"  id="desconto_parc" readOnly="true" title="Não altere este campo" type="text" name="desconto_parc" value="<?php echo number_format("0.00",2,',','.') ?>" style="float: left;" />
</div>
</div>

<div class="span12" style="margin-left: 0">
<div class="span4" style="margin-left: 0">
<label for="entrada">Entrada <i class="icon-info-sign tip-right" title="O valor da entrada será lançado como pago no dia atual (Hoje)"></i></label>
<input class="span12 money" id="entrada" type="text" name="entrada" value="0" />
</div>
<div id="divParcelamento" class="span3">
<label for="qtdparcelas_parc">Parcelas</label>
<select name="qtdparcelas_parc" id="qtdparcelas_parc" class="span12">
<option value="1">1x</option>
<option value="2">2x</option>			
<option value="3">3x</option>			
<option value="4">4x</option>			
<option value="5">5x</option>			
<option value="6">6x</option>			
<option value="7">7x</option>			
<option value="8">8x</option>			
<option value="9">9x</option>			
<option value="10">10x</option>			
<option value="11">11x</option>			
<option value="12">12x</option>			
</select>
</div>
<div class="span5">
<label for="formaPgto_parc">Forma Pgto</label>
<select name="formaPgto_parc" id="formaPgto_parc" class="span12">
<option value="Dinheiro">Dinheiro</option>
<option value="Pix">Pix</option>
<option value="Boleto">Boleto</option>
<option value="Cartão de Crédito">Cartão de Crédito</option>
<option value="Cartão de Débito">Cartão de Débito</option>
<option value="Cheque">Cheque</option> 
<option value="Cheque Pré-datado">Cheque Pré-datado</option> 
<option value="Depósito">Depósito</option>
<option value="Transferência DOC">Transferência DOC</option>
<option value="Transferência TED">Transferência TED</option>
<option value="Promissória">Promissória</option>
</select>
</div>
</div>
<div class="span12" style="margin-left: 0">
<div class="span6" style="margin-left: 0">
<label for="dia_pgto">Data da Entrada*</label>
<input class="span12" id="dia_pgto" type="date" name="dia_pgto" value="<?php echo date('Y-m-d'); ?>"  autocomplete="off"  required/>
</div>
<div class="span6">
<label for="dia_base_pgto">Data Base de Pgto* <i class="icon-info-sign tip-left" title="Dia do mês que serão lançadas as parcelas restantes, iniciando-se pela data selecionada."></i></label>
<input name="dia_base_pgto" type="date" required class="span12" id="dia_base_pgto" autocomplete="off" value="<?php echo date('Y-m-d'); ?>"  />
</div>
</div>

</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span>
</button>
<button class="button_mini btn btn-success" id="submitReceita"><span class="button_icon"><i class='fas fa-plus-circle'></i></span> <span class="button_text">Adicionar Registro</span>
</button>
</div>

</form>
</div>
<!-- Modal nova receita e despesa parcelada -->


<!-- Editar Lançamento -->
<div id="modalEditar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form id="formEditar" action="<?php echo base_url() ?>index.php/financeiro/editar" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Editar Lançamento</h5>
</div>

<div class="modal-body">
<div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.
</div>
<div class="span3" style="margin-left: 0">
<label for="vencimento">Tipo*</label>
<select class="span12" name="tipo" id="tipoEditar">
<option value="receita">Receita</option>
<option value="despesa">Despesa</option>
</select>
</div>
<div class="span9">
<label for="fornecedor">Cliente/Fornecedor*</label>
<input class="span12" id="fornecedorEditar" type="text" name="fornecedor" required />
</div>
<div class="span12" style="margin-left: 0">
<label for="descricao">Descrição/Referência*</label>
<input class="span12" id="descricaoEditar" type="text" name="descricao" required />
<input id="urlAtualEditar" type="hidden" name="urlAtual"/>
</div>
<div class="span12 hide" style="margin-left: 0">
<label for="observacoes">Observações</label>
<textarea class="span12" id="observacoes_edit" name="observacoes"></textarea>
</div>
<div class="span12" style="margin-left: 0">
<div class="span4" style="margin-left: 0">
<label for="valor">Valor*</label>
<input type="hidden" id="idEditar" name="id" value="" />
<input class="span12 money" type="text" name="valor" id="valorEditar" value="<?php echo number_format("0.00",2,',','.') ?>" required />
</div>
</div>
<div class="span12 hide" style="margin-left: 0">
<div class="span4">
<label for="descontos">Desconto</label>
<input class="span6 money" id="descontos_editar" type="text" name="descontos_editar" placeholder="em R$" style="float: left;"/>
<input class="btn btn-inverse" onclick="mostrarValoresEditar();" type="button" name="valor_desconto_editar" value="Aplicar" placeholder="R$" style="width: 75px; margin-left:6px;" />
</div>
<div class="span4">
<label for="valor_desconto">Val.Desc</label>
<input class="span12 money" id="descontoEditar" name="valor_desconto_editar" type="text" value="<?php echo number_format("0.00",2,',','.') ?>" />
</div>
</div>
<div class="span12" style="margin-left: 0">
<div class="span4" style="margin-left: 0">
<label for="vencimento">Data Entrada*</label>
<input name="vencimento" type="date" required class="span12" id="vencimentoEditar" autocomplete="off" value="" />
</div>
<div class="span4">
<label for="pago">Foi Pago?</label>
<input id="pagoEditar" type="checkbox" name="pago" value="1" />
</div>
<div class="span12" id="divPagamentoEditar" style="display:none; margin-left: 0">
<div class="span6">
<label for="pagamento">Data Pagamento</label>
<input name="pagamento" type="date" class="span12" id="pagamentoEditar" autocomplete="off" value=""  />
</div>
<div class="span6">
<label for="formaPgto">Forma Pgto</label>
<select name="formaPgto" id="formaPgtoEditar" class="span12">
<option value="Dinheiro">Dinheiro</option>
<option value="Pix">Pix</option>
<option value="Boleto">Boleto</option>
<option value="Cartão de Crédito">Cartão de Crédito</option>
<option value="Cartão de Débito">Cartão de Débito</option>
<option value="Cheque">Cheque</option> 
<option value="Cheque Pré-datado">Cheque Pré-datado</option> 
<option value="Depósito">Depósito</option>
<option value="Transferência DOC">Transferência DOC</option>
<option value="Transferência TED">Transferência TED</option>
<option value="Promissória">Promissória</option>
</select>
</div>
</div>

</div>
</div>

<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true" id="btnCancelarEditar"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span>
</button>
<button class="button_mini btn btn-primary"><span class="button_icon"><i class='fas fa-sd-card'></i></span> <span class="button_text">Salvar Alterações</span>
</button>
</div>

</form>
</div>
<!-- Fim Editar Lançamento -->

<!-- Excluir Lançamento -->
<div id="modalExcluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Excluir Lançamento</h5>
</div>

<div class="modal-body">
<h5 style="text-align: center">Deseja realmente excluir esse lançamento?</h5>
<input name="id" id="idExcluir" type="hidden" value="" />
</div>

<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span>
</button>
<button class="button_mini btn btn-danger" data-dismiss="modal" aria-hidden="true" id="btnExcluir"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Excluir Lançamento</span>
</button>
</div>
</div>
<!-- Fim Excluir Lançamento -->


<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">

    function mostrarValor() {
		if (document.getElementById('valor').value == "" || document.getElementById('desconto').value == ""){
			
		}else{
			
			var valor = parseFloat(document.getElementById('valor').value);
			var desconto = parseInt(document.getElementById('desconto').value); 
			var valor_desconto = parseFloat(document.getElementById('valor_desconto').value);
			var resultado, total;
			resultado = valor/100;
			total = valor-(desconto*resultado);
			
			resultdesc = total ;
			totaldesc = valor-(resultdesc);	
			
			document.getElementById('valor').value = total.toFixed(2);
			document.getElementById('valor_desconto').value = totaldesc.toFixed(2);
			}
	}
	
    function mostrarValores() {
		if (document.getElementById('valor').value == "" || document.getElementById('descontos').value == "" || document.getElementById('valor_desconto').value == ""){
			
		}else{
			var valor = parseFloat(document.getElementById('valor').value);
			var desconto = parseFloat(document.getElementById('descontos').value); 
			var valor_desconto = parseFloat(document.getElementById('valor_desconto').value);
			var resultado, total;
			resultado = valor;
			total = valor-desconto;
			
			resultdesc = total ;
			totaldesc = valor-(resultdesc);	
			
			document.getElementById('valor').value = total.toFixed(2);
			document.getElementById('valor_desconto').value = totaldesc.toFixed(2);
			}
	}

    function mostrarValoresEditar() {
		if (document.getElementById('valorEditar').value == "" || document.getElementById('descontos_editar').value == "" || document.getElementById('descontoEditar').value == ""){
			
		}else{
			var valor = parseFloat(document.getElementById('valorEditar').value);
			var desconto = parseFloat(document.getElementById('descontos_editar').value); 
			var valor_desconto = parseFloat(document.getElementById('descontoEditar').value);
			var resultado, total;
			resultado = valor;
			total = valor-desconto;
			
			resultdesc = total ;
			totaldesc = valor-(resultdesc);	
			
			document.getElementById('valorEditar').value = total.toFixed(2);
			document.getElementById('descontoEditar').value = totaldesc.toFixed(2);
			}
	}

    function mostrarValoresParc() {
		if (document.getElementById('valor_parc').value == "" || document.getElementById('descontos_parc').value == "" || document.getElementById('desconto_parc').value == ""){
			
		}else{
			var valor = parseFloat(document.getElementById('valor_parc').value);
			var desconto = parseFloat(document.getElementById('descontos_parc').value); 
			var valor_desconto = parseFloat(document.getElementById('desconto_parc').value);
			var resultado, total;
			resultado = valor;
			total = valor-desconto;
			
			resultdesc = total ;
			totaldesc = valor-(resultdesc);	
			
			document.getElementById('valor_parc').value = total.toFixed(2);
			document.getElementById('desconto_parc').value = totaldesc.toFixed(2);
			}
        }

    jQuery(document).ready(function($) {

        $(".money").maskMoney();

        $('#pago').click(function(event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divPagamento').show();
            } else {
                $('#divPagamento').hide();
            }
        });


        $('#recebido').click(function(event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divRecebimento').show();
            } else {
                $('#divRecebimento').hide();
            }
        });

        $('#pagoEditar').click(function(event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divPagamentoEditar').show();
            } else {
                $('#divPagamentoEditar').hide();
            }
        });


        $("#formReceita").validate({
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
                $("#submitReceita").attr("disabled", true);
                form.submit();
            }
        });


        $("#formDespesa").validate({
            rules: {
                descricao: {
                    required: true
                },
                fornecedor: {
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
                fornecedor: {
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
                $("#submitDespesa").attr("disabled", true);
                form.submit();
            }
        });


        $(document).on('click', '.excluir', function(event) {
            $("#idExcluir").val($(this).attr('idLancamento'));
        });


        $(document).on('click', '.editar', function(event) {
            $("#idEditar").val($(this).attr('idLancamento'));
            $("#descricaoEditar").val($(this).attr('descricao'));
            $("#usuarioEditar").val($(this).attr('usuario'));
            $("#fornecedorEditar").val($(this).attr('cliente'));
            $("#observacoes_edit").val($(this).attr('observacoes'));
            $("#valorEditar").val($(this).attr('valor'));
            $("#vencimentoEditar").val($(this).attr('vencimento'));
            $("#pagamentoEditar").val($(this).attr('pagamento'));
            $("#formaPgtoEditar").val($(this).attr('formaPgto'));
            $("#tipoEditar").val($(this).attr('tipo'));
            $("#descontoEditar").val($(this).attr('valor_desconto_editar'));
            $("#urlAtualEditar").val($(location).attr('href'));
            var baixado = $(this).attr('baixado');
            if (baixado == 1) {
                $("#pagoEditar").prop('checked', true);
                $("#divPagamentoEditar").show();
            } else {
                $("#pagoEditar").prop('checked', false);
                $("#divPagamentoEditar").hide();
            }


        });

        $(document).on('click', '#btnExcluir', function(event) {
            var id = $("#idExcluir").val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/financeiro/excluirLancamento",
                data: "id=" + id,
                dataType: 'json',
                success: function(data) {
                    if (data.result == true) {
                        $("#btnCancelExcluir").trigger('click');
                        $("#divLancamentos").html('<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>');
                        $("#divLancamentos").load($(location).attr('href') + " #divLancamentos");

                    } else {
                        $("#btnCancelExcluir").trigger('click');
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: "Ocorreu um erro ao tentar excluir lançamento."
                        });
                    }
                }
            });
            return false;
        });
        let controlBaixa = "<?php echo $configuration['control_baixa']; ?>";
        let datePickerOptions = {
            dateFormat: 'yyyy-mm-dd',
        };
        if (controlBaixa === '1') {
            datePickerOptions.minDate = 0;
            datePickerOptions.maxDate = 0;
        }
        $(".datepicker2").datepicker(
            datePickerOptions
        );
        $(".datepicker").datepicker();
        $('#periodo').on('change', function(event) {
            const period = $('#periodo').val();

            switch (period) {
                case 'dia':
                    $('#vencimento_de').val(dayjs().locale('pt-br').format('YYYY-MM-DD'));
                    $('#vencimento_ate').val(dayjs().locale('pt-br').format('YYYY-MM-DD'));
                    break;
                case 'semana':
                    $('#vencimento_de').val(dayjs().startOf('week').locale('pt-br').format('YYYY-MM-DD'));
                    $('#vencimento_ate').val(dayjs().endOf('week').locale('pt-br').format('YYYY-MM-DD'));
                    break;
                case 'mes':
                    $('#vencimento_de').val(dayjs().startOf('month').locale('pt-br').format('YYYY-MM-DD'));
                    $('#vencimento_ate').val(dayjs().endOf('month').locale('pt-br').format('YYYY-MM-DD'));
                    break;
                case 'ano':
                    $('#vencimento_de').val(dayjs().startOf('year').locale('pt-br').format('YYYY-MM-DD'));
                    $('#vencimento_ate').val(dayjs().endOf('year').locale('pt-br').format('YYYY-MM-DD'));
                    break;
            }
        });

        $("#fornecedorEditar").autocomplete({
            source: "<?php echo base_url(); ?>index.php/financeiro/autoCompleteClienteAddReceita",
            minLength: 1,
            select: function(event, ui) {
                $("#fornecedorEditar").val(ui.item.label);
            }
        });
    
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/financeiro/autoCompleteClienteAddReceita",
            minLength: 1,
            select: function(event, ui) {
                $("#cliente").val(ui.item.label);
                $("#idCliente").val(ui.item.id);
            }
        });

          $("#cliente_busca").autocomplete({
			  source: "<?php echo base_url(); ?>index.php/financeiro/autoCompleteClienteAddReceita",
			  minLength: 1,
			  select: function(event, ui) {
				  $("#cliente_busca").val(ui.item.label);
            }
        });

        $("#cliente_parc").autocomplete({
            source: "<?php echo base_url(); ?>index.php/financeiro/autoCompleteClienteAddReceita",
            minLength: 1,
            select: function(event, ui) {
                $("#cliente_parc").val(ui.item.label);
            }
        });

        $("#fornecedor").autocomplete({
            source: "<?php echo base_url(); ?>index.php/financeiro/autoCompleteClienteAddReceita",
            minLength: 1,
            select: function(event, ui) {
                $("#fornecedor").val(ui.item.label);
                $("#idFornecedor").val(ui.item.id);
            }
        });

        function valorParcelas(){
			var valor_parc = $("#valor_parc").val();
			var qtdparc = $("#qtdparcelas_parc").val();
			var entrada = $("#entrada").val();
			var result = (valor_parc - entrada) / qtdparc;
			
			if(qtdparc > 1){
				if(entrada > 0){
					$("#string_parc").text('R$ '+entrada+' de entrada mais '+qtdparc+' parcelas deR$: '+parseFloat(Math.round(result * 100) / 100).toFixed(2));
				$("#valorparcelas").val(parseFloat(Math.round(result * 100) / 100).toFixed(2));
				}else{
					$("#string_parc").text(qtdparc+' parcelas deR$: '+parseFloat(Math.round(result * 100) / 100).toFixed(2));
				$("#valorparcelas").val(parseFloat(Math.round(result * 100) / 100).toFixed(2));
				}
			}else{
				if(entrada > 0){
					$("#string_parc").text('R$ '+entrada+' de entrada mais '+qtdparc+' parcela deR$: '+parseFloat(Math.round(result * 100) / 100).toFixed(2));
				$("#valorparcelas").val(parseFloat(Math.round(result * 100) / 100).toFixed(2));
				}else{
					$("#string_parc").text(qtdparc+' parcela deR$: '+parseFloat(Math.round(result * 100) / 100).toFixed(2));
				$("#valorparcelas").val(parseFloat(Math.round(result * 100) / 100).toFixed(2));
				}
			}
		}

		$('#qtdparcelas').change(function(event) {
			var parcelas = $("#qtdparcelas").val();
			if(parcelas > 1){
				$('#cancelar_nova_receita').trigger('click');
				$('#abrirmodalreceitaparcelada').trigger('click');
				$("#descricao_parc").val($("#descricao").val());
				$("#cliente_parc").val($("#cliente").val());
                $("#tipo_parc").val($("#tipo").val());
                $("#formaPgto_parc").val($("#formaPgto").val());
				$("#pcontas_parc").val($("#pcontas").val());
				$("#categoria_parc").val($("#categoria").val());
				$("#observacoes_parc").val($("#observacoes").val());
				$("#valor_parc").val($("#valor").val());
				$("#desconto_parc").val($("#valor_desconto").val());
				$("#qtdparcelas_parc").val($("#qtdparcelas").val());		
			valorParcelas();
			}
			else{
				if(parcelas == 1){
					$('#cancelar_nova_receita').trigger('click');
					$('#abrirmodalreceitaparcelada').trigger('click');
					$("#descricao_parc").val($("#descricao").val());
					$("#cliente_parc").val($("#cliente").val());
                    $("#tipo_parc").val($("#tipo").val());
                    $("#formaPgto_parc").val($("#formaPgto").val());
					$("#pcontas_parc").val($("#pcontas").val());
					$("#categoria_parc").val($("#categoria").val());
					$("#observacoes_parc").val($("#observacoes").val());
					$("#desconto_parc").val($("#valor_desconto").val());
					$("#valor_parc").val($("#valor").val());
					$("#qtdparcelas_parc").val(1);		
					valorParcelas();
				}
			}
		});
							
		$('#valor_parc').keypress(function(event) {
			valorParcelas();
		});

		$('#qtdparcelas_parc').change(function(event) {
			valorParcelas();
		});
		
		$('#entrada').keypress(function(event){
			valorParcelas();
			var entrada = $("#entrada").val();
			if(entrada > 0){
				$('#dia_pgto').css("color", "#444444");
			}else{
				$('#dia_pgto').css("color", "#eeeeee");
			}
		});
		
		$('#valor_parc, #qtdparcelas_parc, #formaPgto_parc, #entrada, #dia_pgto, #dia_base_pgto').click(function(event){
			valorParcelas();
		});
		
		$('#add_receita').mouseover(function(event){
			valorParcelas();
		});
		
		$('#entrada').keypress(function(event){
			valorParcelas();
			var entrada = $("#entrada").val();
			if(entrada > 0){
				$('#dia_pgto').css("color", "#444444");
			}else{
				$('#dia_pgto').css("color", "#eeeeee");
			}
		});
		$('#valor_parc, #qtdparcela_parc, #formaPgto_parc, #entrada, #dia_pgto, #dia_base_pgto').click(function(event){
			valorParcelas();
		});
		
		$('#add_receita').mouseover(function(event){
			valorParcelas();
		});
    });
</script>