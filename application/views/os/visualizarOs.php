<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>
<link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
<?php $totalServico = 0;
$totalProdutos = 0; ?>
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Ordem de Serviço</h5>
                <div class="buttons">
                    
					<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
    echo '<a target="_new" title="Adicionar OS" class="btn btn-mini btn-success" href="' . base_url() . 'index.php/os/adicionar"><i class="fas fa-plus"></i> Adicionar OS</a>';
} ?>
                    
                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
    echo '<a title="Editar OS" class="btn btn-mini btn-info" href="' . base_url() . 'index.php/os/editar/' . $result->idOs . '"><i class="fas fa-edit"></i> Editar</a>';
} ?>
                    
                    <a target="_blank" title="Imprimir OS" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimir/<?php echo $result->idOs; ?>"><i class="fas fa-print"></i> Imprimir A4</a>
                    
                    <a target="_blank" title="Imprimir Termica" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimirTermica/<?php echo $result->idOs; ?>"><i class="fas fa-print"></i> Imprimir Termica</a>
                    
                    <a target="_blank" title="Imprimir Termica 2" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/os/imprimirTermica2/<?php echo $result->idOs; ?>"><i class="fas fa-print"></i> Imprimir Termica 2</a>
                    
                    <a href="https://www.linkcorreios.com.br/<?php echo $result->rastreio ?>" title="Rastrear" target="_new" class="btn btn-mini btn-warning"><i class="fas fa-envelope"></i> Rastrear</a>
                    
                    <a href="#modal-whatsapp" title="Enviar WhatsApp" id="btn-whatsapp" role="button" data-toggle="modal" class="btn btn-mini btn-success"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                    
                </div>
            </div>
            <div class="widget_content" id="printOs">
                <div class="widget_content_vusualizar widget_box_Painel2">
                    <div class="invoice-head" style="margin-bottom: 0">
<div class="widget_content_printer2">
<div class="widget_box_boddy">
<table width="100%" class="table_boddy">

  <?php if ($emitente == null) { ?>
  <tr>
    <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a><<<
    </td>
    </tr>
    <?php } else { ?>
  <tr>
    <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
    <td style="font-size:12px">
<b><?php echo $emitente[0]->nome; ?></b></br>
<i class="fas fa-fingerprint" style="margin:0px 1px"></i> <?php echo $emitente[0]->cnpj; ?></br>
<i class="fas fa-map-marker-alt" style="margin:0px 3px"></i> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></br>
<i class="fas fa-map-marker-alt" style="margin:0px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>
<i class="fas fa-map-marker-alt" style="margin:0px 3px"></i> <?= 'CEP: ' . $emitente[0]->cep; ?><br>
<i class="fas fa-envelope" style="margin:0px 1px"></i>  <?php echo $emitente[0]->email; ?></br>
<i class="fas fa-phone-alt" style="margin:0px 1px"></i>  <?php echo $emitente[0]->telefone; ?>
</td>

<td style="text-align: center; font-size:12px">
        <b>OS N°: </b><span><?php echo $result->idOs ?></br>
        <b>Emissão:</b> <?php echo date('d/m/Y') ?></br>
        <b>Status OS: </b><?php echo $result->status ?></br>
        <b>Data de Entrada: </b><?php echo date('d/m/Y', strtotime($result->dataInicial)); ?></br>
        <b>Data Final: </b><?php echo date('d/m/Y', strtotime($result->dataFinal)); ?></br>
        <?php if ($result->dataSaida != null) { ?>
        <b>Data de Saida: </b><?php echo htmlspecialchars_decode($result->dataSaida) ?><?php } ?></br>
        <?php if ($result->garantia != null) { ?>
        <b>Garantia até: </b><?php echo htmlspecialchars_decode($result->garantia) ?><?php } ?></br></td>
  </tr>
  <?php } ?>
  </table>
</div>
</div>

