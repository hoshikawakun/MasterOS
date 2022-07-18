<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/dist/excanvas.min.js"></script><![endif]-->
<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/dist/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/dist/plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/dist/plugins/jqplot.donutRenderer.min.js"></script>
<script src='<?= base_url(); ?>assets/js/fullcalendar.min.js'></script>
<script src='<?= base_url(); ?>assets/js/fullcalendar/locales/pt-br.js'></script>
<link href='<?= base_url(); ?>assets/css/fullcalendar.min.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/js/dist/jquery.jqplot.min.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

<!--Action boxes-->
<ul class="cardBox">
    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) : ?>
        <li class="card">
            <div>
                <div class="numbers">Clientes</div>
                <div class="cardName">F1</div>
            </div>
            <a href="<?= site_url('clientes') ?>">
                <div class="iconBx">
                    <i class='fas fa-users'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) : ?>
        <li class="card">
            <div>
                <div class="numbers">Produtos</div>
                <div class="cardName">F2</div>
            </div>
            <a href="<?= site_url('produtos') ?>">
                <div class="iconBx">
                    <i class='fas fa-shopping-bag'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vServico')) : ?>
        <li class="card">
            <div>
                <div class="numbers">Serviços</div>
                <div class="cardName">F3</div>
            </div>
            <a href="<?= site_url('servicos') ?>">
                <div class="iconBx">
                    <i class='fas fa-wrench'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
        <li class="card">
            <div>
                <div class="numbers">OS</div>
                <div class="cardName">F4</div>
            </div>
            <a href="<?= site_url('os') ?>">
                <div class="iconBx">
                    <i class='fas fa-diagnoses'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) : ?>
        <li class="card">
            <div>
                <div class="numbers">Vendas</div>
                <div class="cardName">F6</div>
            </div>
            <a href="<?= site_url('vendas') ?>">
                <div class="iconBx">
                    <i class='fas fa-cash-register'></i>
                </div>
            </a>
        </li>
    <?php endif ?>

    <script src="<?= base_url('assets/js/clock_time.js') ?>"></script>

    <div Class="card-cl">
        <div class="clock-card">
            <div class="clock-flex">
                <span class="num hour_num">00</span>
                <div class="tit">Horas</div>
            </div>
            <span class="colun" id="colun-1">:</span>
            <div class="clock-flex">
                <span class="num min_num">00</span>
                <div class="tit">Minutos</div>
            </div>
            <!-- <span class="colun" id="colun-2">:</span>
            <div class="clock-flex">
                <span class="num sec_num">00</span>
                <div class="tit">Segundos</div>
            </div> -->
            <div class="time_am_pm">
                <span class="num am_pm">AM</span>
            </div>
        </div>
    </div>
</ul>
<!--End-Action boxes-->






