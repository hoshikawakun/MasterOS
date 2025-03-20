<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<script src='<?= base_url(); ?>assets/js/fullcalendar.min.js'></script>

<!--Action boxes-->
<ul class="cardBox">
<li class="card">
            <div>
                <div class="numbers">Minha Conta</div>
            </div>
            <a href="<?= site_url('servicos') ?>">
                <div class="iconBx">
                    <i class='fas fa-user-cog'></i>
                </div>
            </a>
        </li>
    
        <li class="card">
            <div>
                <div class="numbers">Ordens de Serviço</div>
            </div>
            <a href="<?= site_url('os') ?>">
                <div class="iconBx">
                    <i class='fas fa-diagnoses'></i>
                </div>
            </a>
        </li>
        
        
        <?php if ($compras != null) { ?>
        <li class="card">
            <div>
                <div class="numbers">Compras</div>
            </div>
            <a href="<?= site_url('vendas') ?>">
                <div class="iconBx">
                    <i class='fas fa-cash-register'></i>
                </div>
            </a>
        </li>
        <?php } ?>

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
                <span class="num am_pm" style="margin-top: -5px">AM</span>
            </div>
        </div>
    </div>
</ul>
<!--End-Action boxes-->

<div class="widget_content_4">
<div class="widget_title_4">
<h5><i class="fas fa-signal"></i> Últimas Ordens de Serviço</h5>
</div>

<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                    <th width="7%">N° OS</th>
                    <th width="20%">Descrição</th>
                    <th width="10%">Data Inicial</th>
                    <th width="10%">Data Final</th>
                    <th width="9%">Garantia</th>
                    <th>Status</th>
                    <th width="10%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($os != null) {
                        foreach ($os as $r) {
							
							$DescricaoShort = mb_strimwidth(strip_tags($r->descricaoProduto), 0, 50, "...");
                            $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                            if ($r->dataFinal != null) {
                                $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                            } else {
                                $dataFinal = "";
                            }
                            if ($this->input->get('pesquisa') === null && is_array(json_decode($configuration['os_status_list']))) {
                                if (in_array($r->status, json_decode($configuration['os_status_list'])) != true) {
                                    continue;
                                }
                            }
                            switch ($r->status) {
                case 'Orçamento':
                    $cor = '#CCCC00';
                    break;
                case 'Orçamento Concluido':
                    $cor = '#CC9966';
                    break;
                case 'Orçamento Aprovado':
                    $cor = '#339999';
                    break;
                case 'Em Andamento':
                    $cor = '#9933FF';
                    break;
                case 'Aguardando Peças':
                    $cor = '#FF6600';
                     break;
                case 'Serviço Concluido':
                    $cor = '#0066FF';
                    break;
                case 'Sem Reparo':
                    $cor = '#999999';
                    break;
                case 'Não Autorizado':
                    $cor = '#990000';
                    break;
                case 'Contato sem Sucesso':
                    $cor = '#660099';
                    break;
                case 'Cancelado':
                    $cor = '#990000';
                    break;
                case 'Pronto-Despachar':
                    $cor = '#33CCCC';
                    break;
                case 'Enviado':
                    $cor = '#99CC33';
                    break;
                case 'Aguardando Envio':
                    $cor = '#CC66CC';
                    break;
                case 'Aguardando Entrega Correio':
                    $cor = '#996699';
                    break;
                case 'Entregue - A Receber':
                    $cor = '#FF0000';
                    break;
                case 'Garantia':
                    $cor = '#FF66CC';
                    break;
                case 'Abandonado':
                    $cor = '#000000';
                    break;
                case 'Comprado pela Loja':
                    $cor = '#666666';
                    break;
                case 'Entregue - Sem Reparo':
                    $cor = '#000000';
                    break;
                case 'Entregue - Faturado':
                    $cor = '#006633';
                    break;
                            }
                            $vencGarantia = '';

                            if ($r->garantia && is_numeric($r->garantia)) {
                                $vencGarantia = dateInterval($r->dataFinal, $r->garantia);
                            }
							
                            echo '<tr>';
	echo '<td align="center"><a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" target="_blank" class="tip-top" title="Visualizar detalhes da OS" style="margin-right: 1%">' . $r->idOs . '</a></td>';
	echo '<td>' . $DescricaoShort . '</td>';
	echo '<td align="center">' . $dataInicial . '</td>';
	echo '<td align="center">' . $dataFinal . '</td>';
	echo '<td align="center">' . $r->garantia . '</td>';
	echo '<td align="center"> <span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span></td>';
	echo '<td align="center"><a href="' . base_url() . 'index.php/conecte/visualizarOs/' . $r->idOs . '" class="btn-nwe" title="Visualizar"><i class="fas fa-eye"></i></a>
							<a href="' . base_url() . 'index.php/conecte/imprimirOs/' . $r->idOs . '" class="btn-nwe3" title="Imprimir"><i class="fas fa-print"></i></a>
							<a href="' . base_url() . 'index.php/conecte/detalhesOs/' . $r->idOs . '" class="btn-nwe2 title="Ver mais detalhes"><i class="fas fa-edit"></i></a>
                              </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">Você ainda não tem nenhuma Ordem de Serviço.</td></tr>';
                    }

                    ?>
                </tbody>
            </table>
