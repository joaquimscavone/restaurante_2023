<div class="row">
  <?php foreach($mesas as $n_mesa => $mesa): ?>
    <div class="col-sm-3">
      <div class="card">
        <div class="card-body">
          <h5 class="text-center">Mesa
            <?= $n_mesa ?>
          </h5>

          <p class="card-text text-center">
            <?php if(is_null($mesa)){
              echo " <img src='".assets('images/mesas/livre.png')."' alt=''>";
            }else{
              echo " <img src='".assets('images/mesas/ocupada.png')."' alt=''>";
            }
            
            ?>
           
          </p>


        </div>
        <div class="card-footer">
        <a href="<?=url(\Controllers\Atendimento\Pedidos::class)?>" class="btn btn-primary"><i class="fas fa-list"></i></a>
        <?php if(isset($mesa)):?>
          <a href="#" class="btn btn-success"><i class="fas fa-coins"></i></a>
          <a href="#" class="btn btn-warning"><i class="fas fa-receipt"></i></a>
          <?php endif?>
         
         
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- /.col-md-6 -->
</div>
<!-- /.row -->