<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="<?php echo INDEXED_RUTE ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo(INITIAL_RUTE)?>/cart">Carrito <?php echo($_SESSION["cart"]->getTotalItems()) ?></a>
          </li>
          <li>
            <p class="nav-link" >A pagar:$ <?php echo($_SESSION["cart"]->getTotalValue()) ?></p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo(INITIAL_RUTE)?>/conversation">Conversation</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->