<div class="os123" style="margin-top: 0; min-height: 50vh">


<div class="widget_painel_2 span12">
<!-- alterar para permissão de o cliente adicionar ou não a ordem de serviço -->
<!--
<input value="<?= $this->session->userdata('permissoes_os') ?>"/>
<input value="<?= $this->session->userdata('permissoesos') ?>"/>
<input value="<?= $this->session->userdata('nome') ?>"/>
<input value="<?= $this->session->userdata('cliente_id') ?>"/>
<input value="<?= $this->session->userdata('sexo') ?>"/>
<input value=""/>
<input value=""/>
<input value=""/>
<input value=""/>
-->

<!--
<a title="Adicionar OS" href="<?php echo base_url(); ?>index.php/conecte/adicionarOs" class="button btn btn-mini btn-success tip-top" target="_blank" style="margin-bottom:10px">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar OS</span></a>
-->

</div>

<div class="widget_box_2">
<div class="widget_title_2">
<h4><i class="fas fa-diagnoses"></i></h4>
<h5>Ordens de Serviço</h5>


</div>
<table id="tabela" width="100%" class="table_w">
                <thead>
                <tr>
                    <th width="7%">N° OS</th>
                    <th width="20%">Descrição</th>
                    <th width="15%">Tecnico</th>
                    <th width="10%">Data Inicial</th>
                    <th width="10%">Data Final</th>
                    <th width="9%">Valor Total</th>
                    <th>Status</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
<tbody>
<?php
if (!$results) {
echo '<tr>
<td colspan="8">Você ainda não tem nenhuma Ordem de Serviço</td>
</tr>';}
                        foreach ($results as $r) {
							$DescricaoShort = mb_strimwidth(strip_tags($r->descricaoProduto), 0, 50, "...");
							$ResponsávelShort = mb_strimwidth(strip_tags($r->nome), 0, 15, "...");
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
	echo '<td align="center">' . $ResponsávelShort . '</td>';
	echo '<td align="center">' . $dataInicial . '</td>';
	echo '<td align="center">' . $dataFinal . '</td>';
	echo '<td align="center">R$: ' . number_format($r->totalProdutos + $r->totalServicos, 2, ',', '.') . '</td>';
	echo '<td align="center"><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span></td>';
	echo '<td align="center"><a href="' . base_url() . 'index.php/conecte/visualizarOs/' . $r->idOs . '" class="btn-nwe" title="Visualizar"><i class="fas fa-eye"></i></a>
							<a href="' . base_url() . 'index.php/conecte/imprimirOs/' . $r->idOs . '" class="btn-nwe3" title="Imprimir"><i class="fas fa-print"></i></a>
							<a href="' . base_url() . 'index.php/conecte/detalhesOs/' . $r->idOs . '" class="btn-nwe2 title="Ver mais detalhes"><i class="fas fa-edit"></i></a>
                              </td>';
                            echo  '</td>';
	echo '</tr>';
                        } ?>
</tbody>
</table>


</div>
<div class="widget_painel_2">
<?= $this->pagination->create_links() ?>
</div>
</div>