</div>
</div>


<?php if ($compras != null) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5><i class="fas fa-signal"></i> Últimas Compras</h5>
</div>
<div class="widget_painel">
<table class="table_w" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Data de Venda</th>
                        <th>Responsável</th>
                        <th>Faturado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($compras != null) {
                        foreach ($compras as $p) {
                            if ($p->faturado == 1) {
                                $faturado = 'Sim';
                            } else {
                                $faturado = 'Não';
                            }
                            echo '<tr>';
                            echo '<td>' . $p->idVendas . '</td>';
                            echo '<td>' . date('d/m/Y', strtotime($p->dataVenda)) . '</td>';
                            echo '<td>' . $p->nome . '</td>';
                            echo '<td>' . $faturado . '</td>';
                            echo '<td> <a href="' . base_url() . 'index.php/conecte/visualizarCompra/' . $p->idVendas . '" class="btn"> <i class="fas fa-eye" ></i> </a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Nenhum venda encontrada.</td></tr>';
                    }

                    ?>
                </tbody>
            </table>
</div>
</div>
<?php } ?>

<!--
<div class="span12" style="margin-left: 0">

    <div class="widget-box">
        <div class="widget-title" style="margin: -20px 0 0">
          <span class="icon"><i class="fas fa-signal"></i></span>
            <h5>Últimas Ordens de Serviço</h5>
        </div>
        <div class="widget_content">
            <table id="tabela" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                        <th>Garantia</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($os != null) {
                        foreach ($os as $o) {
                            echo '<tr>';
                            echo '<td>' . $o->idOs . '</td>';
                            echo '<td>' . date('d/m/Y', strtotime($o->dataInicial)) . '</td>';
                            echo '<td>' . date('d/m/Y', strtotime($o->dataFinal)) . '</td>';
                            echo '<td>' . $o->garantia . '</td>';
                            echo '<td>' . $o->status . '</td>';
                            echo '<td> <a href="' . base_url() . 'index.php/conecte/visualizarOs/' . $o->idOs . '" class="btn"> <i class="fas fa-eye" ></i> </a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">Nenhum ordem de serviço encontrada.</td></tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="widget-box">
        <div class="widget-title" style="margin: -20px 0 0">
          <span class="icon"><i class="fas fa-signal"></i></span>
            <h5>Últimas Compras</h5>
        </div>
        <div class="widget_content">
            <table id="tabela" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Data de Venda</th>
                        <th>Responsável</th>
                        <th>Faturado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($compras != null) {
                        foreach ($compras as $p) {
                            if ($p->faturado == 1) {
                                $faturado = 'Sim';
                            } else {
                                $faturado = 'Não';
                            }
                            echo '<tr>';
                            echo '<td>' . $p->idVendas . '</td>';
                            echo '<td>' . date('d/m/Y', strtotime($p->dataVenda)) . '</td>';
                            echo '<td>' . $p->nome . '</td>';
                            echo '<td>' . $faturado . '</td>';
                            echo '<td> <a href="' . base_url() . 'index.php/conecte/visualizarCompra/' . $p->idVendas . '" class="btn"> <i class="fas fa-eye" ></i> </a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Nenhum venda encontrada.</td></tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
-->

