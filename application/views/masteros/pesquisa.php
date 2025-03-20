
<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Pesquisa</h5>
</div>


<form action="<?php echo current_url() ?>" class="form_horizontal">
<div class="control_group_up" style="padding: 1%; margin-top: 5px">
<div class="span12 well" style="padding: 1%; margin-left: 0">
<div class="span10">
<input type="text" class="span12" name="termo" placeholder="Digite o termo a pesquisar"/>
</div>
<div class="span2">
<button class="button_mini btn btn-mini btn-warning"><span class="button_icon"><i class='fas fa-search'></i></span> <span class="button_text">Pesquisar</span></button>
</div>

</div>
</div>
</form>



<div class="widget_painel">
<!-- Orçamento -->
<?php if ($configuration['orcamento'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Ordens de Serviço</h5>
</div>
<div class="widget_painel">
<table class="table_w">
                        <thead>
                            <tr>
                                <th>OS N°</th>
                                <th>Data de Entrada</th>
                                <th>Descrição</th>
                                <th>Problema Informado</th>
                                <th>Nº Série</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        
                        if ($os == null) {
					echo '<tr><td colspan="7">Nenhuma os foi encontrado.</td></tr>';
                        }
					foreach ($os as $r) {
                            $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                            $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                            $descricaoShort = mb_strimwidth(strip_tags($r->descricaoProduto), 0, 25, "...");
                            $defeitoShort = mb_strimwidth(strip_tags($r->defeito), 0, 25, "...");
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
                case 'Finalizado':
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
			echo '<tr>';
			echo '<td><div align="center"><a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" target="_blank" class="tip-top" title="Visualizar detalhes da OS" style="margin-right: 1%">' . $r->idOs . '</a></td>';
			echo '<td><div align="center">' . $dataInicial . '</div></td>';
			echo '<td>' . $descricaoShort . '</td>';
			echo '<td>' . $defeitoShort . '</td>';
			echo '<td><div align="center">' . $r->serial . '</div></td>';
			echo '<td><div align="center"><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span></div></td>';
			echo '<td><div align="center">';
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
			echo '<a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" class="btn-nwe" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
			echo '<a href="' . base_url() . 'index.php/os/imprimir/' . $r->idOs . '" class="btn-nwe3" title="Imprimir"><i class="fas fa-print"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
			echo '<a href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn-nwe2 title="Editar OS"><i class="fas fa-edit"></i></a>';
                            }
			
			
//                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
//			echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" target="_blank" class="btn tip-top" title="Visualizar detalhes da OS"><i class="fas fa-eye"></i></a>';
//                            }
//                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
//			echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" target="_blank" class="btn btn-info tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
//                            }
//                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
//			echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/imprimir/' . $r->idOs . '" target="_blank" class="btn btn-inverse tip-top" title="Imprimir Normal A4"><i class="fas fa-print"></i></a>';
//                            }
                            
			echo  '</div></td>';
			echo '</tr>';
                        }
                        ?>
                            <tr>
                            </tr>
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
<h5>Equipamento OS</h5>
</div>
<div class="widget_painel">
<table class="table_w">
                        <thead>
                            <tr>
                                <th>OS N°</th>
                                <th>Equipamento</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Nº Série</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($equipamento_os == null) {
			echo '<tr><td colspan="7">Nenhum Equipamento foi encontrado.</td></tr>';
                            }
    					foreach ($equipamento_os as $w) {
                                
			echo '<tr>';
			echo '<td><div align="center">' . $w->os_id . '</div></td>';
			echo '<td><div align="center">' . $w->equipamento . '</div></td>';
			echo '<td><div align="center">' . $w->modelo . '</div></td>';
			echo '<td><div align="center">' . $w->marca . '</div></td>';
			echo '<td><div align="center">' . $w->num_serie . '</div></td>';
			echo '<td><div align="center">';
								
								if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
			echo '<a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" class="btn-nwe" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
			echo '<a href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn-nwe2 title="Editar OS"><i class="fas fa-edit"></i></a>';
                            }
							
			echo '</div></td>';
			echo '</tr>';
                            } ?>
                            <tr>
                            </tr>
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
<h5>Produtos</h5>
</div>
<div class="widget_painel">
<table class="table_w">
                        <thead>
                            <tr>
                                <th>Cod. Produto</th>
                                <th>Cod. Barras</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($produtos == null) {
			echo '<tr><td colspan="5">Nenhum produto foi encontrado.</td></tr>';
                            }
    					foreach ($produtos as $r) {
                                $descricaoShort = mb_strimwidth(strip_tags($r->descricao), 0, 50, "...");
			echo '<tr>';
			echo '<td><div align="center">' . $r->idProdutos . '</div></td>';
			echo '<td><div align="center">' . $r->codDeBarra . '</div></td>';
			echo '<td>' . $descricaoShort . '</td>';
			echo '<td><div align="center">R$: ' . $r->precoVenda . '</div></td>';
			echo '<td><div align="center">';
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) {
			echo '<a href="' . base_url() . 'index.php/produtos/visualizar/' . $r->idOs . '" class="btn-nwe" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProduto')) {
			echo '<a href="' . base_url() . 'index.php/produtos/editar/' . $r->idOs . '" class="btn-nwe2 title="Editar Produto"><i class="fas fa-edit"></i></a>';
                            }
			echo '</div></td>';
			echo '</tr>';
                            } ?>
                            <tr>
                            </tr>
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
<h5>Clientes</h5>
</div>
<div class="widget_painel">
                    <table class="table_w">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>CPF/CNPJ</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($clientes == null) {
			echo '<tr><td colspan="4">Nenhum cliente foi encontrado.</td></tr>';
                            }
    					foreach ($clientes as $r) {
                                $NomeClienteShort = mb_strimwidth(strip_tags($r->nomeCliente), 0, 30, "...");
                                
			echo '<tr>';
			echo '<td><div align="center">' . $r->idClientes . '</div></td>';
			echo '<td><a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" target="_blank" style="margin-right: 1%" class="tip-top" title="Visualizar detalhes do Cliente">' . $NomeClienteShort . '</a></td>';
			echo '<td><div align="center">' . $r->documento . '</div></td>';
			echo '<td><div align="center">';
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
			echo '<a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" class="btn-nwe" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                            }
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
			echo '<a href="' . base_url() . 'index.php/clientes/editar/' . $r->idClientes . '" class="btn-nwe2 title="Editar Cliente"><i class="fas fa-edit"></i></a>';
                            }
			echo '</div></td>';
			echo '</tr>';
                            }
                            ?>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
</div>
</div>
<?php } ?>
<!-- Fim Em Andamento -->

<!-- Serviços -->
<?php if ($configuration['aguardando_pecas'] == 1 ) { ?>
<div class="widget_content_4">
<div class="widget_title_4">
<h5>Serviços</h5>
</div>
<div class="widget_painel">
<table class="table_w">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        if ($servicos == null) {
			echo '<tr><td colspan="4">Nenhum serviço foi encontrado.</td></tr>';
                        }
					foreach ($servicos as $r) {
			echo '<tr>';
			echo '<td><div align="center">' . $r->idServicos . '</div></td>';
			echo '<td>' . $r->nome . '</td>';
			echo '<td><div align="center">R$: ' . $r->preco . '</div></td>';
			echo '<td><div align="center">';
                            if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eServico')) {
			echo '<a href="' . base_url() . 'index.php/servicos/editar/' . $r->idServicos . '" class="btn-nwe2 title="Editar Cliente"><i class="fas fa-edit"></i></a>';
                            }
			echo '</div></td>';
			echo '</tr>';
                        }
                        ?>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
</div>
</div>
<?php } ?>
<!-- Serviços -->
</div>





</div>
</div>