<div class="widget_content_printer2">
<div class="widget_box_boddy">
<table width="100%" class="table_boddy">
<tr>
    <td colspan="2" style="font-size:12px">
            <b>Cliente</b><br>
            <i class="fas fa-user-check"></i> <?php echo $result->nomeCliente ?><br>
            <i class="fas fa-fingerprint" style="margin:0px 1px"></i> <?php echo $result->documento ?><br>
            <i class="fas fa-map-marker-alt" style="margin:0px 3px"></i> <?php echo $result->rua ?>,
                                                    <?php echo $result->numero ?>,
                                                    <?php echo $result->bairro ?><br>
            <i class="fas fa-map-marker-alt" style="margin:0px 3px"></i> <?php echo $result->cidade ?> - <?php echo $result->estado ?><br> 
            <i class="fas fa-map-marker-alt" style="margin:0px 3px"></i> CEP: <?php echo $result->cep ?><br>
            <i class="fas fa-phone-alt" style="margin:0px 1px"></i>  <?php echo $result->telefone ?>
                          </td>
                          <td style="font-size:12px">
            <b>Técnico</b><br>
            <i class="fas fa-user-check"></i> <?php echo $result->nome ?><br>
            <i class="fas fa-envelope" style="margin:0px 1px"></i> <?php echo $result->email_responsavel ?><br>
            <i class="fas fa-phone-alt" style="margin:0px 1px"></i> <?php echo $result->telefone_usuario ?>
            </td>
  </tr>
</table>
</div>
</div>

<div class="widget_content_printer2">
<div class="widget_box_printer">
<table width="100%" class="table_boddy">
<tr>
    <td colspan="2" style="font-size:12px"><?php if ($result->serial != null) { ?>
                              <b>Nº Série:</b><br>                                            <?php echo htmlspecialchars_decode($result->serial) ?>
                            <?php } ?></td>
    <td style="font-size:12px"><?php if ($result->marca != null) { ?>
                              <b>Marca:</b><br>
                                            <?php echo htmlspecialchars_decode($result->marca) ?>
                            <?php } ?></td>
  </tr>
</table>
</div>
</div>

<div class="widget_content_printer2">
<div class="widget_box_printer2">
<table width="100%" class="table_box">
<tr>
    <td style="font-size:12px">
		<?php if ($result->rastreio != null) { ?>
			<b>Cod. de Rastreio:</b><br>
				<?php echo htmlspecialchars_decode($result->rastreio) ?></p>
		<?php } ?>
	</td>
</tr>
<tr>
    <td style="font-size:12px">
		<?php if ($result->descricaoProduto != null) { ?>
			<b>Descrição Produto/Serviço:</b><br>
				<?php echo htmlspecialchars_decode($result->descricaoProduto) ?>
		<?php } ?>
	</td>
</tr>
<tr>
    <td style="font-size:12px">
		<?php if ($result->defeito != null) { ?>
			<b>Problema Informado:</b><br>
				<?php echo htmlspecialchars_decode($result->defeito) ?>
		<?php } ?>
	</td>
</tr>
<tr>
    <td style="font-size:12px">
		<?php if ($result->observacoes != null) { ?>
			<b>Observações:</b><br>
				<?php echo htmlspecialchars_decode($result->observacoes) ?>
		<?php } ?>
	</td>
</tr>
<tr>
    <td style="font-size:12px">
		<?php if ($result->laudoTecnico != null) { ?>
			<b>Relatório Técnico:</b><br>
				<?php echo htmlspecialchars_decode($result->laudoTecnico) ?>
		<?php } ?>
	</td>
</tr>
</table>
</div>
</div>

<div class="widget_content_printer2">
<div class="widget_box_printer3">
                        	<?php if ($anotacoes != null) { ?>
                            <table width="100%" class="table_print3">
                                <thead>
                                    <tr>
                                <th style="font-size:12px">Anotação</th>
                                <th style="font-size:12px">Data/Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                
                                foreach ($anotacoes as $a) {
                                    echo '<tr>';
                                    echo '<td style="font-size:12px"><div align="center">' . $a->anotacao . '</div></td>';
                                    echo '<td style="font-size:12px"><div align="center">' . date('d/m/Y H:i:s', strtotime($a->data_hora)) . '</div></td>';
                                    echo '</tr>';
                                } ?>
                                </tbody>
                            </table>
                        <?php } ?>
</div>
</div>

