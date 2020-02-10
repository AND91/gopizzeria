<?php $this->load->view('elements/header');?>
<?php $this->load->view('elements/sidebar');?>
<br><br><br>
<div class="container">
  <br><br>
  <h2 class="text-centered">Ordem de cobrança</h2>
  <br>
  <table id="tabela_um"  data-order='[[ 3, "asc" ]]' class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Parcela</th>
        <th scope="col">Valor</th>
        <th scope="col">Vencimento</th>
        <th scope="col">Restante</th>
        <th scope="col">Pagar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($parcelas as $row):
        $restante = $row->restante;
        if ($restante <= 0){}else{ ?>
        <tr>
          <td><a href="<?php echo base_url(); ?>index.php/cliente/detalhe/<?=$row->id_cliente?>" style="color: #8e0695;"><?=$row->nome?></a></td>
          <td><?=$row->parcela?></td>
          <td><?=$row->valor_parcela?></td>
          <td><?=$row->vencimento?></td>
          <td><?=$row->restante?></td>
          <td><a class="receber_pedido" data-cliente="<?=$row->id_cliente?>" data-id="<?=$row->id_parcela?>" data-restante="<?=$row->restante?>" style="color: #0275d8; cursor: pointer;"><i class="fas fa-money-bill-wave" ></i> Receber</a></td>
        </tr>
      <?php }
      endforeach; ?>
    </tbody>
  </table>
  <br><br>
  <h2 class="text-centered">Pessoas que pagaram</h2>
  <br>
  <table id="tabela_dois" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Valor</th>
        <th scope="col">Data</th>
        <th scope="col">Saldo</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pagamentos as $row): ?>
        <tr>
          <td><a href="<?php echo base_url(); ?>index.php/cliente/detalhe/<?= $row->id ?>" style="color: #8e0695;"><?=$row->nome?></a></td>
          <td><?=$row->valor?></td>
          <td><?=$row->data_pagamento?></td>
          <td><?=$row->saldo?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<br><br><br>

<!-- Modal -->
<div class="modal fade" id="modal_pagamento" tabindex="-1" role="dialog" aria-labelledby="label_pagamento" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label_pagamento" style="display: inline;">Receber pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" id="form_pagamento" action="" method="post">
        <div class="row">
          <h5>
            <label class="label-input-style col-md-3" for="valor">Restante: </label>
            <input type="text" class="col-md-5 text-centered" name="restante" id="restante" value="" readonly style="border: 0;">
          </h5>
        </div>
        <div class="row">
          <h5>
            <label class="label-input-style col-md-3" for="valor">Valor: </label>
            <input type="text" class="col-md-5 text-centered valor" maxlength="7" name="valor" required>
          </h5>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="id_cliente" name="id_cliente" value="">
          <input type="hidden" id="id_parcela" name="id_parcela" value="">
          <input type="hidden" id="saldo" name="saldo" value="">
          <button type="submit" name="fazer_pagamento" class="btn btn-primary">Pagar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('elements/footer');?>
<script type="text/javascript">
$(document).ready(function(){

  $('.receber_pedido').click(function(){
    $('#id_cliente').val($(this).data("cliente"));
    $('#id_parcela').val($(this).data("id"));
    $('#restante').val($(this).data("restante"));

    console.log($(this).data("id"));
    console.log($(this).data("restante"));
    console.log($(this).data("cliente"));

    var url = 'http://localhost/natura/index.php/cliente/detalhe/'+$(this).data("cliente")+'';

    $('#form_pagamento').attr('action', url);

    $("#modal_pagamento").modal("show");
  });
});
</script>
