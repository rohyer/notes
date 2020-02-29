<!-- Modal Add Note -->
<!-- Modal -->
<div class="modal fade" id="add-note" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <form action="" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Adicione uma nota</h5>

                <input type="checkbox" name="note-fixed" id="note-fixed">
                <label for="note-fixed">Fixar</label>
                <!-- <i class="fas fa-bookmark"></i> -->
            </div>
            <div class="modal-body">
        
                <input type="text" name="note-title" placeholder="Título">

                <select name="category-note" id="">
                    <option value="">Categoria</option>
                    <option value="trabalho">Trabalho</option>
                    <option value="semcategoria">Sem categoria</option>
                </select>

                <textarea name="note-description" cols="30" rows="8" placeholder="Suas notas"></textarea>
            
                <div class="modal-footer-custom">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="submit" name="btnRegNote" class="btn btn-primary">Save changes</button>
                </div>
        
            </div>
        </form>  
    </div>
  </div>
</div>

<!-- Modal Add Category -->
<!-- Modal -->
<div class="modal fade" id="add-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Adicione uma categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <input type="text" name="category-title" id="" placeholder="Ex: trabalho">

            <div class="modal-footer-custom">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" name="btnRegCategory" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>