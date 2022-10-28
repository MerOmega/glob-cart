<?php require(RUTA_APP."/view/components/header.php"); ?>
<?php
$idOrder=$data[0];
$date=$data[1];
$price = $data[2];

?>
<div class="container">
    <h1>Compra confirmada!</h1>
    <p>Id de compra:<?php echo($idOrder); ?></p><br>
    <p>Fecha de compra:<?php echo ($date)?></p>
    <p>Total abonado:<?php echo($price) ?></p>
</div>

<?php require(RUTA_APP."/view/components/footer.php"); ?>