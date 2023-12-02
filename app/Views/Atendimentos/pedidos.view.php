<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Consumo da mesa
                        <?= $atendimento->mesa ?>
                    </h4>
                    <span class="text-sm d-block float-right">
                        <?= date('h:i:s', strtotime($atendimento->criacao_data)) ?>
                    </span>
                </div>
                <div class="card-body">
                    <table class="table text-sm">
                        
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>
                                    Valor Un
                                </th>
                                <th>
                                    Qt
                                </th>
                                <th>
                                    Total
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>