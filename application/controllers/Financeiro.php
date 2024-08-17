<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Financeiro extends MY_Controller
{

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('financeiro_model');
        $this->load->model("mapos_model");
        $this->load->model("os_model");
        $this->load->model("clientes_model");
        $this->load->model("usuarios_model");
        $this->load->helper('codegen_helper');
        $this->data['menuLancamentos'] = 'financeiro';
    }

    public function index()
    {
        $this->lancamentos();
    }

    public function lancamentos()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vLancamento')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar lançamentos.');
            redirect(base_url());
        }

        $where = '';
        $vencimento_de = $this->input->get('vencimento_de') ?: date('Y-m-d');
        $vencimento_ate = $this->input->get('vencimento_ate') ?: date('Y-m-d');
        $cliente = $this->input->get('cliente');
        $tipo = $this->input->get('tipo');
        $status = $this->input->get('status');
        $valor_desconto = $this->input->get('valor_desconto');
        $desconto = $this->input->get('desconto');
        $periodo = $this->input->get('periodo');

        if (! empty($vencimento_de)) {
            $date = DateTime::createFromFormat('Y-m-d', $vencimento_de)->format('Y-m-d');

            if (empty($where)) {
                $where = "data_vencimento >= '$date'";
            } else {
                $where .= " AND data_vencimento >= '$date'";
            }
        }

        if (! empty($vencimento_ate)) {
            $date = DateTime::createFromFormat('Y-m-d', $vencimento_ate)->format('Y-m-d');

            if (empty($where)) {
                $where = "data_vencimento <= '$date'";
            } else {
                $where .= " AND data_vencimento <= '$date'";
            }
        }

        if (isset($status) && $status != '') {
            if (empty($where)) {
                $where = "baixado = '$status'";
            } else {
                $where .= " AND baixado = '$status'";
            }
        }

        if (! empty($cliente)) {
            if (empty($where)) {
                $where = "cliente_fornecedor LIKE '%${cliente}%'";
            } else {
                $where .= " AND cliente_fornecedor LIKE '%${cliente}%'";
            }
        }

        if (! empty($tipo)) {
            if (empty($where)) {
                $where = "tipo = '$tipo'";
            } else {
                $where .= " AND tipo = '$tipo'";
            }
        }

        $this->load->library('pagination');

        $this->data['configuration']['base_url'] = site_url("financeiro/lancamentos/?vencimento_de=$vencimento_de&vencimento_ate=$vencimento_ate&cliente=$cliente&tipo=$tipo&status=$status&periodo=$periodo");
        $this->data['configuration']['total_rows'] = $this->financeiro_model->count('lancamentos', $where);
        $this->data['configuration']['page_query_string'] = true;

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->financeiro_model->get('lancamentos', '*', $where, $this->data['configuration']['per_page'], $this->input->get('per_page'));
        $this->data['totals'] = $this->financeiro_model->getTotals($where);

        $this->data['estatisticas_financeiro'] = $this->financeiro_model->getEstatisticasFinanceiro2();

        $this->data['view'] = 'financeiro/lancamentos';
        return $this->layout();
    }

    public function adicionarReceita()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aLancamento')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar lançamentos.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        $urlAtual = $this->input->post('urlAtual');
        if ($this->form_validation->run('receita') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $vencimento = $this->input->post('vencimento');
            $recebimento = $this->input->post('recebimento');

            $valor = $this->input->post('valor');

            //Se o valor_desconto for vázio, seta a variavel com valor 0, se não for vazio recebe o valor de desconto
            if (empty($this->input->post('valor_desconto'))) {
                $valor_desconto =  "0";
            } else {
                $valor_desconto = $this->input->post('valor_desconto');
            }

            $desconto = $valor_desconto;
            //cria variavel para pegar o valor total ja sem o desconto e soma com o desconto            
            $total_sem_desconto = $valor  + $valor_desconto ;
            $valor =  $total_sem_desconto;
            //cria variavel para pegar o valor total ja com o desconto e diminui com o desconto
            $total_com_desconto = $valor - $valor_desconto;         
            $valor_desconto = $total_com_desconto;

            if (!validate_money($valor_desconto)) {
                $valor_desconto = str_replace([',', '.'], ['', ''], $valor_desconto);
            }

            if (!validate_money($valor)) {
                $valor = str_replace([',', '.'], ['', ''], $valor);
            }

            $data = [
                'descricao' => set_value('descricao'),
                'valor' => $valor,
                'valor_desconto' => $valor_desconto,
                'desconto' => $desconto,
                'data_vencimento' => $vencimento,
                //'data_pagamento' => $recebimento,
                'data_pagamento' => $recebimento != null ? $recebimento : date('Y-m-d'),
                'baixado' => $this->input->post('recebido') ?: 0,
                'cliente_fornecedor' => set_value('cliente'),
                'forma_pgto' => $this->input->post('formaPgto'),
                'tipo' => set_value('tipo'),
                'observacoes' => set_value('observacoes'),
                'usuarios_id' => $this->session->userdata('id'),
            ];

            if (set_value('idFornecedor')) {
                $data['clientes_id'] =  set_value('idFornecedor');
            }
            if (set_value('idCliente')) {
                $data['clientes_id'] =  set_value('idCliente');
            }
            if ($this->financeiro_model->add('lancamentos', $data) == true) {
                $this->session->set_flashdata('success', 'Receita adicionada com sucesso!');
                log_info('Adicionou uma receita em Financeiro');
                redirect($urlAtual);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar adicionar o lançamento.');
        redirect($urlAtual);
    }

    function adicionarReceita_parc()
    {


        //$this->load->library('form_validation');
        //$this->data['custom_error'] = '';
        $urlAtual = $this->input->post('urlAtual');
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aLancamento')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar lançamentos.');
            redirect(base_url());
        } else {

                 //Se o valor_desconto for vázio, seta a variavel com valor 0, se não for vazio recebe o valor de desconto
            if (empty($this->input->post('desconto_parc'))) {
                $valor_desconto =  "0";
            } else {
                $valor_desconto = $this->input->post('desconto_parc');
            }

            if (empty($this->input->post('entrada'))) {
                $entrada =  "0";
            } else {
                $entrada = $this->input->post('entrada');
            }

            $qtdparcelas_parc = $this->input->post('qtdparcelas_parc'); //4x
            $valor_parc = $this->input->post('valor_parc'); //450
            $valorparcelas = ($valor_parc - $entrada) / $qtdparcelas_parc;
            $desconto_por_parcela  = $valor_desconto / $qtdparcelas_parc;

            //para por na descrição, valor total sem desconto e sem parcelamento
            $descricao_parc_valor = $valor_parc + $valor_desconto;



            //cria variavel para pegar o valor total ja com o desconto e diminui com o desconto
            $total_com_desconto = $valorparcelas + $desconto_por_parcela;         




            if ($entrada >= $valor_parc) {
                $this->session->set_flashdata('error', 'O valor da entrada não pode ser maior ou igual ao valor total da receita/Despesa!');
                redirect($urlAtual);
            }

            $dia_pgto = $this->input->post('dia_pgto');
            $dia_base_pgto = $this->input->post('dia_base_pgto');

            $comissao = $this->input->post('comissao');

            if (!validate_money($comissao)) {
                $comissao = str_replace(array(',', '.'), array('', ''), $comissao);
            }

            if ($entrada == 0) {
                $loops = 1;
                while ($loops <= $qtdparcelas_parc) {

                    $myDateTimeISO = $dia_base_pgto;
                    $loopsmes = $loops - 1;
                    $addThese = $loopsmes;
                    $myDateTime = new DateTime($myDateTimeISO);
                    $myDayOfMonth = date_format($myDateTime, 'j');
                    date_modify($myDateTime, "+$addThese months");

                    //Descobre se o dia do mês caiu
                    $myNewDayOfMonth = date_format($myDateTime, 'j');
                    if ($myDayOfMonth > 28 && $myNewDayOfMonth < 4) {
                       //Em caso afirmativo, corrija voltando o número de dias que transbordaram
                        date_modify($myDateTime, "-$myNewDayOfMonth days");
                    }
                    $data = array(
                        'descricao' => $this->input->post('descricao_parc') . ' - Parcelamento de R$' . $descricao_parc_valor .'  [' . $loops . '/' . $qtdparcelas_parc . ']',
                        'valor' => $total_com_desconto,
                        'desconto' => $desconto_por_parcela,
                        'valor_desconto' =>   $valorparcelas,
                        'data_vencimento' => date_format($myDateTime, "Y-m-d"),
                        'data_pagamento' => $recebimento != null ? $recebimento : date_format($myDateTime, "Y-m-d"),
                        'baixado' => 0,
                        'cliente_fornecedor' => $this->input->post('cliente_parc'),
                        'observacoes' => $this->input->post('observacoes_parc'),
                        'forma_pgto' => $this->input->post('formaPgto_parc'),
                        'tipo' => $this->input->post('tipo_parc'),
                        'usuarios_id' => $this->session->userdata('id'),

                    );

                  
                    if ($this->financeiro_model->add('lancamentos', $data) == TRUE) {
                        $this->session->set_flashdata('success', 'Lançamento adicionado com sucesso!');
                        log_info('Adicionou um lançamento em Financeiro');
                    } else {
                        $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                    }
                    $loops++;
                }

                redirect($urlAtual);
            } else {
                $desconto_entrada = "0";
                $data1 = array(
                    'descricao' => $this->input->post('descricao_parc')  . ' - Entrada do parc. de R$' . $descricao_parc_valor .' ',
                    'valor' => $entrada,
                    'desconto' =>  $desconto_entrada,
                    'valor_desconto' => $entrada,
                    'data_vencimento' => $dia_pgto,
                    'data_pagamento' => $dia_pgto != null ? $dia_pgto : date_format($myDateTime, "Y-m-d"),
                    'baixado' => 1,
                    'cliente_fornecedor' => $this->input->post('cliente_parc'),
                    'observacoes' => $this->input->post('observacoes_parc'),
                    'forma_pgto' => $this->input->post('formaPgto_parc'),
                    'tipo' => $this->input->post('tipo_parc'),
                    'usuarios_id' => $this->session->userdata('id'),



                );
                // if (empty($data['valor_desconto'])) {
                //     $data['valor_desconto'] =  "0";
                // }

                $this->financeiro_model->add1('lancamentos', $data1);

                $loops = 1;
                while ($loops <= $qtdparcelas_parc) {
                    $myDateTimeISO = $dia_base_pgto;
                    $loopsmes = $loops - 1;
                    $addThese = $loopsmes;
                    $myDateTime = new DateTime($myDateTimeISO);
                    $myDayOfMonth = date_format($myDateTime, 'j');
                    date_modify($myDateTime, "+$addThese months");

                    //Find out if the day-of-month has dropped
                    $myNewDayOfMonth = date_format($myDateTime, 'j');
                    if ($myDayOfMonth > 28 && $myNewDayOfMonth < 4) {
                        //If so, fix by going back the number of days that have spilled over
                        date_modify($myDateTime, "-$myNewDayOfMonth days");
                    }

                    $data = array(
                        'descricao' => $this->input->post('descricao_parc') . ' - Parcelamento de R$' . $descricao_parc_valor .' [' . $loops . '/' . $qtdparcelas_parc . ']',
                        'valor' => $total_com_desconto,
                        'desconto' => $desconto_por_parcela,
                        'valor_desconto' => $valorparcelas,
                        'data_vencimento' => date_format($myDateTime, "Y-m-d"),
                        'data_pagamento' => date_format($myDateTime, "Y-m-d"),
                        'baixado' => 0,
                        'cliente_fornecedor' => $this->input->post('cliente_parc'),
                        'observacoes' => $this->input->post('observacoes_parc'),
                        'forma_pgto' => $this->input->post('formaPgto_parc'),
                        'tipo' => $this->input->post('tipo_parc'),
                        'usuarios_id' => $this->session->userdata('id'),

                    );

                    // if (empty($data['valor_desconto'])) {
                    //     $data['valor_desconto'] =  "0";
                    // }

                    if ($this->financeiro_model->add('lancamentos', $data) == TRUE) {
                        $this->session->set_flashdata('success', 'Lançamento adicionado com sucesso!');
                        log_info('Adicionou um lançamento em Financeiro');
                    } else {
                        $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                    }
                    $loops++;
                }

                redirect($urlAtual);
            }
        }

        $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar adicionar o lançamento');
        redirect($urlAtual);
    }

    public function adicionarDespesa()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aLancamento')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar lançamentos.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        $urlAtual = $this->input->post('urlAtual');
        if ($this->form_validation->run('despesa') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $vencimento = $this->input->post('vencimento');
            $pagamento = $this->input->post('pagamento');

            $valor = $this->input->post('valor');

            if (!validate_money($valor)) {
                $valor = str_replace([',', '.'], ['', ''], $valor);
            }

            $data = [
                'descricao' => set_value('descricao'),
                'valor' => $valor,
                'data_vencimento' => $vencimento,
                //'data_pagamento' => $pagamento,
                'data_pagamento' => $pagamento != null ? $pagamento : date('Y-m-d'),
                'baixado' => $this->input->post('pago') ?: 0,
                'cliente_fornecedor' => set_value('fornecedor'),
                'forma_pgto' => $this->input->post('formaPgto'),
                'tipo' => set_value('tipo'),
                'observacoes' => set_value('observacoes'),
                'usuarios_id' => $this->session->userdata('id'),
            ];

            if (set_value('idFornecedor')) {
                $data['clientes_id'] =  set_value('idFornecedor');
            }
            if (set_value('idCliente')) {
                $data['clientes_id'] =  set_value('idCliente');
            }
            if ($this->financeiro_model->add('lancamentos', $data) == true) {
                $this->session->set_flashdata('success', 'Despesa adicionada com sucesso!');
                log_info('Adicionou uma despesa');
                redirect($urlAtual);
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar adicionar despesa!');
                redirect($urlAtual);
            }
        }

        $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar adicionar despesa.');
        redirect($urlAtual);
    }

    public function editar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eLancamento')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar lançamentos.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        $urlAtual = $this->input->post('urlAtual');

        $this->form_validation->set_rules('descricao', '', 'trim|required');
        $this->form_validation->set_rules('fornecedor', '', 'trim|required');
        $this->form_validation->set_rules('valor', '', 'trim|required');
        $this->form_validation->set_rules('vencimento', '', 'trim|required');
        $this->form_validation->set_rules('pagamento', '', 'trim');

        if ($this->form_validation->run() == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $vencimento = $this->input->post('vencimento');
            $pagamento = $this->input->post('pagamento');

            $valor = $this->input->post('valor');
             //Se o valor_desconto for vázio, seta a variavel com valor 0, se não for vazio recebe o valor de desconto
            if (empty($this->input->post('valor_desconto_editar'))) {
                $valor_desconto =  "0";
            } else {
                $valor_desconto = $this->input->post('valor_desconto_editar'); // valor do total + desconto
            }
           
            $valor_total =  $valor + $valor_desconto; //90 + 10=100
            $valor_com_desconto = $valor_total - $valor_desconto;

            $data = [
                'descricao' => $this->input->post('descricao'),
                'data_vencimento' => $vencimento,
                'data_pagamento' => $pagamento,
                'valor' => $valor_total,
                'desconto' => $valor_desconto,
                'valor_desconto' =>  $valor_com_desconto,
                'baixado' => $this->input->post('pago') ?: 0,
                'cliente_fornecedor' => $this->input->post('fornecedor'),
                'forma_pgto' => $this->input->post('formaPgto'),
                'tipo' => $this->input->post('tipo'),
                'observacoes' => $this->input->post('observacoes'),
                'usuarios_id' => $this->session->userdata('id'),
            ];

            if (set_value('idFornecedor')) {
                $data['clientes_id'] =  set_value('idFornecedor');
            }
            if (empty($data['valor_desconto'])) {
                $data['valor_desconto'] =  "0";
            }

            if (set_value('idCliente')) {
                $data['clientes_id'] =  set_value('idCliente');
            }
            if ($this->financeiro_model->edit('lancamentos', $data, 'idLancamentos', $this->input->post('id')) == true) {
                $this->session->set_flashdata('success', 'lançamento editado com sucesso!');
                log_info('Alterou um lançamento no financeiro. ID' . $this->input->post('id'));
                redirect($urlAtual);
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar editar lançamento!');
                redirect($urlAtual);
            }
        }

        $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar editar lançamento.');
        redirect($urlAtual);

        $data = [
            'descricao' => $this->input->post('descricao'),
            'data_vencimento' => $this->input->post('vencimento'),
            //'data_pagamento' => $this->input->post('pagamento'),
            'data_pagamento' => $pagamento,
            'valor' => $this->input->post('valor'),
            'valor_desconto' => $this->input->post('valor_desconto_editar'),
            'baixado' => $this->input->post('pago'),
            'cliente_fornecedor' => set_value('fornecedor'),
            'forma_pgto' => $this->input->post('formaPgto'),
            'tipo' => $this->input->post('tipo'),
            'usuarios_id' => $this->session->userdata('id'),
        ];
        if (set_value('idFornecedor')) {
            $data['clientes_id'] =  set_value('idFornecedor');
        }
        if (empty($data['valor_desconto'])) {
            $data['valor_desconto'] =  "0";
        }
        if (set_value('idCliente')) {
            $data['clientes_id'] =  set_value('idCliente');
        }

        print_r($data);
    }

    public function excluirLancamento()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dLancamento')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir lançamentos.');
            redirect(base_url());
        }

        $id = $this->input->post('id');

        if ($id == null || !is_numeric($id)) {
            $json = ['result' => false];
            echo json_encode($json);
        } else {
            $result = $this->financeiro_model->delete('lancamentos', 'idLancamentos', $id);
            if ($result) {
                log_info('Removeu um lançamento. ID: ' . $id);
                $json = ['result' => true];
                echo json_encode($json);
            } else {
                $json = ['result' => false];
                echo json_encode($json);
            }
        }
    }

    public function autoCompleteClienteFornecedor()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->financeiro_model->autoCompleteClienteFornecedor($q);
        }
    }

    public function autoCompleteClienteAddReceita()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->financeiro_model->autoCompleteClienteReceita($q);
        }
    }

    protected function getThisYear()
    {
        $dias = date("z");
        $primeiro = date("Y-m-d", strtotime("-" . ($dias) . " day"));
        $ultimo = date("Y-m-d", strtotime("+" . (364 - $dias) . " day"));
        return [$primeiro, $ultimo];
    }

    protected function getThisWeek()
    {
        return [date("Y-m-d", strtotime("last sunday", strtotime("now"))), date("Y-m-d", strtotime("next saturday", strtotime("now")))];
    }

    public function imprimirRecibo()
    {
        if (empty($this->uri->segment(3))) {
            $this->session->set_flashdata(
                "error",
                "Ocorreu um erro ao tentar imprimir o recibo."
            );
            redirect(base_url());
        } else {
            // Consulta dados do lançamento
            $data["result"] = $this->financeiro_model->getLancamento(
                $this->uri->segment(3)
            );

            //Verifica se o numero do lançameto existe
            if (empty($data["result"])) {
                $this->session->set_flashdata(
                    "error",
                    "Ocorreu um erro ao tentar imprimir o recibo. Lançamento não existe"
                );
                redirect(base_url());
            }

            // Obtém os dados do lançamento atual
            $lancamento = $this->financeiro_model->getLancamento($this->uri->segment(3));

            // Verifica se há um valor de desconto e, se houver, usa-o no lugar do valor original
            if ($lancamento["valor_desconto"] > 0.00) {
                $lancamento["valor"] = $lancamento["valor_desconto"];
            }
            $data["cliente"] = $this->financeiro_model->getById(
                $data["result"]["clientes_id"]
            );
            $emitente = $this->mapos_model->getEmitente();

            // Cria o array de dados
            $data = [
                "id" => 3,
                "qrCode" => $this->os_model->getQrCode(
                    $this->uri->segment(3),
                    $this->data["configuration"]["pix_key"],
                    $emitente
                ),
                "emitente" => $emitente,
                "chaveFormatada" => $this->formatarChave(
                    $this->data["configuration"]["pix_key"]
                ),
                "lancamento" => $lancamento,
                "cliente" => $this->financeiro_model->getById(
                    $data["result"]["clientes_id"]
                ),
                "valorporescrito" => $this->numberToText(
                    $lancamento["valor"]
                ),
            ];
        }
    }

    public function formatarChave($chave)
    {
        if ($this->validarCPF($chave)) {
            return substr($chave, 0, 3) . '.' . substr($chave, 3, 3) . '.' . substr($chave, 6, 3) . '-' . substr($chave, 9);
        } elseif ($this->validarCNPJ($chave)) {
            return substr($chave, 0, 2) . '.' . substr($chave, 2, 3) . '.' . substr($chave, 5, 3) . '/' . substr($chave, 8, 4) . '-' . substr($chave, 12);
        } elseif (strlen($chave) === 11) {
            return '(' . substr($chave, 0, 2) . ') ' . substr($chave, 2, 5) . '-' . substr($chave, 7);
        }

        return $chave;
    }

    function numberToText($value, $uppercase = 0) {
        if (strpos($value, ",") > 0) {
            $value = str_replace(".", "", $value);
            $value = str_replace(",", ".", $value);
        }

        $singular = ["centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão"];
        $plural = ["centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões"];

        $c = ["", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos"];
        $d = ["", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa"];
        $d10 = ["dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove"];
        $u = ["", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove"];

        $z = 0;

        $value = number_format($value, 2, ".", ".");
        $integer = explode(".", $value);
        $cont = count($integer);

        for ($i = 0; $i < $cont; $i++)
            for ($ii = strlen($integer[$i]); $ii < 3; $ii++)
                $integer[$i] = "0" . $integer[$i];

        $fim = $cont - ($integer[$cont - 1] > 0 ? 1 : 2);
        $rt = '';
        for ($i = 0; $i < $cont; $i++) {
            $value = $integer[$i];
            $rc = (($value > 100) && ($value < 200)) ? "cento" : $c[$value[0]];
            $rd = ($value[1] < 2) ? "" : $d[$value[1]];
            $ru = ($value > 0) ? (($value[1] == 1) ? $d10[$value[2]] : $u[$value[2]]) : "";

            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd &&
                    $ru) ? " e " : "") . $ru;
            $t = $cont - 1 - $i;
            $r .= $r ? " " . ($value > 1 ? $plural[$t] : $singular[$t]) : "";
            if ($value == "000"
            )
                $z++;
            elseif ($z > 0)
                $z--;
            if (($t == 1) && ($z > 0) && ($integer[0] > 0))
                $r .= ( ($z > 1) ? " de " : "") . $plural[$t];
            if ($r)
                $rt = $rt . ((($i > 0) && ($i <= $fim) &&
                        ($integer[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }

     return trim($rt ? $rt : "zero");
    }

    public function validarCPF($cpf)
    {
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        if (strlen($cpf) !== 11 || preg_match('/^(\d)\1+$/', $cpf)) {
            return false;
        }
        $soma1 = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma1 += $cpf[$i] * (10 - $i);
        }
        $resto1 = $soma1 % 11;
        $dv1 = $resto1 < 2 ? 0 : 11 - $resto1;
        if ($dv1 != $cpf[9]) {
            return false;
        }
        $soma2 = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma2 += $cpf[$i] * (11 - $i);
        }
        $resto2 = $soma2 % 11;
        $dv2 = $resto2 < 2 ? 0 : 11 - $resto2;

        return $dv2 == $cpf[10];
    }

    public function validarCNPJ($cnpj)
    {
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        if (strlen($cnpj) !== 14 || preg_match('/^(\d)\1+$/', $cnpj)) {
            return false;
        }
        $soma1 = 0;
        for ($i = 0, $pos = 5; $i < 12; $i++, $pos--) {
            $pos = $pos < 2 ? 9 : $pos;
            $soma1 += $cnpj[$i] * $pos;
        }
        $dv1 = $soma1 % 11 < 2 ? 0 : 11 - ($soma1 % 11);
        if ($dv1 != $cnpj[12]) {
            return false;
        }
        $soma2 = 0;
        for ($i = 0, $pos = 6; $i < 13; $i++, $pos--) {
            $pos = $pos < 2 ? 9 : $pos;
            $soma2 += $cnpj[$i] * $pos;
        }
        $dv2 = $soma2 % 11 < 2 ? 0 : 11 - ($soma2 % 11);

        return $dv2 == $cnpj[13];
    }

    protected function getLastSevenDays()
    {
        return [date("Y-m-d", strtotime("-7 day", strtotime("now"))), date("Y-m-d", strtotime("now"))];
    }

    protected function getThisMonth()
    {
        $mes = date('m');
        $ano = date('Y');
        $qtdDiasMes = date('t');
        $inicia = $ano . "-" . $mes . "-01";

        $ate = $ano . "-" . $mes . "-" . $qtdDiasMes;
        return [$inicia, $ate];
    }
}
