
<div class="modal fade" id="categorias" tabindex="-1" role="dialog" aria-labelledby="categorias" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form>
      <div class="modal-header">
        <h5 class="modal-title" id="">Nova Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
          <!-- <div class="form-group">
            <label for="id" class="form-control-label">Id</label>
            <input type="text" class="form-control" id="id" name="id"disabled>
          </div> -->
          <div class="form-group">
            <label for="nome" class="form-control-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Gravar</button>
      </div> 
    </form>
    </div>
  </div>
</div>


<script>
  $('#categorias').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
});

</script>
