<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_1">
<h5><i class="fas fa-user-cog"></i> Meus Dados</h5>

</div>
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


</div>
<div class="form_actions" align="center">
<a title="Editar" class="button_mini btn btn-success" href="<?php echo base_url() ?>index.php/conecte/editarDados/<?php echo $result->idClientes ?>"><span class="button_icon"><i class="fas fa-edit"></i></span> <span class="button_text">Editar</span></a>
</div>

</div>
</div>
</div>