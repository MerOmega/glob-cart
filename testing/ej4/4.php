<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Texto</h1>
    <?php require_once("core.php"); ?>

    <h2>Contar la repetición de todas las letras en el siguiente string.</h2>
    <table>
        <tr>
            <th>Letter</th>
            <th>Amount</th>
        </tr>
        <tr>
            <?php 
                array_walk($total,"iterate");
            ?>
        </tr>
    </table>
    <h2>Retornar un array asociativo (return) conteniendo las repeticiones incluidas en el array include.</h2>
    <table>
        <tr>
            <th>Letter</th>
            <th>Amount</th>
        </tr>
        <tr>
            <?php 
                array_walk($return,"iterate");
            ?>
        </tr>
    </table>
    <h2>retornar en un array asociativo (return_excluded) las repeticiones no incluidas en el array included.</h2>
    <table>
        <tr>
            <th>Letter</th>
            <th>Amount</th>
        </tr>
        <tr>
            <?php 
                array_walk($return_except,"iterate");
            ?>
        </tr>
    </table>
</body>
</html>