<div class="widget_content_printer2">
<div class="widget_box_printer3">
						<?php if ($produtos != null) { ?>
                            <table width="100%" class="table_print3" id="tblProdutos">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px" width="10%">Cod. Produto</th>
                                        <th style="font-size:12px">Produto</th>
                                        <th style="font-size:12px" width="10%">Quantidade</th>
                                        <th style="font-size:12px" width="10%">Preço unit.</th>
                                        <th style="font-size:12px" width="10%">Sub-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($produtos as $p) {
                                        $totalProdutos = $totalProdutos + $p->subTotal;
                                        echo '<tr>';
                                        echo '<td style="font-size:12px"><div align="center">' . $p->idProdutos . '</div></td>';
                                        echo '<td style="font-size:12px">' . $p->descricao . '</td>';
                                        echo '<td style="font-size:12px"><div align="center">' . $p->quantidade . '</div></td>';
                                        echo '<td style="font-size:12px"><div align="center">R$: ' . $p->preco ?: $p->precoVenda . '</div></td>';
                                        echo '<td style="font-size:12px"><div align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</div></td>';
                                        echo '</tr>';
                                    } ?>
                                    <tr>
                                    <td colspan="4" style="text-align: right; font-size:12px"><strong>Total: </strong></td>
                                    <td style="font-size:12px"><strong><div align="center">R$: <?php echo number_format($totalProdutos, 2, ',', '.'); ?></div></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
</div>
</div>

<div class="widget_content_printer2">
<div class="widget_box_printer3">
						<?php if ($servicos != null) { ?>
                            <table width="100%" class="table_print3">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px">Serviço</th>
                                        <th style="font-size:12px" width="10%">Quantidade</th>
                                        <th style="font-size:12px" width="10%">Preço unit.</th>
                                        <th style="font-size:12px" width="10%">Sub-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    setlocale(LC_MONETARY, 'en_US');
                                    foreach ($servicos as $s) {
                                        $preco = $s->preco ?: $s->precoVenda;
                                        $subtotal = $preco * ($s->quantidade ?: 1);
                                        $totalServico = $totalServico + $subtotal;
                                        echo '<tr>';
                                        echo '<td style="font-size:12px">' . $s->nome . '</td>';
                                        echo '<td style="font-size:12px"><div align="center">' . ($s->quantidade ?: 1) . '</td>';
                                        echo '<td style="font-size:12px"><div align="center">R$: ' . $preco . '</td>';
                                        echo '<td style="font-size:12px"><div align="center">R$: ' . number_format($subtotal, 2, ',', '.') . '</td>';
                                        echo '</tr>';
                                    } ?>

                                    <tr>
                                        <td colspan="3" style="text-align: right; font-size:12px"><strong>Total: </strong></td>
                                        <td style="font-size:12px"><div align="center"><strong>R$: <?php echo number_format($totalServico, 2, ',', '.'); ?></strong></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
</div>
</div>

<?php
                        if ($totalProdutos != 0 || $totalServico != 0) {
                            echo "<h4 style='font-size: 14px; text-align: right'>Valor Total: R$" . number_format($totalProdutos + $totalServico, 2, ',', '.') . "  "."</h4>";
                        }?>


<!-- ANEXOS -->
                        
						<?php if ($anexos != null) { ?>
                        <div class"span12">
                            <table width="100%" class="table_print3">
                                <thead>
                                    <tr>
                                        <th style="font-size:12px">Anexo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>
							<?php
                                foreach ($anexos as $a) {
                                    if ($a->thumb == null) {
                                        $thumb = base_url() . 'assets/img/icon-file.png';
                                        $link = base_url() . 'assets/img/icon-file.png';
                                    } else {
                                        $thumb = $a->url . '/thumbs/' . $a->thumb;
                                        $link = $a->url . '/' . $a->anexo;
                                    }
                                    echo '<div class="span3" style="min-height: 200px; margin-left: 0; padding: 5px;">
									<a style="min-height: 180px; border: 1px solid #777;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal"><img src="' . $thumb . '" alt=""></a></div>';
                                } ?>
                                
                                </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        <?php } ?>
                        
                    <!-- Fim ANEXOS -->
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
<a href="#modal-gerar-pagamento" id="btn-forma-pagamento" role="button" data-toggle="modal" class="btn btn-success"><i
            class="fas fa-cash-register"></i> Gerar Pagamento</a>

<?= $modalGerarPagamento ?>

<!-- Modal visualizar anexo -->
<div id="modal-anexo" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal_header_anexos">
        <button type="button" class="close" style="color:#f00" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Visualizar Anexo</h3>
    </div>
    <div class="modal-body">
        <div class="span12" id="div-visualizar-anexo" style="text-align: center">
            <div class='progress progress-info progress-striped active'>
                <div class='bar' style='width: 100%'></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
        <a href="" link="" class="btn btn-danger" id="excluir-anexo">Excluir Anexo</a>
    </div>
</div>
<!-- Fim Modal visualizar anexo -->

<!-- Modal WhatsApp-->
<div id="modal-whatsapp" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo current_url() ?>" method="post">
        <div class="modal_header_anexos">
        <button type="button" class="close" style="color:#f00" data-dismiss="modal" aria-hidden="true">×</button>
            <div align="center">
              <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
                                    $zapnumber = preg_replace("/[^0-9]/", "", $result->celular_cliente);
                                    $totalOS = number_format($totalProdutos + $totalServico, 2, ',', '.');
                                    echo '<a title="Enviar Por WhatsApp" class="btn btn-success" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $result->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $result->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($result->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $result->status . '*.%0d%0a%0d%0a' . strip_tags($result->defeito) . '%0d%0a%0d%0a' . strip_tags($result->observacoes) . '%0d%0a%0d%0a' . strip_tags($result->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20*R$&#58%20'. $totalOS . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . strip_tags($result->email) . '*%0d%0aSenha:%20*' . strip_tags($result->senha) . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*"><i class="fab fa-whatsapp"></i> Enviar WhatsApp</a>';
                                } ?>
              
            </div>
        </div>
        <div class="modal-body">
        <div class="span12" style="margin-left: 0">
          <font size='2'>Prezado(a) <b><?php echo $result->nomeCliente ?></b>
          <br><br>
        <div>Sua <b>O.S <?php echo $result->idOs ?></b> referente ao equipamento <b><?php echo $result->descricaoProduto ?></b> foi atualizada para <b><?php echo $result->status ?></b></div>
        <br>
        <?php echo $result->defeito ?>
        <br><br>
        <?php echo $result->observacoes ?>
        <br><br>
        <?php echo $result->laudoTecnico ?>
        <br><br>
        <div>Valor Total <b>R$: <?php echo number_format($totalProdutos + $totalServico, 2, ',', '.') ?></b></div>
        <br>
		<?php echo $configuration['whats_app1'] ?>
        <br><br>
        <div>Atenciosamente <b><?php echo $configuration['whats_app2'] ?></b> - <b><?php echo $configuration['whats_app3'] ?></b></div>
        <br>
        <div>Acesse a área do cliente pelo link <font color='#1E90FF'><?php echo $configuration['whats_app4'] ?></font></div>
        <div>E utilize estes dados para fazer Log-In.
        <br>Email: <b><?php echo $result->email ?></b>
        <br>Senha: <b><?php echo $result->senha ?></b></div>
        <div>Você poderá edita-los no menu <b>Minha Conta</b></div>
        <br>
        </font>
      </div>
    </form>
</div>
<!-- Fim Modal WhatsApp-->

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.anexo', function (event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var id = $(this).attr('imagem');
            var url = '<?php echo base_url(); ?>index.php/os/excluirAnexo/';
            $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
            $("#excluir-anexo").attr('link', url + id);

            $("#download").attr('href', "<?php echo base_url(); ?>index.php/os/downloadanexo/" + id);

        });

        $(document).on('click', '#excluir-anexo', function (event) {
            event.preventDefault();

            var link = $(this).attr('link');
            var idOS = "<?php echo $result->idOs; ?>"

            $('#modal-anexo').modal('hide');
            $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");

            $.ajax({
                type: "POST",
                url: link,
                dataType: 'json',
                data: "idOs=" + idOS,
                success: function (data) {
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
    });
</script>
