<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Masteros extends MY_Controller
{

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('masteros_model');
    }

    public function index()
    {
        $this->data['ordens1'] = $this->masteros_model->getOsOrcamento();
        $this->data['ordens2'] = $this->masteros_model->getOsOrcamentoConcluido();
        $this->data['ordens3'] = $this->masteros_model->getOsOrcamentoAprovado();
        $this->data['ordens4'] = $this->masteros_model->getOsEmAndamento();
        $this->data['ordens5'] = $this->masteros_model->getOsAguardandoPecas();
        $this->data['ordens6'] = $this->masteros_model->getOsServicoConcluido();
        $this->data['ordens7'] = $this->masteros_model->getOsSemReparo();
        $this->data['ordens8'] = $this->masteros_model->getOsNaoAutorizado();
        $this->data['ordens9'] = $this->masteros_model->getOsCancelado();
        $this->data['ordens10'] = $this->masteros_model->getOsProntoDespachar();
        $this->data['ordens11'] = $this->masteros_model->getOsEntregueAReceber();
        $this->data['ordens12'] = $this->masteros_model->getOsEmGarantia();
        $this->data['produtos'] = $this->masteros_model->getProdutosMinimo();
        $this->data['os'] = $this->masteros_model->getOsEstatisticas();
        $this->data['estatisticas_financeiro'] = $this->masteros_model->getEstatisticasFinanceiro();
        $this->data['financeiro_mes_dia'] = $this->masteros_model->getEstatisticasFinanceiroDia($this->input->get('year'));
        $this->data['financeiro_mes'] = $this->masteros_model->getEstatisticasFinanceiroMes($this->input->get('year'));
        $this->data['financeiro_mesinadipl'] = $this->masteros_model->getEstatisticasFinanceiroMesInadimplencia($this->input->get('year'));
        $this->data['menuPainel'] = 'Painel';
        $this->data['view'] = 'masteros/painel';
        return $this->layout();
    }

    public function minhaConta()
    {
        $this->data['usuario'] = $this->masteros_model->getById($this->session->userdata('id'));
        $this->data['view'] = 'masteros/minhaConta';
        return $this->layout();
    }

    public function alterarSenha()
    {
        $current_user = $this->masteros_model->getById($this->session->userdata('id'));

        if (!$current_user) {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao pesquisar usuário!');
            redirect(site_url('masteros/minhaConta'));
        }

        $oldSenha = $this->input->post('oldSenha');
        $senha = $this->input->post('novaSenha');

        if (!password_verify($oldSenha, $current_user->senha)) {
            $this->session->set_flashdata('error', 'A senha atual não corresponde com a senha informada.');
            redirect(site_url('masteros/minhaConta'));
        }

        $result = $this->masteros_model->alterarSenha($senha);

        if ($result) {
            $this->session->set_flashdata('success', 'Senha alterada com sucesso!');
            redirect(site_url('masteros/minhaConta'));
        }

        $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar a senha!');
        redirect(site_url('masteros/minhaConta'));
    }

    public function pesquisar()
    {
        $termo = $this->input->get('termo');

        $data['results'] = $this->masteros_model->pesquisar($termo);
        $this->data['produtos'] = $data['results']['produtos'];
        $this->data['servicos'] = $data['results']['servicos'];
        $this->data['equipamento_os'] = $data['results']['equipamento_os'];
        $this->data['os'] = $data['results']['os'];
        $this->data['clientes'] = $data['results']['clientes'];
        $this->data['view'] = 'masteros/pesquisa';
        return $this->layout();
    }

    public function backup()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cBackup')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para efetuar backup.');
            redirect(base_url());
        }

        $this->load->dbutil();
        $prefs = [
            'format' => 'zip',
            'foreign_key_checks' => false,
            'filename' => 'backup' . date('d-m-Y') . '.sql',
        ];

        $backup = $this->dbutil->backup($prefs);

        $this->load->helper('file');
        write_file(base_url() . 'backup/backup.zip', $backup);

        log_info('Efetuou backup do banco de dados.');

        $this->load->helper('download');
        force_download('backup' . date('d-m-Y H:m:s') . '.zip', $backup);
    }

    public function emitente()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar emitente.');
            redirect(base_url());
        }

        $this->data['menuConfiguracoes'] = 'Configuracoes';
        $this->data['dados'] = $this->masteros_model->getEmitente();
        $this->data['view'] = 'masteros/emitente';
        return $this->layout();
    }

    public function do_upload()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar emitente.');
            redirect(base_url());
        }

        $this->load->library('upload');

        $image_upload_folder = FCPATH . 'assets/uploads';

        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }

        $this->upload_config = [
            'upload_path' => $image_upload_folder,
            'allowed_types' => '*',
            'max_size' => 0,
            'remove_space' => true,
            'encrypt_name' => true,
        ];

        $this->upload->initialize($this->upload_config);

        if (!$this->upload->do_upload()) {
            $upload_error = $this->upload->display_errors();
            print_r($upload_error);
            exit();
        } else {
            $file_info = [$this->upload->data()];
            return $file_info[0]['file_name'];
        }
    }

    public function do_upload_user()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar emitente.');
            redirect(base_url());
        }

        $this->load->library('upload');

        $image_upload_folder = FCPATH . 'assets/userImage/';

        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }

        $this->upload_config = [
            'upload_path' => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|gif',
            'max_size' => 2048,
            'remove_space' => true,
            'encrypt_name' => true,
        ];

        $this->upload->initialize($this->upload_config);

        if (!$this->upload->do_upload()) {
            $upload_error = $this->upload->display_errors();
            print_r($upload_error);
            exit();
        } else {
            $file_info = [$this->upload->data()];
            return $file_info[0]['file_name'];
        }
    }

    public function cadastrarEmitente()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar emitente.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Razão Social', 'required|trim');
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'required|trim');
        $this->form_validation->set_rules('ie', 'IE', 'trim');
        $this->form_validation->set_rules('cep', 'CEP', 'required|trim');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'required|trim');
        $this->form_validation->set_rules('numero', 'Número', 'trim');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required|trim');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required|trim');
        $this->form_validation->set_rules('uf', 'UF', 'required|trim');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Campos obrigatórios não foram preenchidos.');
            redirect(site_url('masteros/emitente'));
        } else {
            $nome = $this->input->post('nome');
            $cnpj = $this->input->post('cnpj');
            $ie = $this->input->post('ie');
            $cep = $this->input->post('cep');
            $logradouro = $this->input->post('logradouro');
            $numero = $this->input->post('numero');
            $bairro = $this->input->post('bairro');
            $cidade = $this->input->post('cidade');
            $uf = $this->input->post('uf');
            $telefone = $this->input->post('telefone');
            $email = $this->input->post('email');
            $image = $this->do_upload();
            $logo = base_url() . 'assets/uploads/' . $image;

            $retorno = $this->masteros_model->addEmitente($nome, $cnpj, $ie, $cep, $logradouro, $numero, $bairro, $cidade, $uf, $telefone, $email, $logo);
            if ($retorno) {
                $this->session->set_flashdata('success', 'As informações foram inseridas com sucesso.');
                log_info('Adicionou informações de emitente.');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar inserir as informações.');
            }
            redirect(site_url('masteros/emitente'));
        }
    }

    public function editarEmitente()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar emitente.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Razão Social', 'required|trim');
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'required|trim');
        $this->form_validation->set_rules('ie', 'IE', 'trim');
        $this->form_validation->set_rules('cep', 'CEP', 'required|trim');
        $this->form_validation->set_rules('logradouro', 'Logradouro', 'required|trim');
        $this->form_validation->set_rules('numero', 'Número', 'trim');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required|trim');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required|trim');
        $this->form_validation->set_rules('uf', 'UF', 'required|trim');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Campos obrigatórios não foram preenchidos.');
            redirect(site_url('masteros/emitente'));
        } else {
            $nome = $this->input->post('nome');
            $cnpj = $this->input->post('cnpj');
            $ie = $this->input->post('ie');
            $cep = $this->input->post('cep');
            $logradouro = $this->input->post('logradouro');
            $numero = $this->input->post('numero');
            $bairro = $this->input->post('bairro');
            $cidade = $this->input->post('cidade');
            $uf = $this->input->post('uf');
            $telefone = $this->input->post('telefone');
            $email = $this->input->post('email');
            $id = $this->input->post('id');

            $retorno = $this->masteros_model->editEmitente($id, $nome, $cnpj, $ie, $cep, $logradouro, $numero, $bairro, $cidade, $uf, $telefone, $email);
            if ($retorno) {
                $this->session->set_flashdata('success', 'As informações foram alteradas com sucesso.');
                log_info('Alterou informações de emitente.');
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar as informações.');
            }
            redirect(site_url('masteros/emitente'));
        }
    }

    public function editarLogo()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar emitente.');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        if ($id == null || !is_numeric($id)) {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar a logomarca.');
            redirect(site_url('masteros/emitente'));
        }
        $this->load->helper('file');
        delete_files(FCPATH . 'assets/uploads/');

        $image = $this->do_upload();
        $logo = base_url() . 'assets/uploads/' . $image;

        $retorno = $this->masteros_model->editLogo($id, $logo);
        if ($retorno) {
            $this->session->set_flashdata('success', 'As informações foram alteradas com sucesso.');
            log_info('Alterou a logomarca do emitente.');
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar as informações.');
        }
        redirect(site_url('masteros/emitente'));
    }

    public function uploadUserImage()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cUsuario')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para mudar a foto.');
            redirect(base_url());
        }

        $id = $this->session->userdata('id');
        if ($id == null || !is_numeric($id)) {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar sua foto.');
            redirect(site_url('masteros/minhaConta'));
        }

        $usuario = $this->masteros_model->getById($id);
        
        if (is_file(FCPATH . 'assets/userImage/' . $usuario->url_image_user)) {
            unlink(FCPATH . 'assets/userImage/' . $usuario->url_image_user);
        }

        $image = $this->do_upload_user();
        $imageUserPath = $image;
        $retorno = $this->masteros_model->editImageUser($id, $imageUserPath);
        
        if ($retorno) {
            $this->session->set_userdata('url_image_user', $imageUserPath);
            $this->session->set_flashdata('success', 'Foto alterada com sucesso.');
            log_info('Alterou a Imagem do Usuario.');
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar sua foto.');
        }
        redirect(site_url('masteros/minhaConta'));
    }

    public function emails()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmail')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar fila de e-mails');
            redirect(base_url());
        }

        $this->data['menuConfiguracoes'] = 'Email';

        $this->load->library('pagination');
        $this->load->model('email_model');

        $this->data['configuration']['base_url'] = site_url('masteros/emails/');
        $this->data['configuration']['total_rows'] = $this->email_model->count('email_queue');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->email_model->get('email_queue', '*', '', $this->data['configuration']['per_page'], $this->uri->segment(3));

        $this->data['view'] = 'emails/emails';
        return $this->layout();
    }

    public function excluirEmail()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmail')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir e-mail da fila.');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir e-mail da fila.');
            redirect(site_url('masteros/emails/'));
        }

        $this->load->model('email_model');
        $this->email_model->delete('email_queue', 'id', $id);

        log_info('Removeu um e-mail da fila de envio. ID: ' . $id);

        $this->session->set_flashdata('success', 'E-mail removido da fila de envio!');
        redirect(site_url('masteros/emails/'));
    }

    public function configurar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cSistema')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar o sistema');
            redirect(base_url());
        }
        
        $this->data['menuConfiguracoes'] = 'Sistema';
        $this->load->library('form_validation');
        $this->load->model('masteros_model');

        $this->data['custom_error'] = '';

        $this->form_validation->set_rules('app_name', 'Nome do Sistema', 'required|trim');
        $this->form_validation->set_rules('per_page', 'Registros por página', 'required|numeric|trim');
        $this->form_validation->set_rules('app_theme', 'Tema do Sistema', 'required|trim');
        $this->form_validation->set_rules('os_notification', 'Notificação de OS', 'trim');
        $this->form_validation->set_rules('email_automatico', 'Enviar Email Automático', 'trim');
        $this->form_validation->set_rules('gerenciador_arquivos', 'Gerenciador de Arquivos', 'required|trim');
        $this->form_validation->set_rules('control_estoque', 'Controle de Estoque', 'required|trim');
        $this->form_validation->set_rules('notifica_whats', 'Notificação Whatsapp', 'trim');
        $this->form_validation->set_rules('control_baixa', 'Controle de Baixa', 'required|trim');
        $this->form_validation->set_rules('control_editos', 'Controle de Edição de OS', 'required|trim');
        $this->form_validation->set_rules('control_edit_vendas', 'Controle de Edição de Vendas', 'required|trim');
        //$this->form_validation->set_rules('control_datatable', 'Controle de Visualização em DataTables', 'required|trim');
        $this->form_validation->set_rules('per_page_home', 'Registros por página', 'required|numeric|trim');
        $this->form_validation->set_rules('os_status_list[]', 'Controle de visualização de OS', 'required|trim', ['required' => 'Selecione ao menos uma das opções!']);
        $this->form_validation->set_rules('pix_key', 'Chave Pix', 'trim|valid_pix_key', [
            'valid_pix_key' => 'Chave Pix inválida!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="alert">' . validation_errors() . '</div>' : false);
        } else {
            $data = [
                'app_name' => $this->input->post('app_name'),
                'per_page' => $this->input->post('per_page'),
                'app_theme' => $this->input->post('app_theme'),
                'os_notification' => $this->input->post('os_notification'),
                'email_automatico' => $this->input->post('email_automatico'),
                'control_estoque' => $this->input->post('control_estoque'),
                'notifica_whats' => $this->input->post('notifica_whats'),
                'termo_uso' => $this->input->post('termo_uso'),
                'whats_app1' => $this->input->post('whats_app1'),
                'whats_app2' => $this->input->post('whats_app2'),
                'whats_app3' => $this->input->post('whats_app3'),
                'whats_app4' => $this->input->post('whats_app4'),
                'whats_app5' => $this->input->post('whats_app5'),
                'whats_app6' => $this->input->post('whats_app6'),
                'gerenciador_arquivos' => $this->input->post('gerenciador_arquivos'),
                'masteros_0' => $this->input->post('masteros_0'),
                'masteros_1' => $this->input->post('masteros_1'),
                'masteros_2' => $this->input->post('masteros_2'),
                'masteros_3' => $this->input->post('masteros_3'),
                'masteros_4' => $this->input->post('masteros_4'),
                'masteros_5' => $this->input->post('masteros_5'),
                'masteros_6' => $this->input->post('masteros_6'),
                'masteros_7' => $this->input->post('masteros_7'),
                'masteros_8' => $this->input->post('masteros_8'),
                'masteros_9' => $this->input->post('masteros_9'),
                'control_baixa' => $this->input->post('control_baixa'),
                'control_editos' => $this->input->post('control_editos'),
                'control_edit_vendas' => $this->input->post('control_edit_vendas'),
                'control_datatable' => $this->input->post('control_datatable'),
                'pix_key' => $this->input->post('pix_key'),
                'os_status_list' => json_encode($this->input->post('os_status_list')),
                'per_page_home' => $this->input->post('per_page_home'),
                'orcamento' => (set_value('orcamento') == true ? 1 : 0),
                'orcamento_concluido' => (set_value('orcamento_concluido') == true ? 1 : 0),
                'orcamento_aprovado' => (set_value('orcamento_aprovado') == true ? 1 : 0),
                'em_andamento' => (set_value('em_andamento') == true ? 1 : 0),
                'aguardando_pecas' => (set_value('aguardando_pecas') == true ? 1 : 0),
                'servico_concluido' => (set_value('servico_concluido') == true ? 1 : 0),
                'sem_reparo' => (set_value('sem_reparo') == true ? 1 : 0),
                'nao_autorizado' => (set_value('nao_autorizado') == true ? 1 : 0),
                'cancelado' => (set_value('cancelado') == true ? 1 : 0),
                'pronto_despachar' => (set_value('pronto_despachar') == true ? 1 : 0),
                'entregue_a_receber' => (set_value('entregue_a_receber') == true ? 1 : 0),
                'em_garantia' => (set_value('em_garantia') == true ? 1 : 0),
            ];
            if ($this->masteros_model->saveConfiguracao($data) == true) {
                $this->session->set_flashdata('success', 'Configurações do sistema atualizadas com sucesso!');
                redirect(site_url('masteros/configurar'));
            } else {
                $this->data['custom_error'] = '<div class="alert">Ocorreu um errro.</div>';
            }
        }

        $this->data['view'] = 'masteros/configurar';

        return $this->layout();
    }

    public function atualizarBanco()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cSistema')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar o sistema');
            redirect(base_url());
        }

        $this->load->library('migration');

        if ($this->migration->latest() === false) {
            $this->session->set_flashdata('error', $this->migration->error_string());
        } else {
            $this->session->set_flashdata('success', 'Banco de dados atualizado com sucesso!');
        }

        return redirect(site_url('masteros/configurar'));
    }

    public function atualizarMasteros()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cSistema')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar o sistema');
            redirect(base_url());
        }

        $this->load->library('github_updater');

        if (!$this->github_updater->has_update()) {
            $this->session->set_flashdata('success', 'Seu masteros já está atualizado!');

            return redirect(site_url('masteros/configurar'));
        }

        $success = $this->github_updater->update();

        if ($success) {
            $this->session->set_flashdata('success', 'Masteros atualizado com sucesso!');
        } else {
            $this->session->set_flashdata('error', 'Erro ao atualizar masteros!');
        }

        return redirect(site_url('masteros/configurar'));
    }

    public function do_upload_termica()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar emitente.');
            redirect(base_url());
        }

        $this->load->library('upload');

        $imagetermica_upload_folder = FCPATH . 'assets/logo_termica';

        if (!file_exists($imagetermica_upload_folder)) {
            mkdir($imagetermica_upload_folder, DIR_WRITE_MODE, true);
        }

        $this->upload_config = [
            'upload_path' => $imagetermica_upload_folder,
            'allowed_types' => '*',
            'max_size' => 0,
            'remove_space' => true,
            'encrypt_name' => true,
        ];

        $this->upload->initialize($this->upload_config);

        if (!$this->upload->do_upload_termica()) {
            $upload_error = $this->upload->display_errors();
            print_r($upload_error);
            exit();
        } else {
            $file_info = [$this->upload->data()];
            return $file_info[0]['file_name'];
        }
    }

    public function editarLogoTermica()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'cEmitente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar emitente.');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        if ($id == null || !is_numeric($id)) {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar a logomarca.');
            redirect(site_url('masteros/emitente'));
        }
        $this->load->helper('file');
        delete_files(FCPATH . 'assets/logo_termica/');

        $imagetermica = $this->do_upload_termica();
        $logotermica = base_url() . 'assets/logo_termica/' . $imagetermica;

        $retorno = $this->masteros_model->editLogoTermica($id, $logotermica);
        if ($retorno) {
            $this->session->set_flashdata('success', 'As informações foram alteradas com sucesso.');
            log_info('Alterou a logomarca Termica do emitente.');
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar alterar as informações.');
        }
        redirect(site_url('masteros/emitente'));
    }

    public function calendario()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar O.S.');
            redirect(base_url());
        }
        $this->load->model('os_model');
        $status = $this->input->get('status') ?: null;
        $start = $this->input->get('start') ?: null;
        $end = $this->input->get('end') ?: null;

        $allOs = $this->masteros_model->calendario(
            $start,
            $end,
            $status
        );
        $events = array_map(function ($os) {
            switch ($os->status) {
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
                case 'Serviço Concluido':
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
                default:
                    $cor = '#E0E4CC';
                    break;
            }
            return [
                'title' => "OS: {$os->idOs}, Cliente: {$os->nomeCliente}",
                'start' => $os->dataFinal,
                'end' => $os->dataFinal,
                'color' => $cor,
                'extendedProps' => [
                    'id' => $os->idOs,
                    'cliente' => '<b>Cliente:</b> ' . $os->nomeCliente,
                    'dataInicial' => '<b>Data de Entrtada:</b> ' . date('d/m/Y', strtotime($os->dataInicial)),
                    'dataFinal' => '<b>Data Final:</b> ' . date('d/m/Y', strtotime($os->dataFinal)) ,
                    'garantia' => '<b>Garantia:</b> ' . date('d/m/Y', strtotime($os->garantia)) ,
                    'status' => '<b>Status da OS:</b> ' . $os->status,
                    'description' => '<b>Descrição/Produto:</b> ' . $os->descricaoProduto,
                    'defeito' => '<b>Defeito:</b> ' . $os->defeito,
                    'observacoes' => '<b>Observações:</b> ' . $os->observacoes,
                    'total' => '<b>Valor Total:</b> R$ ' . number_format($os->totalProdutos + $os->totalServicos, 2, ',', '.'),
                    'valorFaturado' => '<b>Valor Faturado:</b> R$ ' . number_format($os->valorTotal, 2, ',', '.'),
                    'editar' => $this->os_model->isEditable($os->idOs),
                ]
            ];
        }, $allOs);

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($events));
    }
}