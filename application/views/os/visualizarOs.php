<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>
<link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
<?php $totalServico = 0; $totalProdutos = 0; ?>


<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3" align="center" style="padding:5px; margin-bottom:5px;">

<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) { ?>
<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Adicionar OS" class="button_mini btn btn-mini btn-success tip-top" target="new" href="<?php echo base_url(); ?>index.php/os/adicionar">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar OS</span></a>
<?php } ?>

<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) { ?>
<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Editar OS" class="button_mini btn btn-mini btn-info tip-top" href="<?php echo site_url() ?>/os/editar/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-edit'></i></span><span class="button_text">Editar OS</span></a>
<?php } ?>

<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Imprimir" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/os/imprimir/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir A4</span></a>

<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Imprimir Termica" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/os/imprimirTermica/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir Termica</span></a>

<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Imprimir Termica 2" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/os/imprimirTermica2/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir Termica 2</span></a>

<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Enviar WhatsApp" class="button_mini btn btn-mini btn-success tip-top" id="btn-whatsapp" href="#modal-whatsapp" data-toggle="modal">
<span class="button_icon"><i class='fab fa-whatsapp'></i></span><span class="button_text">WhatsApp</span></a>

<!--<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Enviar por E-mail" class="button_mini btn btn-mini btn-warning tip-top" target="new" href="<?php echo site_url() ?>/os/enviar_email/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-envelope'></i></span><span class="button_text">Enviar por E-mail</span></a>-->

<?php if ($result->rastreio != null) { ?>
<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Rastrear" class="button_mini btn btn-mini btn-warning tip-top" target="new" href="https://www.linkcorreios.com.br/<?php echo $result->rastreio ?>">
<span class="button_icon"><i class='fas fa-envelope'></i></span><span class="button_text">Rastrear</span></a>
<?php } ?>
</div>
</div>

<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Visualizar OS</h5>
</div>
<div class="well_0">

