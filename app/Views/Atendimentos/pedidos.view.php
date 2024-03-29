<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Consumo da mesa
                        <?php echo $atendimento->mesa ?>
                    </h4>
                    <span class="text-sm d-block float-right text-right">
                        <?= date('h:i:s', strtotime($atendimento->criacao_data)) ?>
                    </span>
                </div>
                <div class="card-body">

                    <?php foreach ($atendimento->getPedidos() as $pedido): ?>
                        <div class="row border-bottom">
                            <div class="col-9">
                                <?= $pedido->getProduto()->nome; ?>
                            </div>
                            <div class="col-3 text-right text-sm">
                                <?= date('h:i', strtotime($pedido->criacao_data)) ?>
                            </div>
                            <div class="col-4">
                                <span class="text-sm text-muted">
                                    Valor Un
                                </span>
                                <br>
                                <?= $pedido->valor_un; ?>
                            </div>
                            <div class="col-4">
                                <span class="text-sm text-muted">
                                    Qt
                                </span>
                                <br>
                                <?= $pedido->quantidade; ?>
                            </div>
                            <div class="col-4">
                                <span class="text-sm text-muted">
                                    Total
                                </span>
                                <br>
                                <?php
                                echo $pedido->valor_un * $pedido->quantidade;
                                $total_geral += $pedido->valor_un * $pedido->quantidade;
                                ?>

                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-header text-white">
                            Total:
                        </div>
                        <div class="card-body">
                            <h1 class="card-title" style="font-size:3em;">
                                R$
                                <?= $total_geral ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <a href="<?= url(\Controllers\Home::class) ?>" class="btn btn-lg btn-warning btn-fill w-100">
                        <i class="fas fa-angle-left"></i>
                        Voltar</a>
                    <a href="<?= url(\Controllers\Home::class) ?>" class="btn btn-lg btn-success btn-fill w-100 mt-2">
                        <i class="fas fa-cash-register fa-bounce"></i>
                        Pagamento</a>

                </div>
                <div class="col-12">
                    <div class="card">
                        <form action="<?= url(\Controllers\Atendimento\Pedidos::class, 'addPedido') ?>" method="post">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Adicionar Pedido
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="">Produto</label>
                                            <select name="produtos_id" id="" class="form-control" required>
                                                <option value="" disabled select>Selecione um produto</option>
                                                <?php foreach ($produtos as $produto): ?>
                                                    <option value="<?= $produto->id ?>">
                                                        <?= $produto->nome . " -------- R$ " . $produto->valor_un ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Quantidade</label>
                                            <input type="number" class="form-control" name="quantidade" step="0.1" min="0" value="1"
                                                id="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="atendimentos_id" value="<?=$atendimento->id?>">
                                    <input type="hidden" name="mesa" value="<?=$atendimento->mesa?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-warning" type="reset">Cancelar</button>
                                <button class="btn btn-primary float-right" type="submit">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>