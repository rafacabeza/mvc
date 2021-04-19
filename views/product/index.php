<?php include('../views/parts/head.php'); ?>
<?php include('../views/parts/header.php'); ?>
<!-- Begin page content -->
<main role="main" class="container">
  <h1>Lista de productos  
      <a class="btn btn-primary float-right" href="/product/create">Nuevo</a>
  </h1>

  <?php
  //mensaje si hemos borrado un producto
  if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
  }?>

  <h2>Mi producto facvorito en esta sesión es: </h2>
  
  <h3>
    <?php

    if (isset($_SESSION['favorito'])) {
      echo unserialize($_SESSION['favorito']);
    } else {
      echo "No hay favorito";
    }
    ?>
  </h3>
  <pre>
    <?php
    // var_dump($_SESSION['favorito']);
    
    ?>
  </pre>
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
                <td><?= $product->type->name ?></td>
                <td><?= $product->price ?></td>
                <td><a class="btn btn-primary btn-sm" href="/product/show/<?= $product->id ?>">  Ver </a></td>
                <td><a class="btn btn-primary btn-sm" href="/product/edit/<?= $product->id ?>">  Editar </a></td>
                <td><a class="btn btn-primary btn-sm" href="/product/delete/<?= $product->id ?>">  Borrar </a></td>
                <td><a class="btn btn-success btn-sm" href="/product/favorito/<?= $product->id ?>">  Favorito </a></td>
                <td><a class="btn btn-success btn-sm" href="/basket/add/<?= $product->id ?>">  Comprar </a></td>
                </tr>
            <?php } ?>            
        </tbody>
    </table>
</main>

<?php include('../views/parts/footer.php'); ?>
