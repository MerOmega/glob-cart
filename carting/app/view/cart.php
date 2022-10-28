<?php
require(RUTA_APP."/view/components/header.php");
?>
<!-- Recupero lista de elementos en el carrito y los items en venta -->
<?php $cartElements = $data[0];
      $listElement = $data[1];
?>
<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <p><span class="h2">Shopping Cart </span><span class="h4">(<?php echo $cartElements->getTotalItems(); ?> item in your cart)</span></p>
        

        <div class="card mb-4">
          <div class="card-body p-4">
            <div class="row align-items-center">
              <?php if(count($cartElements-> getConjArticle())==0){ ?>
              <p>Carrito vacio...</p>
              <?php }else{?>
                  <?php foreach($cartElements->getConjArticle() as $key=>$value){ ?>
                <div class="row align-items-center">
                      <div class="col-md-2 d-flex justify-content-center">
                        <div>
                          <p class="small text-muted mb-4 pb-2">Name</p>
                          <p class="lead fw-normal mb-0"><?php echo($listElement[$key-1]->getName()); ?></p>
                        </div>
                      </div>
                      
                      <div class="col-md-2 d-flex justify-content-center">
                        <div>
                          <p class="small text-muted mb-4 pb-2">Quantity</p>
                          <p class="lead fw-normal mb-0"><?php echo($value); ?></p>
                        </div>
                      </div>
                      <div class="col-md-2 d-flex justify-content-center">
                        <div>
                          <p class="small text-muted mb-4 pb-2">Price</p>
                          <p class="lead fw-normal mb-0"><?php echo($listElement[$key-1]->getPrice());?></p>
                        </div>
                      </div>
                      <div class="col-md-2 d-flex justify-content-center">
                        <div>
                          <p class="small text-muted mb-4 pb-2">Total</p>
                          <p class="lead fw-normal mb-0"><?php echo($listElement[$key-1]->getPrice()*$value); ?></p>
                        </div>
                      </div>
                    <div class="col-md-2 d-flex justify-content-center">
                        <div>
                            <p class="small text-muted mb-4 pb-2">Eliminar item</p>
                            <a href="<?php echo INITIAL_RUTE?>cart/deleteItem/<?php echo $key ?>" type="button" class="btn btn-light"><span class="bi bi-trash"></span></a>
                        </div>
                    </div>
                </div>

                  <?php } ?>

              <?php } ?>
            </div>

          </div>
        </div>

        <div class="card mb-5">
          <div class="card-body p-4">
            <div class="float-end">
              <p class="mb-0 me-5 d-flex align-items-center">
                <span class="small text-muted me-2">Order total:</span> <span
                  class="lead fw-normal"><?php echo $cartElements->getTotalValue() ?></span>
              </p>
            </div>

          </div>
        </div>

        <div class="d-flex justify-content-end">
          <a href="cart/removeCart" type="buttop" class="btn btn-danger btn-lg me-2">Delete all in Shopping Cart</a>
          <a href="<?php echo INDEXED_RUTE ?>" type="button" class="btn btn-light btn-lg me-2">Continue shopping</a>
          <?php if(count($cartElements-> getConjArticle())!=0){ ?>
          <form action="recipt/index" method="post">
            <button type="submit" class="btn btn-primary btn-lg">Buy! </button>
          </form>
          <?php }?>       
        </div>

      </div>
    </div>
  </div>
</section>


<?php
require(RUTA_APP."/view/components/footer.php");
?>
