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
                    
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">

                        <table class="table table-condensed">
                            <tbody>
                                <?php if ($emitente == null) { ?>

                                    <tr>
                                        <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<<</td> </tr> <?php } else { ?> <tr>
<td style="width: 25%"><br><img src=" <?php echo $emitente[0]->url_logo; ?> " style="max-height: 100px"></td>
<td><span style="font-size: 15px"><b> <?php echo $emitente[0]->nome; ?></b></span></br>
<i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $emitente[0]->cnpj; ?></br>
<i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro . ' - ' . $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>
<i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?= 'CEP: ' . $emitente[0]->cep; ?><br>
<i class="fas fa-envelope" style="margin:5px 1px"></i> <?php echo $emitente[0]->email; ?></br>
<i class="fas fa-phone-alt" style="margin:5px 1px"></i> <?php echo $emitente[0]->telefone; ?></td>
        
        <td style="text-align: center">
        <span style="font-size: 12px"><b>OS N°: </b><span><?php echo $result->idOs ?></span></br>
        <span style="font-size: 12px"><b>Emissão:</b> <?php echo date('d/m/Y') ?></span></br>
        <span style="font-size: 12px"><b>Status OS: </b><?php echo $result->status ?></span></br>
        <span style="font-size: 12px"><b>Data de Entrada: </b><?php echo date('d/m/Y', strtotime($result->dataInicial)); ?></span></br>
        <span style="font-size: 12px"><b>Data Final: </b><?php echo date('d/m/Y', strtotime($result->dataFinal)); ?></span></br>
        <?php if ($result->dataSaida != null) { ?>
        <span style="font-size: 12px"><b>Data de Saida: </b><?php echo htmlspecialchars_decode($result->dataSaida) ?><?php } ?></span></br>
        <?php if ($result->garantia != null) { ?>
        <span style="font-size: 12px"><b>Garantia até: </b><?php echo htmlspecialchars_decode($result->garantia) ?><?php } ?></span></br></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>

                        <table class="table table-condensend" width="100%">
                      <tbody>
                        <td>
            <span style="font-size: 13px"><b>Cliente</b></span><br>
            <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nomeCliente ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $result->rua ?>,
                                                    <?php echo $result->numero ?>,
                                                    <?php echo $result->bairro ?>,
                                                    <?php echo $result->cidade ?> -
                                                    <?php echo $result->estado ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> CEP: <?php echo $result->cep ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-envelope" style="margin:5px 1px"></i> <?php echo $result->email ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i> <?php echo $result->telefone ?></span>
                          </td>
                          <td>
			<span style="font-size: 13px"><b>Responsável</b></span><br>
            <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nome ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-envelope" style="margin:5px 1px"></i> <?php echo $result->email_responsavel ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i> <?php echo $result->telefone_usuario ?></span>
            </td>
                        </tr>
                      </tbody>
                    </table>

                    </div>
                    <div style="margin-top: 0; padding-top: 0">
                      
                      <table class="table table-condensed" width="100%">
                            <td><?php if ($result->serial != null) { ?>
                                    <span style="font-size: 13px; ">
                              <b>Nº Série:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->serial) ?>
                            <?php } ?></td>
                            <td><?php if ($result->marca != null) { ?>
                                    <span style="font-size: 13px; ">
                              <b>Marca:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->marca) ?>
                            <?php } ?></td>
                          </tr>
                        </table>
                        
                  </div>
                    <div style="margin-top: 0; padding-top: 0">

                        <table width="100%" class="table table-condensed">
                            <tbody>
                            
                            <?php if ($result->rastreio != null) { ?>
                                    <tr>
                                        <td><span style="font-size: 13px; ">
                                            <b>Cod. de Rastreio:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->rastreio) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            
							<?php if ($result->descricaoProduto != null) { ?>
                                    <tr>
                                        <td><span style="font-size: 14px; ">
                                            <b>Descrição Produto/Serviço:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->descricaoProduto) ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->defeito != null) { ?>
                                    <tr>
                                        <td><span style="font-size: 13px; ">
                                            <b>Problema Informado:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->defeito) ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->observacoes != null) { ?>
                                    <tr>
                                        <td><span style="font-size: 13px; ">
                                            <b>Observações:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->observacoes) ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if ($result->laudoTecnico != null) { ?>
                                    <tr>
                                        <td><span style="font-size: 13px; ">
                                            <b>Relatório Técnico:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->laudoTecnico) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <td><span style="font-size: 13px"></td>
                            </tbody>
                        </table>
                        <div class"span12">
						<?php if ($equipamento != null) { ?>
                            <table width="100%" class="table table-bordered table-condensed" id="tblEquipamento">
                                <thead>
                                    <tr>
                                        <th width="20%">Equipamento</th>
                                        <th width="20%">Modelo/Cor</th>
                                        <th width="15%">Nº Série</th>
                                        <th width="5%">Voltagem</th>
                                        <th width="40%">Observação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($equipamento as $e) {

                                        		echo '<tr>';
                                                echo '<td><div align="center">' . $e->equipamento . '</div></td>';
                                                echo '<td><div align="center">' . $e->modelo . '</div></td>';
												echo '<td><div align="center">' . $e->num_serie . '</div></td>';
												echo '<td><div align="center">' . $e->voltagem . '</div></td>';
												echo '<td><div align="center">' . $e->observacao . '</div></td>';
                                                echo '</tr>';} ?>
    									</tbody>
                            </table>
                        <?php } ?>
						</div>
                        <div class"span12">
						<?php if ($produtos != null) { ?>
                            <table width="100%" class="table table-bordered table-condensed" id="tblProdutos">
                                <thead>
                                    <tr>
                                        <th width="8%">SKU</th>
                                        <th width="10%">Cod. Barras</th>
                                        <th>Produto</th>
                                        <th width="10%">Quantidade</th>
                                        <th width="10%">Preço unit.</th>
                                        <th width="10%">Sub-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($produtos as $p) {

                                        $totalProdutos = $totalProdutos + $p->subTotal;
                                        echo '<tr>';
										echo '<td><div align="center">' . $p->idProdutos . '</div></td>';
                                        echo '<td><div align="center">' . $p->codDeBarra . '</div></td>';
										echo '<td>' . $p->descricao . '</td>';
                                        echo '<td><div align="center">' . $p->quantidade . '</div></td>';
                                        echo '<td><div align="center">R$ ' . $p->preco ?: $p->precoVenda . '</div></td>';
                                        echo '<td><div align="center">R$ ' . number_format($p->subTotal, 2, ',', '.') . '</div></td>';
                                        echo '</tr>';} ?>
    									<tr>
                                        <td colspan="5" style="text-align: right"><strong>Total:</strong></td>
                                        <td><strong><div align="center">R$ <?php echo number_format($totalProdutos, 2, ',', '.'); ?></div></strong></td>
                                    	</tr>
                                </tbody>
                            </table>
                        <?php } ?>
                        </div>
                        <div class"span12">
						<?php if ($servicos != null) { ?>
                            <table width="100%" class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>Serviço</th>
                                        <th width="10%">Quantidade</th>
                                        <th width="10%">Preço unit.</th>
                                        <th width="10%">Sub-total</th>
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
                                        echo '<td>' . $s->nome . '</td>';
                                        echo '<td>' . ($s->quantidade ?: 1) . '</td>';
                                        echo '<td>R$ ' . $preco . '</td>';
                                        echo '<td>R$ ' . number_format($subtotal, 2, ',', '.') . '</td>';
                                        echo '</tr>';
                                    } ?>

                                    <tr>
                                        <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                                        <td><strong>R$ <?php echo number_format($totalServico, 2, ',', '.'); ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                        </div>
                        <?php
                        if ($totalProdutos != 0 || $totalServico != 0) {
                            echo "<h4 style='font-size: 15px; text-align: right'>Valor Total: R$" . number_format($totalProdutos + $totalServico, 2, ',', '.') . "</h4>";
                        }
                        ?>
                        <!-- ANEXOS -->
                        <div class"span12">
						<?php if ($anexos != null) { ?>
                            <table class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>Anexo</th>
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
                                    echo '<div class="span3" style="min-height: 200px; margin-left: 0">
									<a style="min-height: 200px;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal"><img src="' . $thumb . '" alt=""></a></div>';
									
                                } ?>
                                
                                </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                        </div>
                    <!-- Fim ANEXOS -->
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
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
