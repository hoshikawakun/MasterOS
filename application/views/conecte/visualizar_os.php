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
 
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    

<script type="text/javascript">
    $(document).ready(function() {
        $("#imprimir").click(function() {
            PrintElem('#printOs');
        })

        function PrintElem(elem) {
            Popup($(elem).html());
        }

        function Popup(data) {
            var mywindow = window.open('', 'mydiv', 'height=600,width=800');
            mywindow.document.open();
            mywindow.document.onreadystatechange = function() {
                if (this.readyState === 'complete') {
                    this.onreadystatechange = function() {};
                    mywindow.focus();
                    mywindow.print();
                    mywindow.close();
                }
            }


            mywindow.document.write('<html><head><title>Map Os</title>');
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/bootstrap.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/matrix-style.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/matrix-media.css' />");

            mywindow.document.write("</head><body >");
            mywindow.document.write(data);
            mywindow.document.write("</body></html>");

            mywindow.document.close(); // necessary for IE >= 10

            return true;
        }
    });
</script>
