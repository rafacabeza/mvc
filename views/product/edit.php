<?php include('../views/parts/head.php'); ?>
<?php include('../views/parts/header.php'); ?>
<!-- Begin page content -->
<main role="main" class="container">    
  <h1>Edición de producto</h1>
  <!-- 
    para rellenar el input: atributo value="" 
    seleccionar opcion: atributo selected
  -->

  <form action="/product/update/<?= $product->id ?>" method="post">
    <div class="form-group">
      <label for="">Nombre:</label>
      <input class="form-control" type="text" name="name" value="<?= $product->name ?>">
    </div>

    <div class="form-group">
      <label for="">Tipo:</label>
      <select class="form-control" name="type_id" id="">
        <?php foreach($types as $type) {?> 
          <option value="<?= $type->id?>"
            <?= $type->id == $product->type_id ? "selected" : "" ?>
            >
            <?= $type->name?>
          </option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="">Precio:</label>
      <input class="form-control" type="text" name="price" value="<?= $product->price ?>">
    </div>

    <div class="form-group">
      <input class="form-control btn btn-primary" type="submit" value="actualizar">
    </div>

  </form>
</main>

<?php include('../views/parts/footer.php'); ?>
