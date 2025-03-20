<div class="vendas123" style="margin-top: 0; min-height: 50vh">
<div class="widget_box_2">
<div class="widget_title_2">
<h5>Compras</h5>
</div>

        <table id="tabela" width="100%" class="table_w">
            <thead>
                <tr>
                    <th width="12%">Data da Compra</th>
                    <th>Vendedor</th>
                    <th width="15%">Faturado</th>
                    <th width="15%">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
				if (!$results) {
                        echo '<tr>
                                <td colspan="5">Você ainda não fez nenhuma compra.</td>
                            </tr>';
                    }
				foreach ($results as $r) {
    $dataVenda = date(('d/m/Y'), strtotime($r->dataVenda));
    if ($r->faturado == 1) {
        $faturado = 'Sim';
    } else {
        $faturado = 'Não';
    }
    echo '<tr>';
    echo '<td align="center">' . $dataVenda . '</td>';
    echo '<td>' . $r->nome . '</td>';
    echo '<td align="center">' . $faturado . '</td>';
    echo '<td align="center"> <a href="' . base_url() . 'index.php/conecte/visualizarCompra/' . $r->idVendas . '" class="btn-nwe" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>
                      <a href="' . base_url() . 'index.php/conecte/imprimirCompra/' . $r->idVendas . '" class="btn-nwe6" title="Imprimir"><i class="fas fa-print"></i></a>

                  </td>';
    echo '</tr>';
} ?>
            </tbody>
        </table>
</div>
<div class="widget_pagination">
<?= $this->pagination->create_links() ?>
</div>

</div>