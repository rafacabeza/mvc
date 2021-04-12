<?php include('../views/parts/head.php'); ?>
<?php include('../views/parts/header.php'); ?>
<!-- Begin page content -->
<main role="main" class="container">    
  <h1>Alta de producto</h1>
  <form action="/product/store" method="post">
    <div class="form-group">
      <label for="">Nombre:</label>
      <input class="form-control" type="text" name="name">
    </div>

    <div class="form-group">
      <label for="">Tipo:</label>
      <select class="form-control" name="type_id" id="">
        <?php foreach($types as $type) {?> 
          <option value="<?= $type->id?>"><?= $type->name?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label for="">Precio:</label>
      <input class="form-control" type="text" name="price">
    </div>

    <div class="form-group">
      <input class="form-control btn btn-primary" type="submit" value="crear">
    </div>

  </form>
</main>

<?php include('../views/parts/footer.php'); ?>
