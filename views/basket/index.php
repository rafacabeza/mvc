<?php include('../views/parts/head.php'); ?>
<?php include('../views/parts/header.php'); ?>
<!-- Begin page content -->
<main role="main" class="container">
  <h1>Cesta de la compra
      <a class="btn btn-primary float-right" href="/basket/empty">Vaciar</a>
  </h1>

  <table class="table table-striped">
        <thead>
            <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($basket as $product) {?>
                <tr>
                <td><?= $product->id ?></td>
                <td><?= $product->name ?></td>
                <td><?= $product->price ?></td>
                <td><?= $product->cantidad ?></td>
                <td><a class="btn btn-primary btn-sm" href="/basket/add/<?= $product->id ?>">  + </a></td>
                <td><a class="btn btn-primary btn-sm" href="/basket/down/<?= $product->id ?>">  - </a></td>
                <td><a class="btn btn-primary btn-sm" href="/basket/remove/<?= $product->id ?>">  x </a></td>
                </tr>
            <?php } ?>            
        </tbody>
    </table>
</main>

<?php include('../views/parts/footer.php'); ?>
