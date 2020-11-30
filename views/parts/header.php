<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">MVC PHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/user">Usuarios</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link " href="/producttype">Tipos</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link " href="/product">Productos</a>
            </li>
          </ul>

          <?php
          if (isset($_SESSION['user'])) {
            echo "<span class='bg-success'>" . $_SESSION['user']->name . "</span> &nbsp;";
            echo "<a class='nav-item active' href='/login/cerrar'>cerrar</a>";
          } else {
            echo "<a  class='nav-item active' href='/login'>entrar</a>";
          }
          ?>
        </div>
      </nav>
    </header>