<?php if ($configuration['masteros_2'] == 1 ) { ?>
<div class="row-fluid" style="margin-top: 0; display: flex">
<div class="Sspan12">
<!-- Agenda -->
<div class="widget-box2">
<div class="widget_title_5">
<h5>Agenda</h5>
</div>


<div class="widget-content">
<table>
<div id='source-calendar'>
<form method="post" style="margin-top:10px">
	<select style="padding-left: 30px" class="span12" name="statusOsGet" id="statusOsGet" value="">
	<option value="">Todos os Status</option>
	<option value="Orçamento">Orçamento</option>
	<option value="Orçamento Concluido">Orçamento Concluido</option>
	<option value="Orçamento Aprovado">Orçamento Aprovado</option>
	<option value="Em Andamento">Em Andamento</option>
	<option value="Aguardando Peças">Aguardando Peças</option>
	<option value="Serviço Concluido">Serviço Concluido</option>
	<option value="Sem Reparo">Sem Reparo</option>
	<option value="Não Autorizado">Não Autorizado</option>
	<option value="Contato sem Sucesso">Contato sem Sucesso</option>
	<option value="Cancelado">Cancelado</option>
	<option value="Pronto-Despachar">Pronto-Despachar</option>
	<option value="Enviado">Enviado</option>
	<option value="Aguardando Envio">Aguardando Envio</option>
	<option value="Aguardando Entrega Correio">Aguardando Entrega Correio</option>
	<option value="Entregue - A Receber">Entregue - A Receber</option>
	<option value="Garantia">Garantia</option>
	<option value="Abandonado">Abandonado</option>
	<option value="Comprado pela Loja">Comprado pela Loja</option>
	<option value="Entregue - Sem Reparo">Entregue - Sem Reparo</option>
	<option value="Entregue - Faturado">Entregue - Faturado</option>
	</select>
	<button type="button" class="btn-xs" id="btn-calendar"><i class="fas fa-search iconX2"></i></button>
</form>
                    </div>
                </table>
            </div>


</div>
<!-- Fim Agenda -->
<!-- widget right -->
<div class="new-statisc">
<div class="widget-box-new" style="height:100%">
<div class="widget_title_5">
<h5>Estatísticas do Sistema</h5>
</div>

                <div class="new-bottons">
                    <a href="<?php echo base_url(); ?>index.php/clientes/adicionar" class="card" title="Adicionar Clientes e Fornecedores" class="tooltip fade bottom in">
                        <div><i class='fas fa-users iconBx'></i></div>
                        <div>
                            <div class="cardName2"><?= $this->db->count_all('clientes'); ?></div>
                            <div class="cardName">Add Clientes</div>
                        </div>
                    </a>

                    <a href="<?php echo base_url(); ?>index.php/produtos/adicionar" class="card" title="Adicionar Produtos" class="tip-bottom">
                        <div><i class='fas fa-shopping-bag iconBx2'></i></div>
                        <div>
                            <div class="cardName2"><?= $this->db->count_all('produtos'); ?></div>
                            <div class="cardName">Add Produtos</div>
                        </div>
                    </a>

                    <a href="<?php echo base_url() ?>index.php/servicos/adicionar" class="card">
                        <div><i class='fas fa-wrench iconBx3'></i></div>
                        <div>
                            <div class="cardName2"><?= $this->db->count_all('servicos'); ?></div>
                            <div class="cardName">Add Serviços</div>
                        </div>
                    </a>

                    <a href="<?php echo base_url(); ?>index.php/os/adicionar" class="card" title="Adicionar Ordens de Serviço" class="tip-bottom">
                        <div><i class='fas fa-diagnoses iconBx4'></i></div>
                        <div>
                            <div class="cardName2"><?= $this->db->count_all('os'); ?></div>
                            <div class="cardName">Add Ordens</div>
                        </div>
                    </a>

                    <a href="<?php echo base_url() ?>index.php/vendas/adicionar" class="card" title="Adicionar Vendas" class="tip-bottom">
                        <div><i class='fas fa-cash-register iconBx5'></i></div>
                        <div>
                            <div class="cardName2"><?= $this->db->count_all('vendas'); ?></div>
                            <div class="cardName">Add Vendas</div>
                        </div>
                    </a>

                  <div></div>

                    <!-- responsavel por fazer complementar a variavel "$financeiro_mes_dia->" de receita e despesa -->
                    <?php if ($estatisticas_financeiro != null) {
    if ($estatisticas_financeiro->total_receita != null || $estatisticas_financeiro->total_despesa != null || $estatisticas_financeiro->total_receita_pendente != null || $estatisticas_financeiro->total_despesa_pendente != null) {  ?>

                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rFinanceiro')) : ?>
<?php $diaRec = "VALOR_" . date('m') . "_REC";
                                $diaDes = "VALOR_" . date('m') . "_DES"; ?>

<a href="<?php echo base_url() ?>index.php/financeiro/lancamentos" title="Cadastrar nova receita" class="card">
                                    <div><i class='fas fa-arrow-alt-circle-up iconBx7'></i></div>
                                    <div>
                                        <div class="cardName1 cardName2">R$ <?php echo number_format(($financeiro_mes_dia->$diaRec - $financeiro_mes_dia->$diaDes), 2, ',', '.'); ?></div>
                                        <div class="cardName">Receita do dia</div>
                                    </div>
</a>

<a href="<?php echo base_url() ?>index.php/financeiro/lancamentos" title="Cadastrar nova despesa" class="card">
                                    <div><i class='fas fa-arrow-alt-circle-down iconBx8'></i></div>
                                    <div>
                                        <div class="cardName1 cardName2">R$ <?php echo number_format(($financeiro_mes_dia->$diaDes ? $financeiro_mes_dia->$diaDes : 0), 2, ',', '.'); ?></div>
                                        <div class="cardName">Despesa do dia</div>
                                    </div>
</a>
                            <?php endif ?>

                    <?php  }
} ?>
                </div>
            </div>
        </div>
<!-- Fim widget right -->
</div>
</div>
<?php } ?>


