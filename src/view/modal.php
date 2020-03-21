<!-- Modal Add Note -->
<?php

require_once "./src/model/Category.php";
$objCategory = new Category();

?>
<div class="modal fade" id="add-note" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <form action="./src/model/insert-datas.php" id="form-add-note" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Adicione uma nota</h5>

                <input type="checkbox" name="marked-note" value="1" id="note-fixed">
                <label for="note-fixed">Fixar</label>
            </div>
            <div class="modal-body">

                <input type="text" name="title-note" id="huahua" placeholder="Título" required>
                <select name="id-category-note" id="" required>
                  <option value="">Categoria</option>
                  <option value="1">Sem categoria</option>
                  <?php
                  $listCategories = $objCategory->listCategories($_SESSION['user_datas']['id']);

                  foreach ($listCategories as $value) { ?>
                    <option value="<?php echo $value['idcategory'] ?>"><?php echo $value['namecategory']; ?></option>
                  <?php } ?>
                </select>
                <textarea name="description-note" cols="30" rows="8" placeholder="Suas notas"></textarea>
                <input type="text" name="id-user-note" value="<?php echo $_SESSION['user_datas']['id']; ?>" id="id-user-note" readonly>
            
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
        <form action="./src/model/insert-datas.php" method="post">
            <input type="text" name="title-category" placeholder="Ex: trabalho">

            <input type="text" name="id-user-category" value="<?php echo $_SESSION['user_datas']['id']; ?>" id="id-user-category" readonly>

            <div class="modal-footer-custom">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" name="btnRegCategory" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Small modal -->
<div class="modal fade bd-example-modal-sm" id="delete-note-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        Deseja mesmo excluir esta nota?
      </div>
      <div class="modal-body">
        <a class="btn btn-secondary" data-dismiss="modal">Não</a>
        <a href="#" class="btn btn-secondary" id="yes-delete-note">Sim</a>
      </div>
    </div>
  </div>
</div>