<?php $this->load->view('elements/header');?>
<?php $this->load->view('elements/sidebar');?>
<br><br><br><br>
<div class="container">
  <br><br>
  <h3 class="text-centered">Sobre-Nós</h3>
  <br>
  <a href="#" data-toggle="modal" data-target="#modal_cadastro_produto">Cadastrar novo produto</a><br><br>
  <table id="tabela_um" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">Nome</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($lista as $row): ?>
        <tr>
          <td><?=$row->nome?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="modal_cadastro_produto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="display: inline;">Cadastro produto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="" method="post">
          <div class="form-group">
            <label class="label-input-style" for="valor">Nome:</label>
            <input type="text" class="col-md-12" id="nome" name="nome" required>
          </div>
          <br>
        </div>
        <div class="modal-footer">
          <button type="submit" name="cadastro_produto" class="btn btn-primary">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('elements/footer');?>