<!-- Orçamento -->
<?php if ($configuration['orcamento'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Em Aberto</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens1 != null) : ?>
                    <?php foreach ($ordens1 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Orçamento -->

<!-- Orçamento Concluido -->
<?php if ($configuration['orcamento_concluido'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Orçamento Concluido</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens2 != null) : ?>
                    <?php foreach ($ordens2 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Orçamento Concluido -->

<!-- Orçamento Aprovado -->
<?php if ($configuration['orcamento_aprovado'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Orçamento Aprovado</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens3 != null) : ?>
                    <?php foreach ($ordens3 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Orçamento Aprovado -->

<!-- Em Andamento -->
<?php if ($configuration['em_andamento'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Em Andamento</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens4 != null) : ?>
                    <?php foreach ($ordens4 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Em Andamento -->

<!-- Aguardando Peças -->
<?php if ($configuration['aguardando_pecas'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Aguardando Peças</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens5 != null) : ?>
                    <?php foreach ($ordens5 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Aguardando Peças -->

<!-- Serviço Concluido -->
<?php if ($configuration['servico_concluido'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Serviço Concluido</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens6 != null) : ?>
                    <?php foreach ($ordens6 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Serviço Concluido -->

<!-- Sem Reparo -->
<?php if ($configuration['sem_reparo'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Sem Reparo</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens7 != null) : ?>
                    <?php foreach ($ordens7 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Sem Reparo -->

<!-- Não Autorizado -->
<?php if ($configuration['nao_autorizado'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Não Autorizado</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens8 != null) : ?>
                    <?php foreach ($ordens8 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Não Autorizado -->

<!-- Cancelado -->
<?php if ($configuration['cancelado'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Cancelado</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens9 != null) : ?>
                    <?php foreach ($ordens9 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Cancelado -->

<!-- Pronto-Despachar -->
<?php if ($configuration['pronto_despachar'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Pronto Despachar</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens10 != null) : ?>
                    <?php foreach ($ordens10 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Pronto-Despachar -->

<!-- Entregue - A Receber -->
<?php if ($configuration['entregue_a_receber'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Entregue - A Receber</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens11 != null) : ?>
                    <?php foreach ($ordens11 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Entregue - A Receber -->

<!-- Garantia -->
<?php if ($configuration['em_garantia'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>OS em Garantia</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="7%">OS N°</th>
                        <th>Descrição</th>
                        <th width="10%">Data de Entrada</th>
                        <th width="19%">Cliente</th>
                        <th width="11%">Contato</th>
                        <th width="8%">Valor Total</th>
                        <th width="14%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($ordens12 != null) : ?>
                    <?php foreach ($ordens12 as $o) :
							$NomeClienteShort = mb_strimwidth(strip_tags($o->nomeCliente), 0, 31, "...");
                            $descricaoShort = mb_strimwidth(strip_tags($o->descricaoProduto), 0, 50, "...");?>
                    <tr>
                        <td>
                            <div align="center"><a title="Visualizar detalhes da OS"
                                    href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" target="new"
                                    class="tip-top"><?= $o->idOs ?></a>
                        </td>
                        <td>
                            <div align="center"><?= $descricaoShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= date('d/m/Y', strtotime($o->dataInicial)) ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $NomeClienteShort ?></div>
                        </td>
                        <td>
                            <div align="center"><?= $o->telefone ?></div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.') ?></div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs'))  : ?>
<a style="margin-right: 1%" href=<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?> class="btn-nwe tip-top" title="Visualizar detalhes da OS" target="_blank">
<i class="fas fa-eye"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn-nwe3 tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" target="_blank">
<i class="fas fa-edit"></i></a>
<?php endif ?>
<!--
								<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
                                $eMailCliente = $o->email_cliemte;
                                $SenhaCliente = $o->senha_cliente;
                                $total_os = number_format($o->totalProdutos + $o->totalServicos, 2, ',', '.');
                                echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a%0d%0a' . strip_tags($o->defeito) . '%0d%0a%0d%0a' . strip_tags($o->observacoes) . '%0d%0a%0d%0a' . strip_tags($o->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            } ?>
                            -->
                            
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir Termica" target="_blank" class="btn-nwe6 tip-top" href="<?= base_url() ?>index.php/os/imprimirTermica/<?= $o->idOs ?>">
<i class="fas fa-print"></i></a>
<?php endif ?>
</div>
</td>
</tr>
<?php endforeach ?>
<?php else : ?>
<tr>
<td colspan="7">Nenhuma OS em Orçamento.</td>
</tr>
<?php endif ?>
</tbody>
</table>
</div>
</div>
<?php } ?>
<!-- Fim Garantia -->

<!-- Produtos Estoque Mínimo -->
<?php if ($configuration['masteros_3'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Produtos com Estoque Mínimo</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th width="8%">Cod. Item</th>
                        <th>Produto</th>
                        <th width="10%">Preço de Venda</th>
                        <th width="6%">Estoque</th>
                        <th width="10%">Estoque Mínimo</th>
                        <th width="8%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($produtos != null) : ?>
                    <?php foreach ($produtos as $p) : ?>
                    <tr>
                        <td>
                            <div align="center">
<?= $p->idProdutos ?>
                            </div>
                        </td>
                        <td>
                            <div align="left">
<?= $p->descricao ?>
                            </div>
                        </td>
                        <td>
                            <div align="center">R$:
<?= $p->precoVenda ?>
                            </div>
                        </td>
                        <td>
                            <div align="center">
<?= $p->estoque ?>
                            </div>
                        </td>
                        <td>
                            <div align="center">
<?= $p->estoqueMinimo ?>
                            </div>
                        </td>
                        <td>
                            <div align="center">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProduto')) : ?>
<a href="<?= base_url() ?>index.php/produtos/editar/<?= $p->idProdutos ?>" class="btn-nwe3 tip-top" title="Editar Produto">
<i class="fas fa-edit"></i>
</a>
<a href="#atualizar-estoque" role="button" data-toggle="modal" produto="<?= $p->idProdutos ?>" estoque="<?= $p->estoque ?>" class="btn-nwe5 tip-top" title="Atualizar Estoque">
<i class="fas fa-plus-circle"></i>
</a>
<?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="6">Nenhum produto com estoque baixo.</td>
                    </tr>
                    <?php endif ?>
                </tbody>
            </table>
</div>
</div>
<?php } ?>
<!-- Fim Produtos Estoque Mínimo -->

<!-- Balanço Mensal do Ano -->
<?php if ($configuration['masteros_4'] == 1 ) { ?>
<?php if ($estatisticas_financeiro != null) {
	if ($estatisticas_financeiro->total_receita != null || $estatisticas_financeiro->total_despesa != null || $estatisticas_financeiro->total_receita_pendente != null || $estatisticas_financeiro->total_despesa_pendente != null) {  ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rFinanceiro')) : ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Balanço Mensal do Ano:	</h5>
<form method="get">
<input type="number" name="year" style="max-width:120px; height: 18px; margin-bottom: 0; margin-top: 4px; margin-left:10px;" value="<?php echo intval(preg_replace('/[^0-9]/', '', $this->input->get('year'))) ?: date('Y') ?>">
<button type="submit" class="btn-xs" style="margin-bottom:10px; margin-left:5px; min-width:90px; height: 27px; margin-bottom: 0; margin-top: 4px">Pesquisar</button>
</form>
</div>
<div class="widget_painel">
<div id="chart-vendas-mes1" style=""></div>
</div>
</div>
<script src="<?= base_url('assets/js/highchart/highcharts.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        var myChart = Highcharts.chart('chart-vendas-mes1', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Financeiro'
            },
            xAxis: {
                categories: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho',
                    'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                ]
            },
            yAxis: {
                title: {
                    text: 'Reais',
                    format: 'R$: {value}'
                }
            },
            tooltip: {
                valueDecimals: 2,
                valuePrefix: 'R$: '
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: 'R$: {y}',
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Receita Líquida',
                    data: [
                        [
                            <?php echo($financeiro_mes->VALOR_JAN_REC - $financeiro_mes->VALOR_JAN_DES); ?>
                        ],
                        [
                            <?php echo($financeiro_mes->VALOR_FEV_REC - $financeiro_mes->VALOR_FEV_DES); ?>
                        ],
                        [
                            <?php echo($financeiro_mes->VALOR_MAR_REC - $financeiro_mes->VALOR_MAR_DES); ?>
                        ],
                        [
                            <?php echo($financeiro_mes->VALOR_ABR_REC - $financeiro_mes->VALOR_ABR_DES); ?>
                        ],
                        [
                            <?php echo($financeiro_mes->VALOR_MAI_REC - $financeiro_mes->VALOR_MAI_DES); ?>
                        ],
                        [
                            <?php echo($financeiro_mes->VALOR_JUN_REC - $financeiro_mes->VALOR_JUN_DES); ?>
                        ],
                        [
                            <?php echo($financeiro_mes->VALOR_JUL_REC - $financeiro_mes->VALOR_JUL_DES); ?>
                        ],
                        [

                            <?php echo($financeiro_mes->VALOR_AGO_REC - $financeiro_mes->VALOR_AGO_DES); ?>
                        ],
                        [
                            <?php echo($financeiro_mes->VALOR_SET_REC - $financeiro_mes->VALOR_SET_DES); ?>
                        ],
                        [
                            <?php echo($financeiro_mes->VALOR_OUT_REC - $financeiro_mes->VALOR_OUT_DES); ?>
                        ],
                        [
                            <?php echo($financeiro_mes->VALOR_NOV_REC - $financeiro_mes->VALOR_NOV_DES); ?>
                        ],
                        [
                            <?php echo($financeiro_mes->VALOR_DEZ_REC - $financeiro_mes->VALOR_DEZ_DES); ?>
                        ]
                    ]
                },
                {
                    name: 'Receita Bruta',
                    data: [
                        [<?php echo($financeiro_mes->VALOR_JAN_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_FEV_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_MAR_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_ABR_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_MAI_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_JUN_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_JUL_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_AGO_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_SET_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_OUT_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_NOV_REC); ?>],
                        [<?php echo($financeiro_mes->VALOR_DEZ_REC); ?>]
                    ]
                },
                {
                    name: 'Despesas',
                    data: [
                        [<?php echo($financeiro_mes->VALOR_JAN_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_FEV_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_MAR_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_ABR_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_MAI_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_JUN_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_JUL_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_AGO_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_SET_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_OUT_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_NOV_DES); ?>],
                        [<?php echo($financeiro_mes->VALOR_DEZ_DES); ?>]
                    ]
                }
            ]
        });
    });
</script>
<?php endif ?>
<?php }} ?>
<?php } ?>
<!-- Fim Balanço Mensal do Ano -->

<!-- Status OS Detalhada -->
<div id="calendarModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Status OS Detalhada</h5>
</div>
    <div class="modal-body">
        <div class="span5" id="divFormStatusOS" style="margin-left: 0"></div>
        <h4><b>OS:</b> <span id="modalId" class="modal-id"></span></h4>
        <h5 id="modalCliente" class="modal-cliente"></h5>
        <div id="modalDataInicial" class="modal-DataInicial"></div>
        <div id="modalDataFinal" class="modal-DataFinal"></div>
        <div id="modalGarantia" class="modal-Garantia"></div>
        <div id="modalGarantia_" class="modal-Garantia"></div>
        <div id="modalStatus" class="modal-Status"></div>
        <div id="modalDescription" class="modal-Description"></div>
        <div id="modalDefeito" class="modal-Defeito"></div>
        <div id="modalObservacoes" class="modal-Observacoes"></div>
        <div id="modalTotal" class="modal-Total"></div>
        <div id="modalValorFaturado" class="modal-ValorFaturado"></div>
    </div>
<div class="form_actions" align="center">
<?php
        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
            echo '<a id="modalIdVisualizar" style="margin-right: 1%" href="" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
        }
        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
            echo '<a id="modalIdEditar" style="margin-right: 1%" href="" class="btn btn-info tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
        }
        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dOs')) {
            echo '<a id="linkExcluir" href="#modal-excluir-os" role="button" data-toggle="modal" os="" class="btn btn-danger tip-top" title="Excluir OS"><i class="fas fa-trash"></i></a>  ';
        }
        ?>
</div>
</div>
<!-- Fim Status OS Detalhada -->

<!-- Excluir Os -->
<div id="modal-excluir-os" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo base_url() ?>index.php/os/excluir" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Excluir OS</h5>
</div>

<div class="modal_body2">
<div class="span12" style="margin-left: 0">

<input type="hidden" id="modalIdExcluir" name="id" value="" />
<h5 style="text-align: center">Deseja realmente excluir esta OS?</h5>
    
</div>
</div>

<div class="form_actions" align="center">
<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancelar</button>
<button class="btn btn-danger">Excluir</button>
</div>
</form>
</div>
<!-- Fim Excluir Os -->

<!-- Status Estoque -->
<div id="atualizar-estoque" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo base_url() ?>index.php/produtos/atualizar_estoque" method="post" id="formEstoque">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Atualizar Estoque</h5>
</div>

<div class="modal_body">
<div class="control_group_up">
                <label for="estoqueAtual" class="control-label">Estoque Atual</label>
                <div class="controls">
                    <input id="estoqueAtual" type="text" name="estoqueAtual" value="" readonly />
                </div>
            </div>

<div class="control_group_up">
                <label for="estoque" class="control-label">Adicionar Produtos<span class="required">*</span></label>
                <div class="controls">
                    <input type="hidden" id="idProduto" class="idProduto" name="id" value="" />
                    <input id="estoque" type="text" name="estoque" value="" />
                </div>
            </div>

</div>

<div class="form_actions" align="center">
<button class="button_mini btn btn-primary"><span class="button_icon"><i class="fas fa-sync-alt"></i></span><span class="button_text">Atualizar</span></button>
<button class="button_mini btn btn-warning"  data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
</div>
</form>
</div>
<!-- Fim Status Estoque -->


<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', 'a', function(event) {
        var produto = $(this).attr('produto');
        var estoque = $(this).attr('estoque');
        $('.idProduto').val(produto);
        $('#estoqueAtual').val(estoque);
    });

    $('#formEstoque').validate({
        rules: {
            estoque: {
                required: true,
                number: true
            }
        },
        messages: {
            estoque: {
                required: 'Campo Requerido.',
                number: 'Informe um número válido.'
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

    var srcCalendarEl = document.getElementById('source-calendar');
    var srcCalendar = new FullCalendar.Calendar(srcCalendarEl, {
        locale: 'pt-br',
        height: 500,
        editable: false,
        selectable: false,
        businessHours: true,
        dayMaxEvents: true, // allow "more" link when too many events
        displayEventTime: false,
        events: {
            url: "<?= base_url() . "index.php/masteros/calendario"; ?>",
            method: 'GET',
            extraParams: function() { // a function that returns an object
                return {
                    status: $("#statusOsGet").val(),
                };
            },
            failure: function() {
                alert('Falha ao buscar OS de calendário!');
            },
        },
        eventClick: function(info) {
            var eventObj = info.event.extendedProps;
            $('#modalId').html(eventObj.id);
            $('#modalIdVisualizar').attr("href",
                "<?php echo base_url(); ?>index.php/os/visualizar/" + eventObj.id);
            if (eventObj.editar) {
                $('#modalIdEditar').show();
                $('#linkExcluir').show();
                $('#modalIdEditar').attr("href", "<?php echo base_url(); ?>index.php/os/editar/" +
                    eventObj.id);
                $('#modalIdExcluir').val(eventObj.id);
            } else {
                $('#modalIdEditar').hide();
                $('#linkExcluir').hide();
            }
            $('#modalCliente').html(eventObj.cliente);
            $('#modalDataInicial').html(eventObj.dataInicial);
            $('#modalDataFinal').html(eventObj.dataFinal);
            $('#modalGarantia_').html(eventObj.garantia_);
            $('#modalGarantia').html(eventObj.garantia);
            $('#modalStatus').html(eventObj.status);
            $('#modalDescription').html(eventObj.description);
            $('#modalDefeito').html(eventObj.defeito);
            $('#modalObservacoes').html(eventObj.observacoes);
            $('#modalRelatorio').html(eventObj.relatorio);
            $('#modalTotal').html(eventObj.total);
            $('#modalValorFaturado').html(eventObj.valorFaturado);
            $('#eventUrl').attr('href', event.url);
            $('#calendarModal').modal();
        },
    });

    srcCalendar.render();

    $('#btn-calendar').on('click', function() {
        srcCalendar.refetchEvents();
    });
});
</script>
