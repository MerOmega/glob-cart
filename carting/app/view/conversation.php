<?php
require(RUTA_APP."/view/components/header.php");
?>
<?php $object=$data[0];?>
<?php foreach($object as $key=>$value){ ?>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Conversation Nr:<?php echo($value->idconversation) ?>
    </button>
    <div class="collapse.show" id="collapseExample">
    <div class="card card-body">
        <?php 
        $content = json_decode($value->content);
        foreach($content as $keyO=>$valueO){
            echo("<p>$valueO</p>");
        }
        // var_dump($content) 
        ?>
    </div>
    </div>
    <br>
<?php } ?>
<?php
require(RUTA_APP."/view/components/footer.php");
?>
