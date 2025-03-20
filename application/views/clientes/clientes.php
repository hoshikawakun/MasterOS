<div class="clientes123" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2">
<div class="span12">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aCliente')) { ?>
<div class="span4">
<a href="<?php echo base_url(); ?>index.php/clientes/adicionar" class="button btn btn-mini btn-success" style="margin-bottom:10px; max-width: 170px" target="_blank">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Cliente / Fornecedor</span></a>
</div>
<?php } ?>
</div>
</div>

<div class="widget_box_2">

<div class="widget_title_2">
<h5>Clientes</h5>
</div>

<table id="tabela" width="100%" class="table_w">
                <thead>
                    <tr>
                    <th width="6%">Cod.</th>
                    <th>Nome</th>
                    <th width="14%">CPF/CNPJ</th>
                    <th width="14%">Telefone</th>
                    <th>Email</th>
                    <th width="6%">Tipo</th>
                    <th width="17%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    
                    if (!$results) {
			echo '<tr>
                                <td colspan="5">Nenhum Cliente Cadastrado</td>
                                </tr>';
                    }
                    foreach ($results as $r) {
                        $NomeClienteShort = mb_strimwidth(strip_tags($r->nomeCliente), 0, 33, "...");
						$cor = ($r->fornecedor ? '#00aa00' : '#cd0000');
                        
			echo '<tr>';
			echo '<td align="center">' . $r->idClientes . '</td>';
			//echo '<td><a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" style="margin-right: 1%" class="tip-top" title="Visualizar mais detalhes" target="_blank">' . $NomeClienteShort . '</a></td>';
			echo '<td align="center">' . $NomeClienteShort . '</td>';
			echo '<td align="center">' . $r->documento . '</td>';
			echo '<td align="center">' . $r->telefone . '</td>';
			echo '<td align="center">' . $r->email . '</td>';
			echo '<td align="center"><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . ($r->fornecedor ? 'Fornecedor' : 'Cliente') . '</span> </td>';
			echo '<td align="center">';
			
			if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
    			echo '<a href="' . base_url() . 'index.php/conecte?e=' . $r->email . '&c=' . $r->senha . '" target="_blank" style="margin-right: 1%" class="btn-nwe2 tip-top" title="Área do cliente"><i class="fas fa-key bx-xs"></i></a>';
                        }
						
			if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
    			echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idOs . '" class="btn-nwe tip-top" title="Visualizar mais detalhes"><i class="fas fa-eye"></i></a>';
                                    }
			if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
                            $zapnumber = preg_replace("/[^0-9]/", "", $r->telefone);
    			echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Msg WhatsApp" id="enviarWhatsApp" href="whatsapp://send?phone= 55' . $zapnumber . '"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                        }
						
						if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
                            $zapnumber = preg_replace("/[^0-9]/", "", $r->telefone);
    			echo '<a class="btn-nwe1 tip-top" style="margin-right: 1%" title="Enviar Msg WhatsApp Web" id="enviarWhatsApp" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '"><i class="fab fa-whatsapp" style="font-size:16px;"></i></a>';
                        }
			if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
    			echo '<a href="' . base_url() . 'index.php/clientes/editar/' . $r->idClientes . '" target="_blank" style="margin-right: 1%" class="btn-nwe3 tip-top" title="Editar Cliente"><i class="fas fa-edit bx-xs"></i></a>';
                        }
			if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dCliente')) {
    			echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="' . $r->idClientes . '" style="margin-right: 1%" class="btn-nwe4 tip-top" title="Excluir Cliente"><i class="fas fa-trash bx-xs"></i></a>';
                        }
			echo '</td>';
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
<form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Excluir Clientes</h5>
</div>
<div class="modal_body">
<input type="hidden" id="idCliente" name="id" value="" />
<h4 style="text-align: center">Deseja realmente excluir este cliente e os dados associados a ele (OS, Vendas, Receitas)?</h4>
</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
<button class="button_mini btn btn-danger"><span class="button_icon"><i class='fas fa-trash-alt'></i></span> <span class="button_text">Excluir</span></button>
</div>
</form>
</div>
<!-- Fim Modal Excluir -->


<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var cliente = $(this).attr('cliente');
            $('#idCliente').val(cliente);
        });
    });
</script>