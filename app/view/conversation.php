<?php
require(RUTA_APP."/view/components/header.php");
?>
<?php $object=$data[0];?>
<?php foreach($object as $key=>$value){ ?>
    <button class="btn btn-primary btn-hide" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="btn-<?php echo($value->idconversation)?> ">
        Conversation Nr:<?php echo($value->idconversation) ?>
    </button>
    <div class="collapse collapse-card" id="collapse-<?php echo($value->idconversation) ?>">
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
