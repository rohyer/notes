<!-- Modal Add Note -->
<?php

require_once "./src/model/Note.php";
require_once "./src/model/Category.php";
$objNote = new Note();
$objCategory = new Category();

?>
<div class="modal fade" id="add-note-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <form action="./src/model/processing/processing.php" id="form-add-note" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Adicione uma nota</h5>

                <input type="checkbox" name="marked-note" value="1" id="marked-add-note">
                <label for="marked-add-note">Fixar</label>
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
                <input type="text" name="id-user-note" value="<?php echo $_SESSION['user_datas']['id']; ?>" class="id-user-note" readonly>
            
                <div class="modal-footer-custom">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="submit" name="btnRegisterNote" class="btn btn-primary">Save changes</button>
                </div>
        
            </div>
        </form>  
    </div>
  </div>
</div>

<!-- Modal Add Category -->
<div class="modal fade" id="add-category-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Adicione uma categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./src/model/processing/processing.php" method="post">
            <input type="text" name="title-category" placeholder="Ex: trabalho">

            <input type="text" name="id-user-category" value="<?php echo $_SESSION['user_datas']['id']; ?>" id="id-user-category" readonly>

            <div class="modal-footer-custom">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" name="btnRegisterCategory" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Note Modal -->
<div class="modal fade" id="update-note-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <form action="./src/model/processing/processing.php" id="form-update-note" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edite sua nota</h5>
                
                <input type="checkbox" name="marked-update-note" id="marked-update-modal" value="1">
                <label for="marked-update-modal">Fixar</label>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id-update-note" id="id-update-modal" value="" readonly>
                <input type="text" name="title-update-note" id="title-update-modal" placeholder="Título" required>
                <select name="category-update-note" id="category-update-modal" required>
                  <option value="">Categoria</option>
                  <option value="1">Sem categoria</option>
                  <?php
                  $listCategories = $objCategory->listCategories($_SESSION['user_datas']['id']);

                  foreach ($listCategories as $value) { ?>
                    <option value="<?php echo $value['idcategory'] ?>"><?php echo $value['namecategory']; ?></option>
                  <?php } ?>
                </select>
                <textarea name="description-update-note" id="description-update-modal" cols="30" rows="8" placeholder="Suas notas"></textarea>
                <input type="text" name="id-update-user-note" value="<?php echo $_SESSION['user_datas']['id']; ?>" class="id-user-note" readonly>
            
                <div class="modal-footer-custom">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="submit" name="btnUpdateNote" class="btn btn-primary" id="yes-update-note">Save changes</button>
                </div>
        
            </div>
        </form>  
    </div>
  </div>
</div>

<!-- Update Modal Category -->
<div class="modal fade" id="update-category-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Adicione uma categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./src/model/processing/processing.php" method="post">
            <input type="text" name="title-category" placeholder="Ex: trabalho">

            <input type="text" name="id-user-category" value="<?php echo $_SESSION['user_datas']['id']; ?>" id="id-user-category" readonly>

            <div class="modal-footer-custom">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" name="btnRegisterCategory" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete Note -->
<div class="delete-note-modal modal fade bd-example-modal-sm" id="delete-note-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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

<!-- Modal Delete Category -->
<div class="delete-category-modal modal fade bd-example-modal-sm" id="delete-category-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        Deseja excluir essa categoria e todas notas pertencentes a ela permanentemente?
      </div>
      <div class="modal-body">
        <a class="btn btn-secondary" data-dismiss="modal">Não</a>
        <a href="#" class="btn btn-secondary" id="yes-delete-category">Sim</a>
      </div>
    </div>
  </div>
</div>