<div class="widget_content_printer2">
<table width="100%" class="table_w">

                                    <?php if ($emitente == null) { ?>
                                    <tr>
                                        <td colspan="3" class="alert">Você precisa configurar os dados do emitente.
                                            >>><a
                                                href="<?php echo base_url(); ?>index.php/masteros/emitente">Configurar</a>
                                            <<< </td>
                                    </tr>
                                    <?php } else { ?>
                                    <tr>
                                        <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                                        <td>
                                            <b><?php echo $emitente[0]->nome; ?></b></br>
                                            <i class="fas fa-fingerprint" style="margin:0px 1px"></i>
                                            <?php echo $emitente[0]->cnpj; ?></br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 3px"></i>
                                            <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></br>
                                            <i class="fas fa-map-marker-alt"
                                                style="margin:0px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>
                                            <i class="fas fa-map-marker-alt"
                                                style="margin:0px 3px"></i> <?= 'CEP: ' . $emitente[0]->cep; ?><br>
                                            <i class="fas fa-envelope"
                                                style="margin:0px 1px"></i>  <?php echo $emitente[0]->email; ?></br>
                                            <i class="fas fa-phone-alt"
                                                style="margin:0px 1px"></i>  <?php echo $emitente[0]->telefone; ?>
                                        </td>

                                        <td style="text-align: center; font-size:12px">
                                            <b>OS N°: </b><span><?php echo $result->idOs ?></br>
                                                <b>Emissão:</b> <?php echo date('d/m/Y') ?></br>
                                                <b>Status OS: </b><?php echo $result->status ?></br>
                                                <b>Data de Entrada:
                                                </b><?php echo date('d/m/Y', strtotime($result->dataInicial)); ?></br>
                                                <b>Data Final:
                                                </b><?php echo date('d/m/Y', strtotime($result->dataFinal)); ?></br>
                                                <?php if ($result->dataSaida != null) { ?>
                                                <b>Data de Saida:
                                                </b><?php echo date('d/m/Y', strtotime($result->dataSaida)); ?><?php } ?></br>
                                                <?php if ($result->garantia != null) { ?>
                                                <b>Garantia até:
                                                </b><?php echo date('d/m/Y', strtotime($result->garantia)); ?><?php } ?></br>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
</div>

<div class="widget_content_printer2">
<table width="100%" class="table_w">
                                    <tr>
                                        <td colspan="2">
                                            <b>Cliente</b><br>
                                            <i class="fas fa-user-check"></i> <?php echo $result->nomeCliente ?><br>
                                            <i class="fas fa-fingerprint" style="margin:0px 1px"></i>
                                            <?php echo $result->documento ?><br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 3px"></i>
                                            <?php echo $result->rua ?>,
                                            <?php echo $result->numero ?>,
                                            <?php echo $result->bairro ?><br>
                                            <i class="fas fa-map-marker-alt"
                                                style="margin:0px 3px"></i> <?php echo $result->cidade ?> -
                                            <?php echo $result->estado ?><br>
                                            <i class="fas fa-map-marker-alt"
                                                style="margin:0px 3px"></i> CEP: <?php echo $result->cep ?><br>
                                            <i class="fas fa-phone-alt"
                                                style="margin:0px 1px"></i>  <?php echo $result->telefone ?>
                                        </td>
                                        <td>
                                            <b>Técnico</b><br>
                                            <i class="fas fa-user-check"></i> <?php echo $result->nome ?><br>
                                            <i class="fas fa-envelope" style="margin:0px 1px"></i>
                                            <?php echo $result->email_responsavel ?><br>
                                            <i class="fas fa-phone-alt" style="margin:0px 1px"></i>
                                            <?php echo $result->telefone_usuario ?>
                                        </td>
                                    </tr>
                                </table>
</div>

<div class="widget_content_printer2">
<table width="100%" class="table_w">
                                    <?php if ($result->serial != null) { ?>
                                    <tr>
                                        <td colspan="2">
                                            <b>Nº Série:</b><br>
                                            <?php echo htmlspecialchars_decode($result->serial) ?>
                                        </td>
                                        <?php } ?>
                                        <?php if ($result->marca != null) { ?>
                                        <td>
                                            <b>Marca:</b><br>
                                            <?php echo htmlspecialchars_decode($result->marca) ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
</div>

<div class="widget_content_printer2">
<table width="100%" class="table_w">
                                    <?php if ($result->rastreio != null) { ?>
                                    <tr>
                                        <td>
                                            <b>Cod. de Rastreio:</b><br>
                                            <?php echo htmlspecialchars_decode($result->rastreio) ?></p>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if ($result->descricaoProduto != null) { ?>
                                    <tr>
                                        <td>
                                            <b>Descrição Produto/Serviço:</b><br>
                                            <?php echo htmlspecialchars_decode($result->descricaoProduto) ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if ($result->defeito != null) { ?>
                                    <tr>
                                        <td>
                                            <b>Problema Informado:</b><br>
                                            <?php echo htmlspecialchars_decode($result->defeito) ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if ($result->observacoes != null) { ?>
                                    <tr>
                                        <td>
                                            <b>Observações:</b><br>
                                            <?php echo htmlspecialchars_decode($result->observacoes) ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if ($result->laudoTecnico != null) { ?>
                                    <tr>
                                        <td>
                                            <b>Relatório Técnico:</b><br>
                                            <?php echo htmlspecialchars_decode($result->laudoTecnico) ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
</div>

<div class="widget_content_printer2">
                                <?php if ($equipamentos != null) { ?>
                                <table width="100%" class="table_w">
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
                        </tr>
                    </thead>
                                    <tbody>
                                        <?php
                                
                                foreach ($equipamentos as $x) {
					echo '<tr>';
					echo '<td align="center">' . $x->equipamento . '</td>';
					echo '<td align="center">' . $x->marca . '</td>';
					echo '<td align="center">' . $x->tipo . '</td>';
					echo '<td align="center">' . $x->num_serie . '</td>';
					echo '<td align="center">' . $x->modelo . '</td>';
					echo '<td align="center">' . $x->cor . '</td>';
					echo '<td align="center">' . $x->voltagem . '</td>';
					echo '<td align="center">' . $x->potencia . '</td>';
					echo '<td align="center">' . $x->observacao . '</td>';
					echo '</tr>';
                                } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
</div>

<div class="widget_content_printer2">
                                <?php if ($anotacoes != null) { ?>
                                <table width="100%" class="table_w">
                                    <thead>
                                        <tr>
                                            <th>Anotação</th>
                                            <th>Data/Hora</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                
                                foreach ($anotacoes as $a) {
					echo '<tr>';
					echo '<td align="center">' . $a->anotacao . '</td>';
					echo '<td align="center">' . date('d/m/Y H:i:s', strtotime($a->data_hora)) . '</td>';
					echo '</tr>';
                                } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
</div>

<div class="widget_content_printer2">
                                <?php if ($produtos != null) { ?>
                                <table width="100%" class="table_w" id="tblProdutos">
                                    <thead>
                                        <tr>
                                            <th width="10%">Cod. Produto</th>
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
    					echo '<td align="center">' . $p->idProdutos . '</td>';
    					echo '<td>' . $p->descricao . '</td>';
    					echo '<td align="center">' . $p->quantidade . '</td>';
    					echo '<td align="center">R$: ' . $p->preco ?: $p->precoVenda . '</td>';
    					echo '<td align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
    					echo '</tr>';
                                    } ?>
                                        <tr>
                                            <td colspan="4" style="text-align: right; font-size:12px">
                                                <strong>Total: </strong>
                                            </td>
                                            <td><strong>
                                                    <div align="center">R$:
                                                        <?php echo number_format($totalProdutos, 2, ',', '.'); ?></div>
                                                </strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
</div>

<div class="widget_content_printer2">
                                <?php if ($servicos != null) { ?>
                                <table width="100%" class="table_w">
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
    					echo '<td align="center">' . ($s->quantidade ?: 1) . '</td>';
    					echo '<td align="center">R$: ' . $preco . '</td>';
    					echo '<td align="center">R$: ' . number_format($subtotal, 2, ',', '.') . '</td>';
    					echo '</tr>';
                                    } ?>

                                        <tr>
                                            <td colspan="3" style="text-align: right; font-size:12px">
                                                <strong>Total: </strong>
                                            </td>
                                            <td>
                                                <div align="center"><strong>R$:
                                                        <?php echo number_format($totalServico, 2, ',', '.'); ?></strong>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
</div>
                        
                       <!-- Total OS -->
<?php
if ($totalProdutos != 0 || $totalServico != 0) {
echo "<h4 style='font-size: 14px; text-align: right'>Valor Total: R$ " . number_format($totalProdutos + $totalServico, 2, ',', '.') . "  "."</h4>";
echo $result->valor_desconto != 0 ? "<h4 style='font-size: 14px; text-align: right'>Desconto: R$ " . number_format($result->valor_desconto != 0 ? $result->valor_desconto - ($totalProdutos + $totalServico) : 0.00, 2, ',', '.') . "  "."</h4>" : ".";
echo $result->valor_desconto != 0 ? "<h4 style='font-size: 14px; text-align: right'>Total com Desconto: R$ " . number_format($result->valor_desconto, 2, ',', '.') . "  "."</h4>" : ".";
                        }
                        ?>
                       <!-- Fim Total OS -->

                        <!-- ANEXOS -->
<div class="widget_content_printer2">
                        <?php if ($anexos != null) { ?>
                        <div class"span12">
                            <table width="100%" class="table_w">
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
										$NomeAnexo = mb_strimwidth(strip_tags($a->anexo), 0, 20, "...");
                                    }
					echo '<div class="grade2" style="margin-bottom:5px; margin-left:1%;">
									<a style="min-height:210px; border: 1px solid #bbbbbb;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal">
									<img src="' . $thumb . '" alt="">
									</a>
									<span>' . $NomeAnexo . '</span>
									</div>';
                                } ?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php } ?>
</div>
                        <!-- Fim ANEXOS -->

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
	echo '<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 200px" title="Enviar Por WhatsApp" class="button_mini btn btn-mini btn-success tip-top" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $result->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $result->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($result->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $result->status . '*.%0d%0a%0d%0a' . strip_tags($result->defeito) . '%0d%0a%0d%0a' . strip_tags($result->observacoes) . '%0d%0a%0d%0a' . strip_tags($result->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20*R$&#58%20'. $totalOS . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] . '">
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
	echo '<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 200px" title="Enviar Por WhatsApp" class="button_mini btn btn-mini btn-success tip-top" id="enviarWhatsApp" href="whatsapp://send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $result->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $result->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($result->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $result->status . '*.%0d%0a%0d%0a' . strip_tags($result->defeito) . '%0d%0a%0d%0a' . strip_tags($result->observacoes) . '%0d%0a%0d%0a' . strip_tags($result->laudoTecnico) . '%0d%0a%0d%0aValor%20Total%20*R$&#58%20'. $totalOS . '*%0d%0a%0d%0a' . $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20*' . $configuration['whats_app2'] . '*%20-%20*' . $configuration['whats_app3'] .'*%0d%0a%0d%0aAcesse%20a%20área%20do%20cliente%20pelo%20link%0d%0a'. $configuration['whats_app4'] .'%0d%0aE%20utilize%20estes%20dados%20para%20fazer%20Log-in%0d%0aEmail:%20*' . strip_tags($result->email) . '*%0d%0aSenha:%20*' . strip_tags($result->senha) . '*%0d%0aVocê%20poderá%20edita-la%20no%20menu%20*Minha%20Conta*">
<span class="button_icon"><i class="fab fa-whatsapp"></i></span><span class="button_text">Enviar Por WhatsApp</span></a>'
; } ?>
</div>
</form>
</div>
<!-- Fim Modal WhatsApp 2 -->

</div>
</div>
</div>


<script type="text/javascript">
$(document).ready(function() {
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
        var idOS = "<?php echo $result->idOs; ?>"

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
});
</script>