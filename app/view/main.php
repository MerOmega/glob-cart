<?php
 require(RUTA_APP."/view/components/header.php");
?>
<?php 
    //Obtengo la pagina actual
    $url=rtrim($_SERVER['REQUEST_URI'],"/");
    $url=filter_var($url,FILTER_SANITIZE_URL);
    $url=explode("/",$url);
    if(!isset($url[3])){
        $url[3]=1;
    }     
?>
<main> <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
 <?php
        
        foreach ($data[0] as $key){
                $temporalStock=0;
                //Si existe el item en el carro lo uso para sacar su diferencia mas tarde
                if(array_key_exists($key->idarticles,$_SESSION["cart"]->getConjArticle())){
                    $temporalStock=$_SESSION["cart"]->getStockItem($key->idarticles);
                }
                //Diferencia entre Stock en DB y El stock que hay en el carrito
                $diferencialStock=$key->stock - $temporalStock;
            ?>
            <div class="col"> <div class="card h-100 shadow-sm">
                    <div class="card-body" id="item-<?php echo $key->idarticles; ?>">
                        <div class="clearfix mb-3">
                            <span class="float-start badge rounded-pill bg-primary"><?php echo $key->name; ?></span>
                            <span class="float-end price-hp">PRECIO: $<?php echo $key->price;?></span>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam quidem eaque ut eveniet aut quis rerum. Asperiores accusamus harum ducimus velit odit ut. Saepe, iste optio laudantium sed aliquam sequi.</h5>
                        <p class="stock" id="stock-<?php echo($key->idarticles); ?>">Solo <?php echo($diferencialStock) ?> en stock!</p>
                        <?php if($diferencialStock>0){ ?>    
                            <form action="<?php echo INITIAL_RUTE?>/cart/addItem/<?php echo $key->idarticles;?>" method="post" autocomplete="off">
                                <!-- Envia como POST al controlador la cantidad que quiere guardar en el carro -->
                                <div class="text-center my-4">
                                    <?php if($diferencialStock>1){ ?>
                                        <label for="amount">Cantidad:</label> <input type="number" name="amount" required value="1" min="1" 
                                        max="<?php echo($diferencialStock) ?>" class="input" id="input-<?php echo($key->idarticles) ?>">
                                    <?php }else{ ?>
                                            <input type="hidden" name="amount" required value="1">
                                        <?php } ?>
                                    <input type="hidden" name="page" value="<?php echo $url[3]?>">
                                    <button type="submit" class="btn btn-warning"> Buy now! </button>
                                </div>
                            </form>
                        <?php } ?>  
                    </div>
                </div>
            </div>
<?php
        }
?>
        </div>
    </div>
</main>

<div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
            <?php if($url[3]>1){ ?>
                    <!-- Voy a mostrar la pagina anterior en el momento que sea mayor a 1 -->
                    <a class="page-link" href="<?php echo(INDEXED_RUTE."/".$url[3]-1)?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    </li> 
                    <li class="page-item"><a class="page-link" href="<?php echo(INDEXED_RUTE."/".$url[3]==1?1:$url[3]-1) ?>"><?php echo($url[3]==1?1:$url[3]-1); ?></a></li>
            <?php }?>
            <!-- Pagina actual -->
            <li class="page-item"><p class="page-link disabled"><?php echo($url[3]) ?></p></li>
            <!-- Fin pagina actual -->
            <!-- Muestro la siguiente pagina solo si no llegue al final -->
            <?php
                if(ceil($data[1]/LIMIT_ITEM_PER_PAGE)>$url[3]){
            ?>  
            <li class="page-item"><a class="page-link" href="<?php echo(INDEXED_RUTE."/".$url[3]+1) ?>"><?php echo($url[3]+1) ?></a></li>
            <li class="page-item">
            <a class="page-link" href="<?php echo(INDEXED_RUTE."/".$url[3]+1)?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
            </li>
            <?php } ?>
        </ul>
        </nav>
        <?php
        require(RUTA_APP."/view/components/footer.php");
        ?>
</div>