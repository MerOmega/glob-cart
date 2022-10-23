<?php $arrayList=array(11,1231,1231231,"jejeje"); ?>

<p>
    <?php
        print_r($arrayList)
    ?>
</p>

<?php
    $scalarArray=array();
    array_push($scalarArray,1,2);
?>

<?php
        foreach ($scalarArray as $clave=>$valor){
    ?>
        <p class="value-<?php echo $clave ?>"> Mi valor es <?php echo $valor ?> </p>
    <?php } 
?>