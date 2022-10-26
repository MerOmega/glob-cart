<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart">Carrito <?php echo($_SESSION["cart"]->getTotalItems()) ?></a>
          </li>
          <li>
            <p class="nav-link" >A pagar:$ <?php echo($_SESSION["cart"]->getTotalValue()) ?></p>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->