<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Dados do Cliente</h5>
</div>
<div class="widget_content_3">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#tab1">Dados do Cliente</a></li>
<li><a data-toggle="tab" href="#tab2">Ordens de Serviço</a></li>
</ul>

<div class="widget_content tab-content"> <!--Borda tabela externa-->
<!-- Dados do Cliente -->
<div id="tab1" class="tab-pane active" style="min-height: 338px"><!--Tamanho Geral da Pagina-->
<div class="widget_content tab-content" id="collapse-group">


<div class="acordion_group acordion_group_1">
<div class="acordion_heading">
<div class="acordion_title">
<a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
<span><i class="fas fa-user icon_cli" ></i></span>
<h5>Dados Pessoais</h5>
</a>
</div>
</div>

<div class="collapse in" id="collapseGOne">
                        <div class="acordion_content">
                            <table class="table_w">
                                <tbody>
                                <tr>
                                    <td style="text-align: right; width: 30%"><strong>Nome</strong></td>
                                    <td>
                                        <?php echo $result->nomeCliente ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Documento</strong></td>
                                    <td>
                                        <?php echo $result->documento ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Data de Cadastro</strong></td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($result->dataCadastro)) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Tipo do Cliente</strong></td>
                                    <td>
                                        <?php echo $result->fornecedor == true ? 'Fornecedor' : 'Cliente'; ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
<div class="acordion_group acordion_group_2">
                    <div class="acordion_heading">
                        <div class="acordion_title">
                            <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse">
                                <span><i class='fas fa-phone-alt icon_cli'></i></span>
                                <h5>Contatos</h5>
                            </a>
                        </div>
                    </div>
                    <div class="collapse" id="collapseGTwo">
                        <div class="acordion_content">
                             <table class="table_w">
                                <tbody>
                                <tr>
                                        <td style="text-align: right; width: 30%"><strong>Telefone</strong></td>
                                        <td>
						<?php echo $result->telefone ?></td>
                        			<td>
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
    $zapnumber = preg_replace("/[^0-9]/", "", $result->telefone);
    echo '<a title="Enviar Por WhatsApp" class="button_mini btn btn-mini btn-success" style="min-width: 140px; top:10px" href="whatsapp://send?phone=55' . $zapnumber . '">
<span class="button_icon"><i class="fab fa-whatsapp"></i></span><span class="button_text">WhatsApp</span></a>';
} ?>

<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
    $zapnumber = preg_replace("/[^0-9]/", "", $result->telefone);
    echo '<a title="Enviar Por WhatsApp Web" class="button_mini btn btn-mini btn-success" style="min-width: 140px; top:10px" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '">
<span class="button_icon"><i class="fab fa-whatsapp"></i></span><span class="button_text">WhatsApp Web</span></a>';
} ?>
                                    </td>
                                    </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Telefone 2</strong></td>
                                    <td>
                                        <?php echo $result->celular ?>
                                    </td><td></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Email</strong></td>
                                    <td>
                                        <?php echo $result->email ?>
                                    </td><td></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right; width: 30%"><strong>Senha</strong></td>
                                    <td>
                                        <?php echo $result->senha ?>
                                    </td><td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<div class="acordion_group acordion_group_3">
                    <div class="acordion_heading">
                        <div class="acordion_title">
                            <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse">
                                <span><i class='fas fa-map-marked-alt icon_cli' ></i></span>
                                <h5>Endereço</h5>
                            </a>
                        </div>
                    </div>
                    <div class="collapse" id="collapseGThree">
                        <div class="acordion_content">
                            <table class="table_w">
                                <tbody>
                                <tr>
                                    <td style="text-align: right; width: 30%;"><strong>Rua</strong></td>
                                    <td>
                                        <?php echo $result->rua ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Número</strong></td>
                                    <td>
                                        <?php echo $result->numero ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Complemento</strong></td>
                                    <td>
                                        <?php echo $result->complemento ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Bairro</strong></td>
                                    <td>
                                        <?php echo $result->bairro ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>Cidade</strong></td>
                                    <td>
                                        <?php echo $result->cidade ?> -
                                        <?php echo $result->estado ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right"><strong>CEP</strong></td>
                                    <td>
                                        <?php echo $result->cep ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
</div>

</div>
</div>
<!-- Fim Dados do Cliente -->

<!-- rdens de Serviço -->
<div id="tab2" class="tab-pane" style="min-height: 338px">
<?php if (!$results) { ?>
<div class="acordion_config">
<div class="acordion_content">
<div class="acordion_title">
<span><i class="fas fa-diagnoses icon_cli" ></i></span>
<h5>Ordens de Serviço</h5>
</div>
<table class="table_w">
                    <thead>
                    <tr>
                        <th>N° OS</th>
                        <th>Data Entrada</th>
                        <th>Data Final</th>
                        <th>Descricao</th>
                        <th>Defeito</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
<td colspan="6">Nenhuma OS Cadastrada</td>
</tr>
</tbody>
</table>
</div>
</div>
<?php } else { ?>
<div class="acordion_config">
<div class="acordion_content">
<div class="acordion_title">
<span><i class="fas fa-diagnoses icon_cli" ></i></span>
<h5>Ordens de Serviço</h5>
</div>
<table class="table_w">
                    <thead>
                    <tr>
                        <th width="7%">N° OS</th>
                        <th width="10%">Data Entrada</th>
                        <th width="10%">Data Final</th>
                        <th>Descricao</th>
                        <th>Defeito</th>
                        <th width="7%">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($results as $r) {
                        $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                        $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                        echo '<tr>';
                        echo '<td align="center">' . $r->idOs . '</td>';
                        echo '<td align="center">' . $dataInicial . '</td>';
                        echo '<td align="center">' . $dataFinal . '</td>';
                        echo '<td align="center">' . $r->descricaoProduto . '</td>';
                        echo '<td align="center">' . $r->defeito . '</td>';

                        echo '<td align="center">';
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                            echo '<a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" style="margin-right: 1%" class="btn-nwe tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
                            echo '<a href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn-nwe3 tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
                        }

                        echo  '</td>';
                        echo '</tr>';
                    } ?>
			<tr>
		</tr>
	</tbody>
</table>
</div>
</div>
<?php } ?>
</div>
<!-- Fim rdens de Serviço -->

</div>
</div>
<div class="form_actions" align="center">
<a title="Voltar" class="button_mini btn btn-mini btn-warning" style="min-width: 140px; top:10px" href="<?php echo site_url() ?>/clientes">
<span class="button_icon"><i class="fas fa-undo-alt"></i></span><span class="button_text">Voltar</span></a>
</div>

</div>
</div>
</div>