<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <form action="<?=\Core\Router::getRouterByController(Controllers\Usuarios\Usuarios::class,'cadastrar')->getUrl()?>" method="post">
                <div class="card-header">
                    <h3 class="card-title">Dados do Usuário</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-12">
                            <label for="inputName">Nome</label>
                            <input type="text" id="inputName" class="form-control" value="" name="nome" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="inputName">CPF</label>
                            <input type="text" id="inputName" class="form-control" value="" name="cpf" required>
                        </div>

                        <div class="form-group col-6">
                            <label for="inputName">Telefone</label>
                            <input type="text" id="inputName" class="form-control" value="" name="telefone" required> 
                        </div>
                        <div class="form-group col-12">
                            <label for="inputName">Email</label>
                            <input type="email" id="inputName" class="form-control" value="" name="email" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="inputName">Nascimento</label>
                            <input type="date" id="inputName" class="form-control" value="" name="nascimento" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                <!-- /.card-body -->
            </form>
        </div>

        <!-- /.card -->
    </div>
</div>