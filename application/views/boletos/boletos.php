<?php $this->load->view('elements/header');?>
<?php $this->load->view('elements/sidebar');?>
<br><br><br>
<div class="container">
  <br><br>
  <h2 class="text-centered">Boletos</h2>
  <br>
  <a href="#" data-toggle="modal" data-target="#modal_cadastro_boleto">Cadastrar novo boleto</a><br><br>
  <table id="tabela_um" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">Vencimento</th>
        <th scope="col">Valor</th>
        <th scope="col">Pagar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($boletos as $row): ?>
        <tr>
          <td><?= $row->vencimento ?></td>
          <td><?= $row->valor ?></td>
          <td><a class="pagar" data-id="<?=$row->id?>" style="color: blue; cursor: pointer;">Pagar</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_cadastro_boleto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="display: inline;">Cadastro boleto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="" method="post">
        <div class="form-group">
          <label class="label-input-style" for="vencimento">Vencimento: ** </label>
          <input type="date" class="col-md-12" id="vencimento" name="vencimento" value="<?=set_value('vencimento')?>" required>
        </div>
        <div class="form-group">
          <label class="label-input-style" for="valor">Valor: ** </label>
          <input type="text" class="col-md-12" id="valor" name="valor" value="<?=set_value('valor')?>">
        </div>
        <br>
      </div>
      <div class="modal-footer">
        <button type="submit" name="cadastro_boleto" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_pagar_boleto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="display: inline;">Pagar boleto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="" method="post">
        <div id="boleto">

        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="pagar_boleto" class="btn btn-primary">Pagar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('elements/footer');?>
<script type="text/javascript">
$('.pagar').click(function(){
  var id_boleto = $(this).data("id");
  console.log(id_boleto);
  $.ajax({ // aqui é um ajax que usei pra fazer o select, pode ser pro delete tb
   url: '<?= base_url(); ?>index.php/boletos/fetch_boleto',
   method: 'POST',
   data: {id_boleto:id_boleto},
   success: function(data){
     console.log(data);
     $('#boleto').html(data);
      $("#modal_pagar_boleto").modal("show"); // aqui abre o modal dps de tudo acontecer
    }
   });
});
</script>
