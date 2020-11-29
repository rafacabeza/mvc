<?php include('../views/parts/head.php'); ?>
<?php include('../views/parts/header.php'); ?>
<!-- Begin page content -->
<main role="main" class="container">    
    <h1>Detalle de tipo de producto</h1>
    <div class="card">
        <div class="card-header">
            <?= $productType->name ?>
        </div>
        <ul class="list-group list-group-flush">
          
            <li class="list-group-item">Cervez 1</li>
            <li class="list-group-item">Cervez 2</li>
            <li class="list-group-item">Cervez ...</li>
        </ul>
  </div>    
</main>

<?php include('../views/parts/footer.php'); ?>
