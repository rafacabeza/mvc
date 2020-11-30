<?php include('../views/parts/head.php'); ?>
<?php include('../views/parts/header.php'); ?>
<!-- Begin page content -->
<main role="main" class="container">
  <h1 class="mt-5">Bienvenido <?= $_SESSION['user'] ?>!!</h1>
  <p class="lead">Este es el mini framework elabrado en clase de DWES</p>
  <p>Back to <a href="../sticky-footer/">the default sticky footer</a> minus the navbar.</p>
</main>

<?php include('../views/parts/footer.php'); ?>
