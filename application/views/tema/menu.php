<!--sidebar-menu-->
<nav id="sidebar">
    <div id="newlog">
        <div class="icon2">
            <img src="<?php echo base_url() ?>assets/img/logox.png">
        </div>
    </div>
    <a href="#" class="visible-phone">
        <div class="mode">
                <i class="fas fa-list open-2" style="font-size:17px"></i>
                <i class="fas fa-xmark close-2" style="font-size:17px"></i>
        </div>
    </a>
<!-- Start Pesquisar-->
<li class="search-box">
<form style="display: flex" action="<?= site_url('masteros/pesquisar') ?>">
<button style="background: transparent;border: transparent" type="submit" class="tip-bottom" title="Pesquisar">
<i class='fas fa-search iconX' style="font-size:17px"></i></button>
<input type="search" name="termo" placeholder="Pesquise aqui..." value="">
</form>
</li>
<!-- End Pesquisar-->

    <div class="menu-bar">
        <div class="menu">

			<ul class="menu-links" style="position: relative;">
				<li class="<?php if (isset($menuPainel)) {echo 'active';}; ?>">
					<a href="<?= base_url() ?>"><i class='fas fa-home iconX'></i>
					<span class="title nav-title">Início</span>
                    <span class="title-tooltip">Início</span></a>
				</li>

			<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) { ?>
				<li class="<?php if (isset($menuClientes)) {echo 'active';}; ?>">
					<a href="<?= site_url('clientes') ?>"><i class='fas fa-users iconX'></i>
					<span class="title">Cliente</span>
                    <span class="title-tooltip">Clientes</span></a>
				</li>
			<?php } ?>

			<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) { ?>
				<li class="<?php if (isset($menuProdutos)) {echo 'active';}; ?>">
					<a href="<?= site_url('produtos') ?>"><i class='fas fa-shopping-bag iconX'></i>
					<span class="title">Produtos</span>
                    <span class="title-tooltip">Produtos</span></a>
				</li>
			<?php } ?>

			<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vServico')) { ?>
				<li class="<?php if (isset($menuServicos)) {echo 'active';}; ?>">
					<a href="<?= site_url('servicos') ?>"><i class='fas fa-wrench iconX'></i>
					<span class="title">Serviços</span>
                    <span class="title-tooltip">Serviços</span></a>
				</li>
			<?php } ?>

			<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) { ?>
				<li class="<?php if (isset($menuOs)) {echo 'active';}; ?>">
					<a href="<?= site_url('os') ?>"><i class='fas fa-diagnoses iconX'></i>
					<span class="title">Ordens de Serviço</span>
                    <span class="title-tooltip">OS.</span></a>
				</li>
			<?php } ?>

			<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) { ?>
				<li class="<?php if (isset($menuVendas)) {echo 'active';}; ?>">
					<a href="<?= site_url('vendas') ?>"><i class='fas fa-cash-register iconX'></i></span>
					<span class="title">Vendas</span>
                    <span class="title-tooltip">Vendas</span></a>
				</li>
			<?php } ?>

			<!--
			<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vGarantia')) { ?>
				<li class="<?php if (isset($menuGarantia)) {echo 'active';}; ?>">
					<a href="<?= site_url('garantias') ?>"><i class='fas fa-book iconX'></i>
					<span class="title">Termos de Garantias</span>
                    <span class="title-tooltip">Garantias</span></a>
				</li>
			<?php } ?>
            -->

			<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vArquivo')) { ?>
				<li class="<?php if (isset($menuArquivos)) {echo 'active';}; ?>">
					<a href="<?= site_url('arquivos') ?>"><i class='fas fa-hdd iconX'></i>
					<span class="title">Arquivos</span>
                    <span class="title-tooltip">Arquivos</span></a>
				</li>
			<?php } ?>

			<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vLancamento')) { ?>
				<li class="<?php if (isset($menuLancamentos)) {echo 'active';}; ?>">
					<a href="<?= site_url('financeiro/lancamentos') ?>"><i class="fas fa-hand-holding-usd iconX"></i>
					<span class="title">Lançamentos</span>
                    <span class="title-tooltip">Lançamentos</span></a>
				</li>
			<?php } ?>
            
			<!--
			<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vLancamento')) { ?>
                <li class="<?php if (isset($menuCobrancas)) {echo 'active';}; ?>">
                    <a href="<?= site_url('cobrancas/cobrancas') ?>"><i class='bx bx-credit-card-front iconX'></i>
                    <span class="title">Cobranças</span>
                    <span class="title-tooltip">Cobranças</span></a>
                </li>
			<?php } ?>
            -->
            
            <li class="">
                    <a href="<?= site_url('login/sair'); ?>">
                    <i class='fas fa-person-running iconX'></i>
                    <span class="title">Sair</span>
                    <span class="title-tooltip">Sair</span></a>
            </li>
            </ul>
        </div>
    </div>
</nav>
<!--End sidebar-menu-->
