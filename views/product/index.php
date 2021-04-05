<?php include('../views/parts/head.php'); ?>
<?php include('../views/parts/header.php'); ?>
<!-- Begin page content -->
<main role="main" class="container">
  <h1>Lista de productos  
      <a class="btn btn-primary float-right" href="/product/create">Nuevo</a>
  </h1>

  <?php
  if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
  }?>

  <table class="table table-striped">
        <thead>
            <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product) {?>
                <tr>
                <td><?= $product->id ?></td>
                <td><?= $product->name ?></td>
                <td><?= $product->type_id ?></td>
                <td><?= $product->price ?></td>
                <td><a class="btn btn-primary btn-sm" href="/product/show/<?= $product->id ?>">  Ver </a></td>
                <td><a class="btn btn-primary btn-sm" href="/product/edit/<?= $product->id ?>">  Editar </a></td>
                <td><a class="btn btn-primary btn-sm" href="/product/delete/<?= $product->id ?>">  Borrar </a></td>
                </tr>
            <?php } ?>            
        </tbody>
    </table>
</main>

<?php include('../views/parts/footer.php'); ?>
