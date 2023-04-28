<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>



<div class="os123" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2 span12">
<form method="get" action="<?php echo base_url(); ?>index.php/os/gerenciar">

<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aOs')) { ?>
<a title="Adicionar OS" href="<?php echo base_url(); ?>index.php/os/adicionar" class="button btn btn-mini btn-success tip-top" target="new" style="margin-bottom:10px">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar OS</span></a>
<?php } ?>

<div style="float:right">
<input style="margin-right:10px; max-width:150px" type="text" name="pesquisa" id="pesquisa" placeholder="Cliente a pesquisar" value="">

<select style="margin-right:10px; max-width:190px" name="status" id="">
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

<input style="margin-right:10px; max-width:100px" type="text" name="data" autocomplete="off" id="data" placeholder="Data Inicial" class="datepicker" value="" />

<input style="margin-right:10px; max-width:100px" type="text" name="data2" autocomplete="off" id="data2" placeholder="Data Final" class="datepicker" value="">

<button class="button btn btn-mini btn-warning" style="margin-bottom:10px; max-width:50px;"><span class="button_icon"><i class='fas fa-search'></i></span><span class="button_text">Pesquisar</span></button>

</div>
</form>
</div>


<div class="widget_box_2">

<div class="widget_title_2">
<h5>Ordens de Serviço</h5>
</div>

<table id="tabela" width="100%" class="table_w">
                <thead>
                <tr>
                    <th width="7%">N° OS</th>
                    <th width="18%">Descrição</th>
                    <th width="15%">Cliente</th>
                    <th width="12%">Responsável</th>
                    <th width="11%">Data de Entrada</th>
                    <th width="9%">Valor Total</th>
                    <!--
                        <th>Faturado</th>
                        -->
                    <th>Status</th>
                    <th width="12%">Ações</th>
                </tr>
            </thead>
                <tbody>
                <?php
                        
                        if (!$results) {
                            echo '<tr>
                                    <td colspan="10">Nenhuma OS Cadastrada</td>
                                  </tr>';
                        }
                        foreach ($results as $r) {
                            $NomeClienteShort = mb_strimwidth(strip_tags($r->nomeCliente), 0, 25, "...");
							$DescricaoShort = mb_strimwidth(strip_tags($r->descricaoProduto), 0, 30, "...");
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
                            echo '<td align="center"><a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" target="new" class="tip-top" title="Visualizar detalhes da OS" style="margin-right: 1%">' . $r->idOs . '</a></td>';
							echo '<td>' . $DescricaoShort . '</td>';
                            echo '<td><a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" target="new" class="tip-top" title="Visualizar Cliente" style="margin-right: 1%">' . $NomeClienteShort . '</a></td>';
                            echo '<td align="center">' . $ResponsávelShort . '</td>';
                            echo '<td align="center">' . $dataInicial . '</td>';
                            echo '<td align="center">R$: ' . number_format($r->totalProdutos + $r->totalServicos, 2, ',', '.') . '</td>';
                            echo '<td align="center"><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span></td>';
                            echo '<td align="center">';
                            /*
							if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" class="btn tip-top" title="Visualizar mais detalhes"><i class="fas fa-eye"></i></a>';
                                    }
									*/
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" target="new" class="btn-nwe3 tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
                            }
                            /*
							if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                $zapnumber = preg_replace("/[^0-9]/", "", $r->celular_cliente);
                                $eMailCliente = $r->email_cliemte;
                                $SenhaCliente = $r->senha_cliente;
                                $total_os = number_format($r->totalProdutos + $r->totalServicos, 2, ',', '.');
                                echo '<a class="btn btn-success tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $r->nomeCliente . '*.%0d%0a%0d%0aSua%20*OS:%20#' . $r->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($r->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $r->status . '*.%0d%0a%0d%0a' . strip_tags($r->defeito) . '%0d%0a%0d%0a' . strip_tags($r->observacoes) . '%0d%0a%0d%0a' . strip_tags($r->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20R$&#58%20*'. $total_os . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . $eMailCliente . '*%0d%0aSenha:%20*' . $SenhaCliente . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                            }
							*/
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/imprimir/' . $r->idOs . '" target="_blank" class="btn-nwe6 tip-top" title="Imprimir Normal A4"><i class="fas fa-print"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/imprimirTermica2/' . $r->idOs . '" target="_blank" class="btn-nwe6 tip-top" title="Imprimir Termica 2"><i class="fas fa-print"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dOs')) {
                                echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="' . $r->idOs . '" class="btn-nwe4 tip-top" title="Excluir OS"><i class="fas fa-trash"></i></a>  ';
                            }
                            echo  '</td>';
                            echo '</tr>';
                        } ?>
            </tbody>
</table>

</div>
<div class="widget_pagination">
<?= $this->pagination->create_links() ?>
</div>

</div>


<!-- Modal Excluir -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo base_url() ?>index.php/os/excluir" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Excluir OS</h5>
</div>
<div class="modal_body">
<input type="hidden" id="idOs" name="id" value="" />
<h4 style="text-align: center">Deseja realmente excluir esta OS?</h4>
</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
<button class="button_mini btn btn-danger"><span class="button_icon"><i class='fas fa-trash-alt'></i></span> <span class="button_text">Excluir</span></button>
</div>
</form>
</div>
<!-- Fim Modal Excluir -->

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var os = $(this).attr('os');
            $('#idOs').val(os);
        });
        $(document).on('click', '#excluir-notificacao', function(event) {
            event.preventDefault();
            $.ajax({
                    url: '<?php echo site_url() ?>/os/excluir_notificacao',
                    type: 'GET',
                    dataType: 'json',
                })
                .done(function(data) {
                    if (data.result == true) {
                        Swal.fire({
                            type: "success",
                            title: "Sucesso",
                            text: "Notificação excluída com sucesso."
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            type: "success",
                            title: "Sucesso",
                            text: "Ocorreu um problema ao tentar exlcuir notificação."
                        });
                    }
                });
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>
