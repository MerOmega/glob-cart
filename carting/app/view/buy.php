<?php require(RUTA_APP."/view/components/header.php"); ?>
<?php
$object = $data[0];
?>
<div class="container">
    <h1>Compra confirmada!</h1>
    <p>Id de compra:<?php echo($object->idorder); ?></p><br>
    <p>Fecha de compra:<?php echo ($object->datebuy)?></p>
    <p>Total abonado:<?php echo($object->total) ?></p>
</div>

<?php require(RUTA_APP."/view/components/footer.php"); ?>