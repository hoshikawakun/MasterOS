<?php if ($emitente[0]): ?>
    <div>
        <br>
        <div style="width: 35%; float: left" class="float-left col-md-3">
            <img style="width: 220px" src="<?= convertUrlToUploadsPath($emitente[0]->url_logo) ?>" alt=""><br><br>
        </div>
        <div style="float: right; font-size: 10px"><span style="font-size: 10px"><b>Empresa:
            </b><?= $emitente[0]->nome ?></span><br>
        <span style="font-size: 10px"><b>CNPJ: </b><?= $emitente[0]->cnpj ?></span><br>
        <span style="font-size: 10px"><b>Endereço: </b><?= $emitente[0]->rua ?>, <?= $emitente[0]->numero ?>,
            <?= $emitente[0]->bairro ?>, <?= $emitente[0]->cidade ?> - <?= $emitente[0]->uf ?></span><br>
        <span style="font-size: 10px"><b>CEP: </b><?= $emitente[0]->cep ?></span><br>
        <span style="font-size: 10px"><b>Email: </b><?= $emitente[0]->email ?></span><br>
        <span style="font-size: 10px"><b>Telefone: </b><?= $emitente[0]->telefone ?></span><br>

            <?php if (isset($title)): ?>
                <b>RELATÓRIO: </b> <?= $title ?> <br>
            <?php endif ?>

            <?php if (isset($dataInicial)): ?>
                <b>DATA INICIAL: </b> <?= $dataInicial ?>
            <?php endif ?>

            <?php if (isset($dataFinal)): ?>
                <b>DATA FINAL: </b> <?= $dataFinal ?>
            <?php endif ?>
        </div>
    </div>
<?php endif ?>
