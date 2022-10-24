<?php
 require(RUTA_APP."/view/components/header.php");
?>
<main> <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
        <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
 <?php
        foreach ($data as $key){
            ?>
            <div class="col"> <div class="card h-100 shadow-sm">
                    <div class="card-body" id="item-<?php echo $key->getId(); ?>">
                        <div class="clearfix mb-3">
                            <span class="float-start badge rounded-pill bg-primary"><?php echo $key->getName(); ?></span>
                            <span class="float-end price-hp"><?php echo $key->getPrice();?></span>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam quidem eaque ut eveniet aut quis rerum. Asperiores accusamus harum ducimus velit odit ut. Saepe, iste optio laudantium sed aliquam sequi.</h5>
                        <div class="text-center my-4">
                            <a href="#" class="btn btn-warning">Check offer</a>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
?>
        </div>
    </div>
</main>
<?php
require(RUTA_APP."/view/components/footer.php");
?>
